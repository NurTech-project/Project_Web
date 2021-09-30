<?php

namespace Database\Factories;

use App\Models\DetalleDonacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetalleDonacionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DetalleDonacion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'equipo_id'=>$this->faker->randomElement([1,2,3,4,5]),
            'pieza_id'=>$this->faker->randomElement([1,2,3,4,5]),
            'distribuidor_id'=>$this->faker->randomElement([1,2,3,4,5]),
        ];
    }
}
