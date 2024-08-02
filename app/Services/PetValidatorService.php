<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Validation\Factory as ValidationFactory;
use Illuminate\Validation\ValidationException;

class PetValidatorService
{
    public function __construct(protected readonly ValidationFactory $validator)
    {
    }

    /**
     * @throws ValidationException
     */
    public function validateStore(array $data): void
    {
        $this->validator->make($data, [
            'name' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ])->validate();
    }

    /**
     * @throws ValidationException
     */
    public function validateUpdate(array $data): void
    {
        $this->validator->make($data, [
            'name' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ])->validate();
    }
}
