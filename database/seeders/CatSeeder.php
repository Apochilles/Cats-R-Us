<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use App\Models\Cat;


class CatSeeder extends Seeder
{

    public function run()
    {


        Cat::factory()->count(50)
            ->sequence(fn ($sequence) => ['image' => strval($sequence->index + 1) . ".jpg"])
            ->create();
    }
}
