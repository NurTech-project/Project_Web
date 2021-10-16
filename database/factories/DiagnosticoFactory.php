<?php

namespace Database\Factories;

use App\Models\Diagnostico;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiagnosticoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Diagnostico::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'detalle_recepcion_id'=>$this->faker->randomElement([1,2,3,4,5]),
            'tecnico_id'=>$this->faker->randomElement([1,2,3,4,5]),
            'detalle'=>$this->faker->sentence($nbWords = 10, $variableNbWords = true),
            'estado'=>null
        ];
    }
}
