<?php

namespace App\Modules\KnightModule\Virtue;

use App\Modules\KnightModule\Virtue\Traits\HasRelations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property int $knight_id
 * @property int $value
 * @property string $name
 *
 * @mixin Builder
 */
class KnightVirtue extends Model
{
    use HasFactory;
    use HasRelations;
}
