<?php

namespace App\Modules\KnightModule\Knight\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\KnightModule\Knight\Knight;
use App\Modules\KnightModule\Knight\Services\KnightService;
use GuzzleHttp\Exception\GuzzleException;

class KnightController extends Controller
{
    public function __construct(private KnightService $service)
    {

    }

    public function index()
    {
        try {
            if (!Knight::first()) {
                $this->generateToDatabase();
            }

            dd(Knight::with(['virtues', 'attributes','kingdom'])->first()?->toArray());
        } catch (\Throwable $exception) {
            dd($exception);
        }

    }

    /**
     * @throws GuzzleException
     * @throws \JsonException
     */
    private function generateToDatabase(): void
    {
        Knight::query()->delete();

        foreach ($this->service->generateKnightsData() as $knight_data) {
            $this->service->create($knight_data);
        }
    }
}



