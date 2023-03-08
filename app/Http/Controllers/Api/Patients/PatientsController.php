<?php

namespace App\Http\Controllers\Api\Patients;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Patients\PatientsRequest;
use App\Services\Api\Patients\PatientsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class PatientsController extends Controller
{
    private PatientsService $patientsService;

    public function __construct(PatientsService $patientsService)
    {
        $this->patientsService = $patientsService;
    }

    public function index(): JsonResponse
    {
        try {
            $patients = $this->patientsService->all();
            return response()->json([
                'data' => $patients,
                'message' => 'Listed Success']);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ],400);
        }
    }

    public function store(PatientsRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $patients = $this->patientsService->create($request->validated());
            DB::commit();
            return response()->json([
                'data' => $patients,
                'message' => 'Successfully Created'], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage()
            ],400);        }
    }

    public function update(PatientsRequest $request, string $id): JsonResponse
    {
        try {
            DB::beginTransaction();
            $patients = $this->patientsService->update($id, $request->validated());
            DB::commit();
            return response()->json([
                'data' => $patients,
                'message' => 'Updated Successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage()
            ],400);        }
    }

    public function destroy(string $id): JsonResponse
    {
        try {
            DB::beginTransaction();
            $patients = $this->patientsService->delete($id);
            DB::commit();
            return response()->json([
                'data' => $patients,
                'message' => 'Successfully Deleted'],204);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage()
            ],500);        }
    }
}
