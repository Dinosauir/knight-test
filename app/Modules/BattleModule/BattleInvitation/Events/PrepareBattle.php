<?php

namespace App\Modules\BattleModule\BattleInvitation\Events;

use App\Modules\BattleModule\BattleInvitation\BattleInvitation;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PrepareBattle
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public BattleInvitation|Model $invitation)
    {
    }

    public function broadcastOn(): Channel|PrivateChannel|array
    {
        return new PrivateChannel('channel-name');
    }
}
