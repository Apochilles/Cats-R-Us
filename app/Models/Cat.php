<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Cat extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'fiv', 'gender', 'description', 'temperament', 'fee', 'size', 'fur', 'desexed', 'wormed', 'fiv', 'image', 'status', 'age', 'breed', 'adopted_by'];
}
