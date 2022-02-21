<?php

namespace App\Modules\KnightModule\Knight;

use App\Modules\KnightModule\Knight\Traits\HasRelations;
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
class Knight extends Model
{
    use HasFactory;
    use HasRelations;
}
