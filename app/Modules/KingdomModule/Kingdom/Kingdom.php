<?php

namespace App\Modules\KingdomModule\Kingdom;

use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property string $name
 */
class Kingdom extends Model
{
    protected $guarded = ['id'];
}
