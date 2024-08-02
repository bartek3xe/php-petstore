<?php

declare(strict_types=1);

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Log\LoggerInterface;

readonly class HttpRequestService
{
    public function __construct(private Client $client, private LoggerInterface $logger)
    {
    }

    public function makeRequest(string $method, string $url, array $options = []): array
    {
        try {
            $response = $this->client->request($method, $url, $options);
            return json_decode($response->getBody()->getContents(), true);
        } catch(GuzzleException $e) {
            $this->logger->error('Guzzle error: ' . $e->getMessage());

            return [];
        }
    }
}
