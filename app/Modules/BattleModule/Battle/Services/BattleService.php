<?php

namespace App\Modules\BattleModule\Battle\Services;

use App\Modules\BattleModule\Battle\Battle;
use App\Modules\BattleModule\Battle\Data\BattleData;
use App\Modules\BattleModule\Battle\Data\BattleLogData;
use App\Modules\BattleModule\Battle\Repositories\BattleRepository;
use App\Modules\BattleModule\Battleable\Contracts\InterfaceCanBattle;
use App\Modules\BattleModule\BattleInvitation\BattleInvitation;
use App\Services\BaseService;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BattleService extends BaseService
{
    public function getRelationships(): array
    {
        return [];
    }

    public function getModel(?int $id = null): Model
    {
        if ($id && $model = Battle::find($id)) {
            return $model;
        }

        return new Battle();
    }

    /**
     * @throws Exception
     */
    public function findOrCreateBattle(BattleInvitation $battleInvitation): Battle
    {
        if ($battle = $battleInvitation->battle) {
            return $battle;
        }

        if ($battleInvitation->status !== BattleInvitation::STATUSES['ready']) {
            throw new Exception('Battle invitation is not ready!');
        }

        return DB::transaction(function () use ($battleInvitation) {
            $battleable_final_models = $battleInvitation->children()
                ->accepted()
                ->get()
                ->map(fn($item) => $item->battleable->finalModel)
                ->sortByDesc('virtue_score');

            /** @var Battle $battle */
            $battle = $this->create(new BattleData(battle_invitation_id: $battleInvitation->id));

            $this->generateBattleLogsData($battleable_final_models, $battle, 4);

            return $battle;
        });
    }

    public function getApiLogs(Battle $battle): \Illuminate\Support\Collection
    {
        $logsData = collect([]);

        $battle->logs->each(fn($log) => $logsData->push(new BattleLogData(
            action_type: $log->action_type,
            action_value: $log->action_value,
            battleable_name: $log->battleable->finalModel->name
        )));

        return $logsData;
    }

    /**
     * Used this approach instead of $collection->reverse() because :
     * 1. You cannot pass collection by references
     * 2. It is easier to read.
     */
    private function generateBattleLogsData(Collection $models, Battle $battle, int $rounds): void
    {
        DB::transaction(function () use ($models, $battle, $rounds) {
            /** @var InterfaceCanBattle $attacker */
            $attacker = $models->first();
            /** @var InterfaceCanBattle $defender */
            $defender = $models->last();

            for ($i = 1; $i <= $rounds; $i++) {
                BattleRepository::createLog($battle, $attacker, 'attack', $attacker->attack($defender));

                if ($defender->health > 20) {
                    BattleRepository::createLog($battle, $defender, 'survive', $defender->health);
                    $this->switchSides($attacker, $defender);
                    continue;
                }

                BattleRepository::createLog($battle, $attacker, 'win', $attacker->health);
                BattleRepository::createLog($battle, $defender, 'dead', $defender->health);

                break;
            }
        });
    }

    private function switchSides(InterfaceCanBattle &$attacker, InterfaceCanBattle &$defender): void
    {
        $temp = $attacker;
        $attacker = $defender;
        $defender = $temp;
    }
}
