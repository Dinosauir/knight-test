<?php

namespace App\Modules\BattleModule\BattleInvitation\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\BattleModule\BattleInvitation\BattleInvitationItem;
use App\Modules\BattleModule\BattleInvitation\Services\BattleInvitationService;
use App\Modules\KingdomModule\Kingdom\Kingdom;
use App\Modules\KnightModule\Knight\Knight;
use App\Modules\KnightModule\Knight\Services\KnightService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Throwable;

class BattleInvitationController extends Controller
{
    public function __construct(
        private BattleInvitationService $battleInvitationService,
        private KnightService           $knightService
    )
    {
    }

    public function prepareBattle(int $kingdomId): Response
    {
        if (!Knight::first() && $this->generateToDatabase()->getStatusCode() === 500) {
            return $this->generateToDatabase();
        }

        try {
            return DB::transaction(function () use ($kingdomId) {
                $this->battleInvitationService->prepareBattle(Kingdom::find($kingdomId));

                return response('Successfully generated invitations for the battle!', 200);
            });
        } catch (Throwable $exception) {
            return response('Failed to generate battle invitations: ' . $exception->getMessage(), 500);
        }

    }

    public function reject(string $token): Response
    {
        $item = BattleInvitationItem::pending()->where('token', $token)->first();

        try {
            $item?->reject();

            return response('Knight {' . $item->knight->name . '} rejected successfully!');
        } catch (Throwable $e) {
            return response('Failed to reject knight: ' . $e->getMessage(), 500);
        }
    }

    private function generateToDatabase(): Response
    {
        try {
            Knight::query()->delete();

            foreach ($this->knightService->generateKnightsData() as $knight_data) {
                $this->knightService->create($knight_data);
            }

            return response('Generated successfully!', 200);
        } catch (Throwable $exception) {
            return response('Failed to generate data: ' . $exception->getMessage(), 500);
        }
    }
}
