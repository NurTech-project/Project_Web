<?php

namespace Database\Factories;

use App\Models\DetalleEntregaDonacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetalleEntregaDonacionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DetalleEntregaDonacion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'administrador_id' =>$this->faker->randomElement([1,2,3,4,5]),
            'beneficiario_id' =>$this->faker->randomElement([1,2,3,4,5]),
            'distribuidor_id' =>$this->faker->randomElement([1,2,3,4,5]),
            'diagnostico_id' =>$this->faker->randomElement([1,2,3,4,5]),
            'estado'=>$this->faker->word
        ];
    }
}
