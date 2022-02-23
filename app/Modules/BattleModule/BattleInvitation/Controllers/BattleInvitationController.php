<?php

namespace App\Modules\BattleModule\BattleInvitation\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\BattleModule\BattleInvitation\BattleInvitationItem;
use App\Modules\BattleModule\BattleInvitation\Services\BattleInvitationService;
use App\Modules\KingdomModule\Kingdom\Kingdom;
use App\Modules\KnightModule\Knight\Knight;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class BattleInvitationController extends Controller
{
    public function __construct(private BattleInvitationService $battleInvitationService,)
    {
    }

    public function prepareBattle(string $kingdomName): RedirectResponse
    {
        try {
            $kingdom = $this->checkForKnightAndKingdom($kingdomName);

            return DB::transaction(function () use ($kingdom) {
                $this->battleInvitationService->prepareBattle($kingdom);

                return redirect()->route('home')->with('success', 'Successfully generated invitations for the battle!');
            });
        } catch (Throwable $exception) {
            return redirect()->route('home')->with('error', 'Failed to generate battle invitations: ' . $exception->getMessage());
        }
    }

    public function reject(string $token)
    {
        try {
            /** @var BattleInvitationItem $item */
            if (!$item = BattleInvitationItem::pending()->where('token', $token)->first()) {
                throw new Exception('There is no invitation with that code in pending!');
            }

            $item->reject();

            return redirect()->route('home')->with('success', 'Knight {' . $item->knight->name . '} rejected successfully! You can begin the battle now!');
        } catch (Throwable $e) {
            return redirect()->route('home')->with('error', $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    private function checkForKnightAndKingdom(string $kingdomName): Kingdom
    {
        /** @var Kingdom $kingdom * */
        $kingdom = Kingdom::query()->where('name', $kingdomName)->first();

        if (!$kingdom) {
            throw new Exception('There is no kingdom to prepare the battle');
        }
        if (!Knight::first()) {
            throw new Exception('There is no knight in the kingdom {' . $kingdom->name . '}');
        }

        return $kingdom;
    }
}
