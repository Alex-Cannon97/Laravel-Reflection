<?php

namespace Database\Factories;

use App\Models\employees;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\companies;

class employeesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = employees::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'firstName'=>$this->faker->firstName(),  
                'lastName' =>$this->faker->lastName(), 
                'foreign-id' => companies::factory(), 
                // 'company' =>$this->faker->word(), 
                'email' => $this->faker->unique()->safeEmail(),
                'phone' => $this->faker->unique()->phoneNumber(),
                'updated_at' => now(),
                'created_at' => now(),
        ];
    }
}
