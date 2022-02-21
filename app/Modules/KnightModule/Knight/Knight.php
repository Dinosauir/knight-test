<?php

namespace App\Modules\KnightModule\Knight;

use App\Modules\KnightModule\Knight\Traits\HasRelations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
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

    protected $guarded = ['id'];

    protected $appends = ['virtue_score'];

    protected function virtueScore(): Attribute
    {
        return new Attribute(
            get: fn() => (float)number_format($this->virtues()->avg('value'),2),
        );
    }
}
