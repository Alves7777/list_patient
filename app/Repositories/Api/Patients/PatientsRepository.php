<?php

namespace App\Repositories\Api\Patients;

use App\Models\PatientList;
use Illuminate\Database\Eloquent\Collection;

class PatientsRepository
{
    private PatientList $entity;

    public function __construct()
    {
        $this->entity = app(PatientList::class);
    }

    public function all(): Collection
    {
        return $this->entity
            ->newQuery()
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    public function create(array $property)
    {
        return $this->entity->newQuery()->create($property);
    }

    public function update(string $id, array $property)
    {
        $freight = $this->findOrFail($id);
        return $freight->update($property);
    }

    public function findOrFail(string $id)
    {
        return $this->entity->newQuery()->findOrFail($id);
    }

    public function delete(string $id)
    {
        $freight = $this->findOrFail($id);
        return $freight->delete();
    }

}
