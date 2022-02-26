<?php

namespace App\Modules\KnightModule\Knight;

use App\Modules\BattleModule\Battleable\Contracts\InterfaceCanBattle;
use App\Modules\BattleModule\Battleable\Traits\CanBattle;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property string $name
 * @property int $age
 *
 * @mixin Builder
 */
class Knight extends Model implements InterfaceCanBattle
{
    use HasFactory;
    use CanBattle;

    protected $guarded = ['id'];
}
