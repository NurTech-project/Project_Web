<?php

namespace Database\Factories;

use App\Models\Equipo;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Equipo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'donante_id' =>$this->faker->randomElement([1,2,3,4,5]),
            'sistema_operativo'=>$this->faker->sentence($nbWords =2, $variableNbWords = true),
            'procesador'=>$this->faker->sentence($nbWords =3, $variableNbWords = true),
            'ram'=>$this->faker->sentence($nbWords =2, $variableNbWords = true),
            'almacenamiento'=>$this->faker->sentence($nbWords =2, $variableNbWords = true),
            'detalle'=>$this->faker->sentence($nbWords =5, $variableNbWords = true),
        ];
    }
}
