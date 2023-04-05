<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCatRequest;
use App\Http\Resources\V1\CatResource;
use App\Models\Cat;
use Illuminate\Http\Request;

class CatController extends Controller
{
    public function index()
    {
        $cats = Cat::withFilters(
            request()->input('age', []),
            request()->input('gender', []),
            request()->input('size', [])
        )->get();

        // return CatResource::collection(Cat::all());
        return CatResource::collection($cats);
    }


    public function show(Cat $cat)
    {

        return new CatResource($cat);
    }


    public function store(StoreCatRequest $request)
    {

        Cat::create($request->validated());
        return response()->json("Cat Created");
    }

    public function update(StoreCatRequest $request, Cat $cat)
    {

        $cat->update($request->validated());
        return response()->json("Cat Updated");
    }

    public function destroy(Cat $cat)
    {
        $cat->delete();
        return response()->json("Cat Deleted");
    }
    public function search()
    {
        $searchQuery = request('query');

        dd($searchQuery);
    }
}
