<?php

namespace App\Modules\BattleModule\BattleInvitation\Services;

use App\Modules\BattleModule\BattleInvitation\BattleInvitation;
use App\Modules\BattleModule\BattleInvitation\Data\BattleInvitationData;
use App\Modules\BattleModule\BattleInvitation\Events\PrepareBattle;
use App\Modules\KingdomModule\Kingdom\Kingdom;
use App\Services\BaseService;
use Exception;
use Illuminate\Database\Eloquent\Model;

class BattleInvitationService extends BaseService
{
    public function getRelationships(): array
    {
        return [
            'children'
        ];
    }

    public function getModel(?int $id = null): Model
    {
        if ($id && $model = BattleInvitation::find($id)) {
            return $model;
        }

        return new BattleInvitation();
    }

    /**
     * @throws Exception
     */
    public function prepareBattle(Kingdom $kingdom): void
    {
        if (!$kingdom->princess) {
            throw new Exception('Kingdom ' . $kingdom->name . ' has no princess');
        }

        $knights = $kingdom->knights()->take(3)->get()->sortByDesc('virtue_score');

        event(new PrepareBattle(
                $this->create(new BattleInvitationData(
                    princess_id: $kingdom->princess->id,
                    relations: [
                        'children' => $knights->map(fn($knight) => ['knight_id' => $knight->id])->toArray(),
                    ]
                )))
        );
    }
}
