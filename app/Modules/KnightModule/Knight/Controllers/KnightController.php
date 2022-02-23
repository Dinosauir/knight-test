<?php

namespace App\Modules\KnightModule\Knight\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\KnightModule\Knight\Knight;
use App\Modules\KnightModule\Knight\Services\KnightService;
use Illuminate\Database\Eloquent\Collection;

class KnightController extends Controller
{
    public function __construct(private KnightService $service)
    {
    }

    public function battle(Collection $knights)
    {
        /** @var Knight $attacker */
        $attacker = $knights->sortByDesc('virtue_score')->first();
        /** @var Knight $defender */
        $defender = $knights->sortByDesc('virtue_score')->last();
    }
}



