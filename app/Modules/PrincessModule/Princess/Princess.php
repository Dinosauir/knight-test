<?php

namespace App\Modules\PrincessModule\Princess;

use App\Modules\KingdomModule\Kingdom\Kingdom;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

/**
 * @property-read int $id
 * @property string $name
 * @property string $email
 * @property int $kingdom_id
 * @property Kingdom $kingdom
 *
 * @mixin Builder
 */
class Princess extends Model
{
    use Notifiable;

    protected $guarded = ['id'];

    public function kingdom(): BelongsTo
    {
        return $this->belongsTo(Kingdom::class, 'kingdom_id', 'id');
    }
}
