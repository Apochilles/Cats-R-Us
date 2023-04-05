<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Cat extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'fiv', 'gender', 'description', 'temperament', 'fee', 'size', 'fur', 'desexed', 'wormed', 'fiv', 'image', 'status', 'age', 'breed',];

    const AGES = [
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


    public function scopeWithFilters($query, $fees)
    {
        return $query->when(count($fees), function ($query) use ($fees) {
            $query->whereIn('manufacturer_id', $fees);
        })

            ->when(count($fees), function ($query) use ($fees) {
                $query->where(function ($query) use ($fees) {
                    $query->when(in_array(0, $fees), function ($query) {
                        $query->orWhere('fee', '<', '5000');
                    })
                        ->when(in_array(1, $fees), function ($query) {
                            $query->orWhereBetween('fee', ['5000', '10000']);
                        })
                        ->when(in_array(2, $fees), function ($query) {
                            $query->orWhereBetween('fee', ['10000', '50000']);
                        })
                        ->when(in_array(3, $fees), function ($query) {
                            $query->orWhere('price', '>', '50000');
                        });
                });
            });
    }
}
