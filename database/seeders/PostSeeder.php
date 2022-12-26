<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();
        Post::create(array('id' => 1, 'place_id' => 8, 'user_id' => 2, 'title' => 'Kā pagarināt studentu apliecību?', 'description' => 'Vēlētos uzzināt kā var pagarināt studentu apliecību, kur jāiet, kas jādara.', 'rating' => 0, 'closed' => 0));
    }
}
