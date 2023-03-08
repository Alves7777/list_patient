<?php

namespace App\Http\Controllers\Api\ZipCode;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ZipCode\SearchZipRequest;
use App\Services\Api\ZipCode\SearchZipCodeService;
use Illuminate\Http\JsonResponse;

class SearchZipController extends Controller
{
    private SearchZipCodeService $searchZipCodeService;

    public function __construct(SearchZipCodeService $searchZipCodeService )
    {
        $this->searchZipCodeService  = $searchZipCodeService ;
    }

    public function getApiZipCode(SearchZipRequest $request): JsonResponse
    {
        try {
            return response()->json($this->searchZipCodeService->getZipCode($request->zipcode));
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()],400);
        }
    }
}
