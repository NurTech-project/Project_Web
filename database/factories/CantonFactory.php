<?php

namespace Database\Factories;

use App\Models\Canton;
use Illuminate\Database\Eloquent\Factories\Factory;

class CantonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Canton::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'provincia_id'=>$this->faker->randomElement(1,2,3,4,5),
            'descripcion'=>$this->faker->sentence($nbWords = 10, $variableNbWords = true),
        ];
    }
}
