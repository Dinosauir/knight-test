<?php

namespace App\Modules\KnightModule\Knight\Repositories;

use App\Modules\KnightModule\Knight\Services\ApiService;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use JsonException;

class KnightRepository
{
    public function __construct(private ApiService $apiService)
    {
    }

    /**
     * @throws GuzzleException
     * @throws JsonException
     */
    public function retrieveKnightNames(): array|JsonResponse
    {
        $knight_names = [];

        foreach ($this->apiService->retrieveNames()->getData()->data as $key => $knight) {
            $knight_names[] = $knight->name;

            if ($key === 4) {
                break;
            }
        }

        return $knight_names;
    }
}
