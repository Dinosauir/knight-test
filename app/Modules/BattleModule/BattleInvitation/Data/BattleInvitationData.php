<?php

namespace App\Modules\BattleModule\BattleInvitation\Data;

use Spatie\LaravelData\Data;

class BattleInvitationData extends Data
{
    public function __construct(public int $princess_id, public array $relations = [])
    {
    }
}
