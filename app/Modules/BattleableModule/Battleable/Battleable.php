<?php

namespace App\Modules\BattleableModule\Battleable;

use App\Modules\BattleModule\Battle\BattleLog;
use App\Modules\KingdomModule\Kingdom\Kingdom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property-read int $id
 * @property int $kingdom_id
 * @property int $battleable_id
 * @property string $battleable_type
 * @property MorphTo $finalModel
 */
class Battleable extends Model
{
    protected $guarded = ['id'];

    public function kingdom(): BelongsTo
    {
        return $this->belongsTo(Kingdom::class, 'kingdom_id', 'id');
    }

    public function finalModel(): MorphTo
    {
        return $this->morphTo(null, 'battleable_type', 'battleable_id');
    }

    public function battles()
    {
        return $this->hasMany(BattleLog::class);
    }
}
