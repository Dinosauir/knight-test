<?php

namespace App\Modules\KnightModule\Knight;

use App\Contracts\InterfaceCanBattle;
use App\Modules\KnightModule\Knight\Traits\HasRelations;
use App\Traits\CanBattle;
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
    use HasRelations;
    use CanBattle;

    protected $guarded = ['id'];



}
