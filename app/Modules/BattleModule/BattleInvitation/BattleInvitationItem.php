<?php

namespace App\Modules\BattleModule\BattleInvitation;

use App\Modules\BattleModule\BattleInvitation\Traits\ItemHasActions;
use App\Modules\BattleModule\BattleInvitation\Traits\ItemHasRelations;
use App\Modules\BattleModule\BattleInvitation\Traits\ItemHasScopes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property string $status
 * @property int $knight_id
 * @property string $token
 *
 * @mixin Builder
 */
class BattleInvitationItem extends Model
{
    use HasFactory;
    use ItemHasRelations;
    use ItemHasActions;
    use ItemHasScopes;

    public const STATUSES = [
        'pending' => 'pending',
        'rejected' => 'rejected',
        'accepted' => 'accepted'
    ];

    protected $guarded = ['id'];
}
