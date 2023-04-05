<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\PriceService;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index(PriceService $priceService)
    {
        $fees = $priceService->getPrices(
            request()->input('fees', []),
        );

        return response()->json($fees);
    }
}
