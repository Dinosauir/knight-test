<?php

namespace App\Modules\KnightModule\Knight\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\KingdomModule\Kingdom\Kingdom;
use App\Modules\KnightModule\Knight\Knight;
use App\Modules\KnightModule\Knight\Services\KnightService;
use RuntimeException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
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
            Knight::query()->get()->each(function ($knight) {
                $knight->delete();
            });

            foreach ($this->knightService->generateKnightsData($kingdom) as $knight_data) {
                $this->knightService->create($knight_data);
            }

            return redirect()->route('home')->with('success', 'Successfully generated knights for kingdom {' . $kingdom->name . '} !');
        } catch (RuntimeException $e) {
            return redirect()->route('home')->with('error', 'Failed to generate knights: ' . $e->getMessage());
        } catch (Throwable $exception) {
            Log::warning('KnightController\generateToDatabase : ' . $exception->getMessage());

            return redirect()->route('home')->with('error', 'Failed to generate knights, check logs!');
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
            throw new RuntimeException('There is not kingdom with name {' . $kingdom_name . '}');
        }

        return $kingdom;
    }
}



