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

        Log::error(Auth::check());

        Log::error("past");


        Log::error(Auth::id());


        $user = Auth::user();
        $cats = QueryBuilder::for(Cat::class)
            ->where('adopted_by', "=", $user->getAuthIdentifier())
            ->paginate()
            ->appends(request()->query());

        Log::error($cats);

        Log::error(json_encode($user));


        return CatResource::collection($cats);
    }

    public function show(Cat $mycat)
    {
        if (!Auth::check()) {
            return [];
        };

        Log::error(Auth::check());

        Log::error(Auth::id());


        $user = Auth::user();


        Log::error(json_encode($mycat));

        return new CatResource($mycat);
    }
}
