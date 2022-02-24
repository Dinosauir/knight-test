<?php


namespace App\Modules\BattleModule\Battle;

use App\Modules\BattleableModule\Battleable\Battleable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property-read int $id
 * @property int $battle_id
 * @property int $battleable_id
 * @property string $action_type
 * @property float $action_value
 *
 * @mixin Builder
 */
class BattleLog extends Model
{
    protected $guarded = ['id'];

    public function battleable(): BelongsTo
    {
        return $this->belongsTo(Battleable::class, 'battleable_id', 'id');
    }
}
