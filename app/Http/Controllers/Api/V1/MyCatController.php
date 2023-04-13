<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\V1\CatResource;
use App\Models\Cat;
use Illuminate\Support\Facades\Log;

class MyCatController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return [];
        };



        $user = Auth::user();
        $cats = QueryBuilder::for(Cat::class)
            ->where('adopted_by', "=", $user->getAuthIdentifier())
            ->paginate()
            ->appends(request()->query());




        return CatResource::collection($cats);
    }

    public function show(Cat $mycat)
    {
        if (!Auth::check()) {
            return [];
        };

        $user = Auth::user();


        if ($mycat->adopted_by !== $user->getAuthIdentifier()) {
            return response("You don't have permission to view this cat", 404);
        }


        return new CatResource($mycat);
    }
}
