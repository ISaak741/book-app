<?php

namespace Database\Factories;

use App\Models\Mylist;
use App\Models\Writer;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class MylistFactory extends Factory
{
    protected $model = Mylist::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numerify(),
            'writer_id' => Writer::factory(),
            'book_id' => Book::factory(),
            'user_type' => $this->faker->randomElement(['admin', 'editor', 'viewer']),
        ];
    }
}

