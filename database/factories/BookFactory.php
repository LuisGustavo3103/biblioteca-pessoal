<?php

namespace Database\Factories;

use App\Enums\BookGenderEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3, true),
            'author' => fake()->name(),
            'isbn' => fake()->isbn13(),
            'publisher' => fake()->company(),
            'sinopse' => fake()->paragraph(5),
            'gender' => fake()->randomElement(BookGenderEnum::getValues()),
            'image' => fake()->imageUrl(300, 400, 'books'),
            'publish_year' => fake()->year($max = 'now')
        ];
    }
}
