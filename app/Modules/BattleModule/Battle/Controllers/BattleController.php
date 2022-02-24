<?php

namespace App\Modules\BattleModule\Battle\Controllers;

use App\Modules\BattleModule\Battle\Services\BattleService;
use App\Modules\BattleModule\BattleInvitation\BattleInvitation;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class BattleController
{
    public function __construct(private BattleService $battleService)
    {
    }

    public function index(): View
    {
        $battles = BattleInvitation::paginate(20);

        return view('pages.battle.index', compact('battles'));
    }

    public function show(int $id): View|RedirectResponse
    {
        if ((!$battleInvitation = BattleInvitation::find($id)) || $battleInvitation->status !== BattleInvitation::STATUSES['ready']) {
            return redirect()->route('battle.index')->with('error', 'There is no knight rejected or no battle with that id!');
        }

        $battleables = $battleInvitation->children()
            ->accepted()
            ->get()
            ->map(fn($child) => $child->battleable->finalModel)
            ->sortByDesc('virtue_score');

        return view('pages.battle.show', compact('battleInvitation', 'battleables'));
    }

    public function battle(int $id): Response
    {
        try {
            $battle = $this->battleService->findOrCreateBattle(BattleInvitation::findOrFail($id));

            return response(['data' => $battle->logs], 200);
        } catch (\Throwable $e) {
            throw $e;
            Log::warning('BattleController\battle :' . $e->getMessage());

            return response(['error' => 'Cannot create battle, check logs!'], 500);
        }
    }
}
