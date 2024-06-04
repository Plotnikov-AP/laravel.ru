<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $photo=['/images/product/product.jpg', '/images/product/product1.jpg', '/images/product/product2.png', '/images/product/product3.jpg'];
        $product=['смартфон', 'планшет', 'телевизор', 'микроволновка', 'холодильник', 'стиральная машина'];
        return [
            'name'=>$product[mt_rand(0, 5)],
            'photo'=>$photo[mt_rand(0, 3)],
            'price'=>mt_rand(100, 100000),
            'description'=>$this->faker->text(mt_rand(100, 200)),
            'on_sklad'=>mt_rand(0, 50)
        ];
    }
}
