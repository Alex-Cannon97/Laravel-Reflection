<?php

namespace Database\Factories;

use App\Models\companies;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
    {   $logos = array_values(array_filter(
        Storage::disk('public')->files('images'),
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
