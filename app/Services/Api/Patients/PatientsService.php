<?php

namespace App\Services\Api\Patients;

use App\Repositories\Api\Patients\PatientsRepository;
use App\Services\Api\ZipCode\SearchZipCodeService;
use App\Traits\UploadFile;
use Illuminate\Support\Collection;

class PatientsService
{
    use UploadFile;
    private PatientsRepository $patientsRepository;
    private SearchZipCodeService $searchZipCodeService;

    public function __construct(PatientsRepository $patientsRepository, SearchZipCodeService $searchZipCodeService)
    {
        $this->patientsRepository = $patientsRepository;
        $this->searchZipCodeService = $searchZipCodeService;

    }

    public function all(): Collection
    {
        return $this->patientsRepository->all();
    }

    public function create(array $property)
    {
//        if (!empty($property['photo'])) {
//            $property['photo'] = $this->uploadPhoto($property['photo']);
//        }

        $cep = $this->searchZipCodeService->getZipCode($property['zipcode']);

        $property["address"] = $cep['logradouro'];
        $property["supplement"] = $cep['complemento'] ?? $property['supplement'];
        $property["neighborhood"] = $cep['bairro'];
        $property["city"] = $cep['localidade'];
        $property["state"] = $cep['uf'];

        return $this->patientsRepository->create($property);
    }

    public function update(string $id, array $property)
    {
//        if (!empty($property['photo'])) {
//            $property['photo'] = $this->uploadPhoto($property['photo']);
//        }

        return $this->patientsRepository->update($id, $property);
    }

    public function findOrFail(string $id)
    {
        return $this->patientsRepository->findOrFail($id);
    }

    public function delete(string $id)
    {
        return $this->patientsRepository->delete($id);
    }
}
