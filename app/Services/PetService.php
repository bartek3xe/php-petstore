<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\PetServiceInterface;

class PetService implements PetServiceInterface
{
    private const BASE_API_URL = 'https://petstore.swagger.io/v2/';


    public function getAllPets()
    {
    }

    public function getPetById(string $id)
    {
    }

    public function createPet(array $data)
    {
    }

    public function updatePet(array $data)
    {
    }

    public function deletePet(string $id)
    {
    }
}
