<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Faker\Generator as FakerGenerator;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(FakerGenerator $faker)
    {
        //
        for ($i=0; $i < 6; $i++) {

            $new_tag = new Tag();
            $new_tag->name = $faker->sentence(3);


            //genero lo slug e faccio in modo che sia sempre univoco
            $slug = Str::slug($new_tag->name);
            $slug_prefix = $slug;
            $slug_exists = Tag::where('slug', $slug)->first();
            $counter = 1;
            while($slug_exists) {
                $slug = $slug_prefix.'-'.$counter;
                $counter++;
                $slug_exists = Tag::where('slug', $slug)->first();
            }
            $new_tag->slug = $slug;

            $new_tag->save();

        }
    }
}
