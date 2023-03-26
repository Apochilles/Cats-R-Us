<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'fivstatus', 'gender', 'description', 'colour', 'temperment', 'size'];
}
