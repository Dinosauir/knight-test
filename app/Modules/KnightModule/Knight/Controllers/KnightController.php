<?php

namespace App\Modules\KnightModule\Knight\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\KingdomModule\Kingdom\Kingdom;
use App\Modules\KnightModule\Knight\Knight;
use App\Modules\KnightModule\Knight\Services\KnightService;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Throwable;

class KnightController extends Controller
{
    public function __construct(private KnightService $knightService)
    {
    }

    public function generateToDatabase(string $kingdom_name): RedirectResponse
    {
        try {
            $kingdom = $this->findOrFailKingdom($kingdom_name);

            Knight::query()->delete();

            foreach ($this->knightService->generateKnightsData($kingdom) as $knight_data) {
                $this->knightService->create($knight_data);
            }

            return redirect()->route('home')->with('success', 'Successfully generated knights for kingdom {' . $kingdom->name . '} !');
        } catch (Throwable $exception) {
            return redirect()->route('home')->with('error', 'Failed to generate knights: ' . $exception->getMessage());
        }
    }

    /*
     * @throws Exception
     */
    private function findOrFailKingdom(string $kingdom_name): Kingdom
    {
        /** @var Kingdom|null $kingdom */
        $kingdom = Kingdom::query()->where('name', $kingdom_name)->first();
        if (!$kingdom) {
            throw new Exception('There is not kingdom with name {' . $kingdom_name . '}');
        }

        return $kingdom;
    }

    public function battle(Collection $knights)
    {
        /** @var Knight $attacker */
        $attacker = $knights->sortByDesc('virtue_score')->first();
        /** @var Knight $defender */
        $defender = $knights->sortByDesc('virtue_score')->last();
    }
}



