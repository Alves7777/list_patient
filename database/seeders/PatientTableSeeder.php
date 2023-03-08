<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Services\Api\Patients\PatientsService;

class PatientTableSeeder extends Seeder
{
    private PatientsService $patientsService;

    public function __construct(PatientsService $patientsService)
    {
        $this->patientsService = $patientsService;
    }

    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            $this->patientsService->create([
                "photo" => "Teste ",//new UploadedFile(public_path() . '/storage/photos/logo.jpeg', 'temp'),
                "patient_name" => "Teste ",
                "mother_name" => "(85) 99999-999",
                "date_birth" => "teste@teste.com",
                "cpf" => "000.000.000-0",
                "cns" => "0000",
                "cep" => "60-82104",
                "zipcode" => "60-82104",
                "address" => "Rua Teste  ",
                "number" => "111",
                "supplement" => "Abc ",
                "neighborhood" => "Abc ",
                "city" => "Fortaleza ",
                "state" => "Ceará ",
            ]);
        }
    }
}
