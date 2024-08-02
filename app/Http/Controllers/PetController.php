<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\PetStatusEnum;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Contracts\PetServiceInterface;

class PetController extends Controller
{
    public function __construct(
        private readonly PetServiceInterface $petService,
    ) {
    }

    public function index(): Factory|View|Application
    {
        $pets = $this->petService->getAllPets();
        return view('pets.index', compact('pets'));
    }

    public function show(string $id): Factory|View|Application
    {
        $pet = $this->petService->getPetById($id);
        return view('pets.show', compact('pet'));
    }

    public function create(): Factory|View|Application
    {
        $statuses = PetStatusEnum::cases();
        return view('pets.create', compact('statuses'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->petService->createPet($request->all());

        return redirect()->route('pets.index');
    }

    public function edit(string $id): Factory|View|Application
    {
        $pet = $this->petService->getPetById($id);
        $statuses = PetStatusEnum::cases();
        return view('pets.edit', compact('pet', 'statuses'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $data = $request->all();
        $data['id'] = $id;
        $this->petService->updatePet($data);

        return redirect()->route('pets.index');
    }

    public function destroy(string $id): RedirectResponse
    {
        $this->petService->deletePet($id);
        return redirect()->route('pets.index');
    }
}
