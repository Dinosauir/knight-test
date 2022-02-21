<?php

namespace App\Modules\KnightModule\Knight\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use JsonException;
use Psr\Http\Message\ResponseInterface;
use RuntimeException;

class ApiService
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    private function headers(): array
    {
        return [
            'headers' => ['Accept' => 'application/json']
        ];
    }

    /**
     * @throws GuzzleException|JsonException
     */
    public function retrieveNames(): JsonResponse
    {
        $request = $this->client->request('GET', 'https://jsonplaceholder.typicode.com/users', $this->headers());

        return $this->decode($request);
    }

    /**
     * @throws JsonException|RuntimeException
     */
    private function decode(ResponseInterface $response): JsonResponse
    {
        $response = json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);

        if ($response) {
            return response()->json(['data' => $response], 200);
        }

        throw new RuntimeException('No data found on API {Knight\ApiService}');
    }
}
