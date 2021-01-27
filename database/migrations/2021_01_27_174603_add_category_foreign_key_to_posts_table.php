<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryForeignKeyToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Posts', function (Blueprint $table) {
            //deve essere dello stesso tipo del id ma può essere null
            $table->unsignedBigInteger('category_id')->nullable()->after('id');
            //creo la relazione one(category) to many(posts)
            //documentazione #Foreign Key Costraints
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Posts', function (Blueprint $table) {
            //elimina il vincolo(tabella_colonna_vincolata_foreign)
            $table->dropForeign('posts_category_id_foreign');
            //elimina la colonna
            $table->dropColumn('category_id');
        });
    }
}
