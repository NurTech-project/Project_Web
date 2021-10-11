<?php

namespace Database\Factories;

use App\Models\Donante;
use Illuminate\Database\Eloquent\Factories\Factory;

class DonanteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Donante::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>$this->faker->randomElement(1,2,3,4,5),
            'tipo_donacion_id'=>$this->faker->randomElement(1,2),
            'fecha_entrega'=>$this->faker->date($format='Y-m-d',$max='now'),
            'hora_entrega'=>$this->faker->time($format='H:i:s',$max='now'),
        ];
    }
}
