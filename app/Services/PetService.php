<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\PetServiceInterface;
use App\Enums\PetStatusEnum;

class PetService implements PetServiceInterface
{
    public const BASE_API_URL = 'https://petstore.swagger.io/v2/';

    public function __construct(private readonly HttpRequestService $httpRequestService)
    {
    }

    public function getAllPets(): array
    {
        $allPets = [];

        foreach (PetStatusEnum::values() as $status) {
            $pets = $this->httpRequestService->makeRequest('GET', 'pet/findByStatus', [
                'query' => ['status' => $status]
            ]);

            if ($pets) {
                $allPets = array_merge($allPets, $pets);
            }
        }

        return $allPets;
    }

    public function getPetById(string $id): array
    {
        return $this->httpRequestService->makeRequest('GET', "pet/{$id}");
    }

    public function createPet(array $data): array
    {
        return $this->httpRequestService->makeRequest('POST', 'pet', ['json' => $data]);
    }

    public function updatePet(array $data): array
    {
        return $this->httpRequestService->makeRequest('PUT', 'pet', ['json' => $data]);
    }

    public function deletePet(string $id): array
    {
        return $this->httpRequestService->makeRequest('DELETE', "pet/{$id}");
    }
}
