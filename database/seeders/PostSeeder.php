<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       for($i=15; $i < 100001; $i++) {
            $post        = new Post();
            $post->title =  "Title - " . $i;
            $post->body  =  "body - " . $i;
            $post->save();
       }
    }
}
