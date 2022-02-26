<?php

namespace App\Modules\BattleModule\Battleable;


use App\Modules\BattleModule\Battleable\Traits\HasRelations;
use Illuminate\Database\Eloquent\Model;


/**
 * @property-read int $id
 * @property int $kingdom_id
 * @property int $battleable_id
 * @property string $battleable_type
 */
class Battleable extends Model
{
    use HasRelations;

    protected $guarded = ['id'];
}
