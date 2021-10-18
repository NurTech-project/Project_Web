<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetalleRecepcionTectincoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tecnico_id'=>$this->faker->randomElement(1,2,3,4,5),
            'distribuidor_id'=>$this->faker->randomElement(1,2,3,4,5),
            'detalle_donacion_id'=>$this->faker->randomElement(1,2,3,4,5),
            'fecha'=>$this->faker->date($format='Y-m-d',$max='now'),
            'hora'=>$this->faker->time($format='H:i:s',$max='now'),
            'estado'=>$this->faker->word,
        ];
    }
}
