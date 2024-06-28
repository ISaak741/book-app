<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'genre' => $this->faker->randomElement(['Anime', 'Histoire', 'Romane', 'Horror','Enfant']),
            'language' => $this->faker->randomElement(['arab', 'anglais', 'francaise', 'espagnole']), 
            'description' => $this->faker->paragraph,
            'file' => $this->faker->filePath, 
            'picture' => $this->faker->imageUrl,
            'writer_id' => \App\Models\Writer::factory() 
        ];
    }
}
