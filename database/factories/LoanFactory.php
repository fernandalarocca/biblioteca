<?php

namespace Database\Factories;

use App\Models\Loan;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoanFactory extends Factory
{
    protected $model = Loan::class;

    public function definition()
    {
        $author = Author::factory()->create();
        $book = Book::factory()->create();

        return [
            'author_id' => $author->id,
            'book_id' => $book->id,
            'quantity' => $this->faker->randomNumber(1),
        ];
    }
}
