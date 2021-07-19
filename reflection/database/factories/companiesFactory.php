<?php

namespace Database\Factories;

use App\Models\companies;
use Illuminate\Database\Eloquent\Factories\Factory;

class companiesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = companies::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Name' => $this->faker->unique()->word(),
            'email' => $this->faker->unique()->safeEmail(),
            'logo'=> $this->faker->image(),
            'website'=> $this->faker->url(),
            'updated_at' => now(),
            'created_at' => now(),

        ];
    }
}
