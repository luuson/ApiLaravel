<?php

namespace Database\Factories\Model;

use App\Models\Model\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model =  \App\Models\Model\Products::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->word,
            'detail'=>$this->faker->paragraph,
            'price'=>$this->faker->numberBetween(100,1000),
            'stock'=>$this->faker->randomDigit,
            'discount'=>$this->faker->numberBetween(2,30)
        ];
    }
}
