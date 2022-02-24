<?php

namespace App\Modules\BattleModule\BattleInvitation\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\BattleModule\BattleInvitation\BattleInvitationItem;
use App\Modules\BattleModule\BattleInvitation\Services\BattleInvitationService;
use App\Modules\KingdomModule\Kingdom\Kingdom;
use Exception;
use RuntimeException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class BattleInvitationController extends Controller
{
    public function __construct(private BattleInvitationService $battleInvitationService,)
    {
    }

    public function prepareBattle(string $kingdomName): RedirectResponse
    {
        try {
            $kingdom = $this->checkForBattleableAndKingdom($kingdomName);

            return DB::transaction(function () use ($kingdom) {
                $this->battleInvitationService->prepareBattle($kingdom);

                return redirect()->route('home')->with('success', 'Successfully generated invitations for the battle!');
            });
        } catch (\RuntimeException $e) {
            return redirect()->route('home')->with('error', 'Failed to generate battle invitations: ' . $e->getMessage());
        } catch (Throwable $exception) {
            throw $exception;
            Log::warning('BattleInvitationController\prepareBattlee : ' . $exception->getMessage());

            return redirect()->route('home')->with('error', 'Cannot prepare battle, check logs!');
        }
    }

    public function reject(string $token): RedirectResponse
    {
        try {
            /** @var BattleInvitationItem $item */
            if (!$item = BattleInvitationItem::pending()->where('token', $token)->first()) {
                throw new RuntimeException('There is no invitation with that code in pending!');
            }

            $item->reject();

            return redirect()->route('home')->with('success', 'Battleable {' . $item->battleable->finalModel->name . '} rejected successfully! You can begin the battle now!');
        } catch (RuntimeException $e) {
            return redirect()->route('home')->with('error', $e->getMessage());
        } catch (Throwable $e) {
            Log::warning('BattleInvitationController\reject : ' . $e->getMessage());

            return redirect()->route('home')->with('error', 'Cannot reject battleable, check logs!');
        }
    }

    /**
     * @throws Exception
     */
    private function checkForBattleableAndKingdom(string $kingdomName): Kingdom
    {
        /** @var Kingdom $kingdom * */
        $kingdom = Kingdom::query()->where('name', $kingdomName)->first();

        if (!$kingdom) {
            throw new RuntimeException('There is no kingdom to prepare the battle');
        }

        if (!$kingdom->princess) {
            throw new RuntimeException('Kingdom ' . $kingdom->name . ' has no princess');
        }

        if ($kingdom->battleables()->count() === 0) {
            throw new RuntimeException('There is no battleable in the kingdom {' . $kingdom->name . '}');
        }

        return $kingdom;
    }
}
