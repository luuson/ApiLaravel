<?php

namespace Database\Factories\Model;

use App\Models\Model\Review;
use App\Models\Model\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Model\Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'product_id' => $this->faker->numberBetween(0,20),

            'customer'=>$this->faker->name,

            'review'=>$this->faker->paragraph,

            'star'=>$this->faker->numberBetween(0,5)
        ];
    }
}
