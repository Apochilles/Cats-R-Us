<?php

namespace App\Services;

use App\Models\Cat;

class CatService
{
    private $cats;
    // private $categories;
    // private $manufacturers;

    public function getCats($cats)
    {
        $this->cats = $cats;
        // $this->categories = $categories;
        // $this->manufacturers = $manufacturers;
        $formattedPrices = [];

        foreach (Cat::PRICES as $index => $name) {
            $formattedPrices[] = [
                'name' => $name,
                'cats_count' => $this->getCatCount($index)
            ];
        }

        return $formattedPrices;
    }

    private function getCatCount($index)
    {
        return Cat::withFilters($this->prices)
            ->when($index == 0, function ($query) {
                $query->where('price', '<', '5000');
            })
            ->when($index == 1, function ($query) {
                $query->whereBetween('price', ['5000', '10000']);
            })
            ->when($index == 2, function ($query) {
                $query->whereBetween('price', ['10000', '50000']);
            })
            ->when($index == 3, function ($query) {
                $query->where('price', '>', '50000');
            })
            ->count();
    }
}
