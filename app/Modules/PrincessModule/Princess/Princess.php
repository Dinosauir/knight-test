<?php

namespace App\Modules\PrincessModule\Princess;

use App\Modules\KingdomModule\Kingdom\Kingdom;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Modules\PrincessModule\Princess\Traits\HasRelations;

/**
 * @property-read int $id
 * @property string $name
 * @property string $email
 * @property int $kingdom_id
 *
 * @mixin Builder
 */
class Princess extends Model
{
    use Notifiable;
    use HasRelations;

    protected $guarded = ['id'];


}
