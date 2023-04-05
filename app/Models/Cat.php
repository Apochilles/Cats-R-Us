<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Cat extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'fiv', 'gender', 'description', 'temperament', 'fee', 'size', 'fur', 'desexed', 'wormed', 'fiv', 'image', 'status', 'age', 'breed', 'price'];

    const Ages = [
        'Kitten',
        'Adult',
        'Senior',
    ];

    const PRICES = [
        'Less than 250',
        'From 250 to 500',
        'From 750 to 1000',
        'More than 1000',
    ];


    public function scopeWithFilters($query, $prices, $cats)
    {
        return $query->when(count($cats), function ($query) use ($cats) {
        })
            ->when(count($prices), function ($query) use ($prices) {
                $query->where(function ($query) use ($prices) {
                    $query->when(in_array(0, $prices), function ($query) {
                        $query->orWhere('price', '<', '5000');
                    })
                        ->when(in_array(1, $prices), function ($query) {
                            $query->orWhereBetween('price', ['5000', '10000']);
                        })
                        ->when(in_array(2, $prices), function ($query) {
                            $query->orWhereBetween('price', ['10000', '50000']);
                        })
                        ->when(in_array(3, $prices), function ($query) {
                            $query->orWhere('price', '>', '50000');
                        });
                });
            });
    }
}
