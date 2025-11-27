<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsubsubcategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('postsubsubcategories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('subsubcategory_id');
            $table->timestamps();

            // $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('subsubcategory_id')->references('id')->on('sub_subcategories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('postsubsubcategories');
    }
}
