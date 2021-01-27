<?php

use Illuminate\Database\Seeder;
use Faker\Generator as FakerGenerator;
use App\Category;

class CategoriesTableSeeder extends Seeder
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

            $new_category = new Category();
            $new_category->name = $faker->sentence(3);


            //genero lo slug e faccio in modo che sia sempre univoco
            $slug = Str::slug($new_category->name);
            $slug_prefix = $slug;
            $slug_exists = Category::where('slug', $slug)->first();
            $counter = 1;
            while($slug_exists) {
                $slug = $slug_prefix.'-'.$counter;
                $counter++;
                $slug_exists = Category::where('slug', $slug)->first();
            }
            $new_category->slug = $slug;

            $new_category->save();

        }
    }
}
