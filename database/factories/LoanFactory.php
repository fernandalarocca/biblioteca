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
        return [
            'author_id' => Author::factory(),
            'book_id' =>Book::factory(),
            'quantity' => $this->faker->randomNumber(1),
        ];
    }
}
