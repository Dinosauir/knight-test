<?php

namespace App\Providers;

use App\Modules\BattleModule\BattleInvitation\BattleInvitation;
use App\Modules\BattleModule\BattleInvitation\BattleInvitationItem;
use App\Modules\BattleModule\BattleInvitation\Events\PrepareBattle;
use App\Modules\BattleModule\BattleInvitation\Listeners\SendEmailPrincessApprovalNotification;
use App\Modules\BattleModule\BattleInvitation\Observers\BattleInvitationItemObserver;
use App\Modules\BattleModule\BattleInvitation\Observers\BattleInvitationObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        PrepareBattle::class => [
            SendEmailPrincessApprovalNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        BattleInvitation::observe(BattleInvitationObserver::class);
        BattleInvitationItem::observe(BattleInvitationItemObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
