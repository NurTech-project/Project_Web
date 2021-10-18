<?php

namespace Database\Factories;

use App\Models\Beneficiario;
use Illuminate\Database\Eloquent\Factories\Factory;

class BeneficiarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Beneficiario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>$this->faker->randomElement([1,2,3,4,5]),
            'descripcion'=>$this->faker->sentence($nbWords = 10, $variableNbWords = true),
<<<<<<< HEAD
            'estado'=>$this->faker->word,
            'prioridad'=>$this->faker->word
=======
            'estado'=>null,
            'prioridad'=>$this->faker->word,

>>>>>>> 03e2d907624a229a2f68a656ffa898d7543beaa2
        ];
    }
}
