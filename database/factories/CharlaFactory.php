<?php

namespace Database\Factories;

use App\Models\Charla;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharlaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Charla::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'administrador_id' =>$this->faker->randomElement([1,2,3,4,5]),
            'link_video' => $this->faker->url,
            'descripcion' =>$this->faker->sentence($nbWords =10, $variableNbWords = true),
        ];
    }
}
