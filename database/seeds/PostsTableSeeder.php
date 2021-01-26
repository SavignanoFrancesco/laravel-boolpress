<?php

use Illuminate\Database\Seeder;
use Faker\Generator as FakerGenerator;
use App\Post;
use Illuminate\Support\Str;

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
            $new_post->title = $faker->sentence();
            $new_post->content = $faker->text(50);

            //genero lo slug e faccio in modo che sia sempre univoco
            $slug = Str::slug($new_post->title);
            $slug_prefix = $slug;
            $slug_exists = Post::where('slug', $slug)->first();
            $counter = 1;
            while($slug_exists) {
                $slug = $slug_prefix.'-'.$counter;
                $counter++;
                $slug_exists = Post::where('slug', $slug)->first();
            }
            $new_post->slug = $slug;

            $new_post->save();
        }
    }
}
