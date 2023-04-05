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
        $cats = Cat::query()
            ->where('status', '=', 'available')
            ->orderBy('updated_at', 'desc')
            ->paginate(10);
        // return view('cat.index', [
        //     'cats' => $cats
        // ]);
        return CatResource::collection(Cat::all());
    }



    public function view(Cat $cat)
    {
        return view('cat', ['cat' => $cat]);
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
