<?php

namespace App\Modules\BattleModule\Battle\Controllers;

use App\Modules\BattleModule\BattleInvitation\BattleInvitation;
use App\Modules\KnightModule\Knight\Knight;

class BattleController
{
    public function index()
    {
        $battles = BattleInvitation::paginate(20);

        return view('pages.battle.index', compact('battles'));
    }

    public function show(int $id)
    {
        $battleInvitation = BattleInvitation::find($id);
        $knights = $battleInvitation->children()->accepted()->get()->map(fn($child) => $child->knight)->sortByDesc('virtue_score');
        return view('pages.battle.show', compact('battleInvitation', 'knights'));
    }

    public function battle(int $id)
    {
        /**
         *  Clem 1 dmg 30 aparare 5
         *  Kim 2 dmg 15 aparare 10
         *
         *  clem ->
         */
        //#TODO create battles -> battle_logs from invitation
        /**
         * battle_invitation_id
         * logs: knight_id action_type action_value
         *        1         attack      30
         *        2         survive     70
         *        2         attack      50
         *       1          survive     50
         *       1           attack     50
         *       2          death       20
         */
        $battleInvitation = BattleInvitation::find($id);
        $knights = $battleInvitation->children()->accepted()->get()->map(fn($child) => $child->knight)->sortByDesc('virtue_score');

        /** @var Knight $attacker */
        $attacker = $knights->first();
        /** @var Knight $attacker */
        $defender = $knights->last();
        dd($attacker->attack($defender));
    }
}
