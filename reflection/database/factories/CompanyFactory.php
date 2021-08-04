<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   $logos = array_values(array_filter(
        Storage::disk('public')->files(),
            function ($path){
                return !Str::contains($path, '/.');
            }
        ));
        
        

        if(count($logos) > 0){
            $logo = $logos[rand(0, count($logos) -1)];
        } else{
            $logo = '';
        }

        return [
            'Name' => $this->faker->unique()->word(),
            'email' => $this->faker->unique()->safeEmail(),
            'logo' => $logo,
            'website'=> $this->faker->url(),
            'updated_at' => now(),
            'created_at' => now(),

        ];
    }
}
