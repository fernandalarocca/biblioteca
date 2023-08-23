<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'synopsis' => $this->faker->paragraph,
            'category' => $this->faker->word,
            'published_at' => $this->faker->date,
            'quantity_in_stock' => $this->faker->numberBetween(1, 10),
            'author_id' => function () {
                return AuthorFactory::new()->create()->id;
            },
        ];
    }
}
