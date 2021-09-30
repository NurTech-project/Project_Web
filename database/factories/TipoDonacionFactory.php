<?php

namespace Database\Factories;

use App\Models\TipoDonacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipoDonacionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TipoDonacion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'descripcion'=>$this->faker->unique()->randomElement(
                $array=array('Equipo','Pieza')),
        ];
    }
}
