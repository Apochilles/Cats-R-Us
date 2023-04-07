<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Cat;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Resources\V1\CatResource;
use Illuminate\Support\Facades\Log;

class MyCatController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth0.authorize');
    // }
    public function index()
    {
        Log::error("start");

        if (!Auth::check()) {
            return [];
        };

        Log::error("past");


        Log::error(Auth::id());


        $user = Auth::user();
        $cats = QueryBuilder::for(Cat::class)
            ->where('adopted_by', "=", $user->getAuthIdentifier())
            ->paginate()
            ->appends(request()->query());

        Log::error(json_encode($user));


        return CatResource::collection($cats);
    }
}
