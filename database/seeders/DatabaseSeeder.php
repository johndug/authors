<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Author;
use App\Models\Book;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $number = 5;
        Author::factory($number)->create();
        Book::factory($number)->create();

        for($i = 1; $i <= $number; $i++)
        {
            DB::table('author_books')->insert([
                'book_id' => ($i),
                'author_id' => ($i)
            ]);
        }
    }
}
