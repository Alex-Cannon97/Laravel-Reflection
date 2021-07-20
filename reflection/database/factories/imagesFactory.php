<?php

namespace Database\Factories;

use App\Models\companies;
use App\Models\images;
use Illuminate\Database\Eloquent\Factories\Factory;

class imagesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = images::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'foreign-id'=>companies::factory(),
            'link'=>$this->faker->image('public/storage/images', 100, 100, null, false),
            'updated_at'=> now(),
            'created_at'=> now()
        ];
    }
}
