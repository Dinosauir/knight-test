<?php

namespace App\Modules\BattleModule\BattleInvitation;

use App\Modules\BattleModule\BattleInvitation\Traits\HasActions;
use App\Modules\BattleModule\BattleInvitation\Traits\HasRelations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property string $status
 * @property int $princess_id
 *
 * @mixin Builder
 */
class BattleInvitation extends Model
{
    use HasFactory;
    use HasRelations;
    use HasActions;

    protected $guarded = ['id'];

    public const STATUSES = [
        'pending' => 'pending',
        'ready' => 'ready'
    ];
}
