<?php

use Illuminate\Database\Seeder;
use Faker\Generator as FakerGenerator;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(FakerGenerator $faker)
    {
        //
        for ($i=0; $i < 20; $i++) {
            $new_post = new Post();
            $new_post->username = $faker->numerify('user-####');
            $new_post->content = $faker->text(50);
            $new_post->save();
        }
    }
}
