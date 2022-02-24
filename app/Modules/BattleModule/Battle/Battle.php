<?php

namespace App\Modules\BattleModule\Battle;

use App\Modules\BattleModule\Battle\Traits\HasRelations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property int $battle_invitation_id
 *
 * @mixin Builder
 */
class Battle extends Model
{
    use HasRelations;

    protected $guarded = ['id'];
}
