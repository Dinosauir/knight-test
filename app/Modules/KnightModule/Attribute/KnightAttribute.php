<?php

namespace App\Modules\KnightModule\Attribute;

use App\Modules\KnightModule\Attribute\Traits\HasRelations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property string $name
 * @property int $value
 *
 * @mixin Builder
 */
class KnightAttribute extends Model
{
    use HasFactory;
    use HasRelations;
}
