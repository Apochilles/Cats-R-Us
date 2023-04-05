<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;


class Cat extends Model
{
    use HasFactory;
    use HasSlug;


    protected $fillable = ['name', 'slug', 'fiv', 'gender', 'description', 'temperament', 'fee', 'size', 'fur', 'desexed', 'wormed', 'fiv', 'image', 'status', 'age', 'breed'];


    public function getSlugOptions(): SlugOptions
    {

        return SlugOptions::create()
            ->generateSlugsfrom('title')
            ->saveSlugsTo('slug');
    }
}
