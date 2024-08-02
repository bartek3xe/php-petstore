<?php

declare(strict_types=1);

namespace App\Contracts;

interface PetServiceInterface
{
    public function getAllPets();
    public function getPetById(string $id);
    public function createPet(array $data);
    public function updatePet(array $data);
    public function deletePet(string $id);
}
