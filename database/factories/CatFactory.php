<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cat>
 */
class CatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        $fivValues = ['positive', 'negative'];
        $genderValues = ['male', 'female'];
        $breedValues = ['DSH', 'non-DSH'];
        $temperamentValues = ['shy', 'average', 'confident'];
        $sizeValues = ['small', 'medium', 'large'];
        $furValues = ['short', 'long'];
        $yesNo = ['yes', 'no'];
        $status = ['available', 'adopted'];
        $name = $this->faker->firstName();
        $number = 1;
        return [


            'name' => $name,
            'slug' => $name,
            'fee' => random_int(100, 1000),
            'fiv' => $fivValues[rand(0, 1)],
            'gender' => $genderValues[rand(0, 1)],
            'description' => $this->faker->paragraph($nbSentences = 1, $variableNbSentences = true),
            'temperament' => $temperamentValues[rand(0, 2)],
            'size' => $sizeValues[rand(0, 2)],
            'fur' => $furValues[rand(0, 1)],
            'desexed' => $yesNo[rand(0, 1)],
            'vaccinated' => $yesNo[rand(0, 1)],
            'wormed' => $yesNo[rand(0, 1)],
            'status' => $status[rand(0, 1)],
            'breed' => $breedValues[rand(0, 1)],
            'age' => '9999-12-31',


        ];
    }
}
