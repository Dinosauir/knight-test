<?php

namespace App\Modules\AttributeModule\Attribute;

use App\Modules\AttributeModule\Attribute\Traits\HasRelations;
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
class Attribute extends Model
{
    use HasFactory;
    use HasRelations;

    protected $guarded = ['id'];
}
