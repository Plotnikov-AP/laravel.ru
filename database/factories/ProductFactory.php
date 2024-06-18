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
        $photo=['/laravel.ru/images/products/phone.png', '/laravel.ru/images/products/tablet.jpg', '/laravel.ru/images/products/televizor.jpg', '/laravel.ru/images/products/microwave.jpg', '/laravel.ru/images/products/fridge.png', '/laravel.ru/images/products/washing machine.png'];
        $product=['смартфон', 'планшет', 'телевизор', 'микроволновка', 'холодильник', 'стиральная машина'];
        $number=mt_rand(0, 5);
        return [
            'name'=>$product[$number],
            'photo'=>$photo[$number],
            'price'=>mt_rand(1000, 50000),
            'description'=>$this->faker->text(mt_rand(100, 200)),
            'on_sklad'=>mt_rand(0, 50)
        ];
    }
}
