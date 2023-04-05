<?php

namespace App\Services;

use App\Models\Cat;

class PriceService
{
    private $fees;
    // private $priceegories;
    // private $manufacturers;

    public function getPrices($fees)
    {
        $this->fees = $fees;
        // $this->priceegories = $priceegories;
        // $this->manufacturers = $manufacturers;
        $formattedPrices = [];

        foreach (Cat::PRICES as $index => $name) {
            $formattedPrices[] = [
                'name' => $name,
                'cat_count' => $this->getCatCount($index)
            ];
        }

        return $formattedPrices;
    }

    private function getCatCount($index)
    {
        return Cat::withFilters($this->fees)
            ->when($index == 0, function ($query) {
                $query->where('fee', '<', '250');
            })
            ->when($index == 1, function ($query) {
                $query->whereBetween('fee', ['250', '500']);
            })
            ->when($index == 2, function ($query) {
                $query->whereBetween('fee', ['500', '750']);
            })
            ->when($index == 3, function ($query) {
                $query->where('fee', '>', '1000');
            })
            ->count();
    }
}
