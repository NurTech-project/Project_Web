<?php

namespace Database\Factories;

use App\Models\Tecnico;
use Illuminate\Database\Eloquent\Factories\Factory;

class TecnicoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tecnico::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>$this->faker->randomElement([1,2,3,4,5]),
            'descripcion'=>$this->faker->sentence($nbWords =3, $variableNbWords = true),
            'disponibilidad'=>'Activa'
        ];
    }
}
