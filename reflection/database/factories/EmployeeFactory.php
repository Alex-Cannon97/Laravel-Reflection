<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'company_id' => Company::factory(),
                'first_name'=>$this->faker->firstName(),  
                'last_name' =>$this->faker->lastName(), 
                'company_name' =>$this->faker->word(), 
                'email' => $this->faker->unique()->safeEmail(),
                'phone' => $this->faker->unique()->phoneNumber(),
                'updated_at' => now(),
                'created_at' => now(),
        ];
    }
}
