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

    public function prepareBattle(Kingdom $kingdom): void
    {
        $battleables = $kingdom->battleables()->take(3)->get();

        $invitation = $this->create(new BattleInvitationData(
            princess_id: $kingdom->princess->id,
            relations: [
                'children' => $battleables->map(fn($battleable) => ['battleable_id' => $battleable->id])->toArray(),
            ]));

        event(new PrepareBattle($invitation));
    }
}
