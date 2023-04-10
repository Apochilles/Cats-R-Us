<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCatRequest;
use App\Http\Resources\V1\CatResource;
use App\Models\Cat;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;



class CatController extends Controller
{

    public function index()
    {
        $cats = QueryBuilder::for(Cat::class)
            ->whereNull('adopted_by')
            ->where('status', '=', 'available')
            ->allowedFilters([AllowedFilter::exact('gender'), 'name', 'fiv', 'temperament', 'fee', 'size', 'fur', 'desexed', 'wormed', 'image', 'status', 'age', 'breed'])
            // ->paginate($request->get('perPage', 15));
            ->paginate()
            ->appends(request()->query());



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
