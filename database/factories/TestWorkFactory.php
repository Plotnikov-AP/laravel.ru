<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TestWork>
 */
class TestWorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'url'=>'/my_works/pyatnashki/index.html ',
            'title'=>'Пятнашки',
            'description'=>'Когда то изучал js, придумывал себе разные практические тестовые задания и вот тогда родилась эта страничка...'
        ];
    }
}
