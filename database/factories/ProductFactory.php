<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "price"       => $this->faker->randomFloat(2, 1, 100),
            "name"       => $this->faker->sentence,
            "category_id" => Category::inRandomOrder()->first()->id,
            "brand_id"    => Brand::inRandomOrder()->first()->id,
            "stock_id"    => Stock::inRandomOrder()->first()->id,
        ];
    }
}
