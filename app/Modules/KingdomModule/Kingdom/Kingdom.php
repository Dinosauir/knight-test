<?php

namespace App\Modules\KingdomModule\Kingdom;

use App\Modules\KingdomModule\Kingdom\Traits\HasRelations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property string $name
 *
 * @mixin Builder
 */
class Kingdom extends Model
{
    use HasRelations;

    protected $guarded = ['id'];
}
