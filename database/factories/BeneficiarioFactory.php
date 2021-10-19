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
            'prioridad'=>$this->faker->word,
=======
            'estado'=>null,
            'prioridad'=>$this->faker->word,

>>>>>>> cbc180f84c68609384137048f4f512de50bf9e0a
        ];
    }
}
