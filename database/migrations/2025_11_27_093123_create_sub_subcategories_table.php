<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_subcategories', function (Blueprint $table) {
            $table->id();

            // Link to Subcategory (second level)
            $table->unsignedBigInteger('subcategory_id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('metatitle')->nullable();
            $table->string('metadescription')->nullable();
            $table->string('metakeyword')->nullable();

            $table->enum('status', ['active', 'block'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_subcategories');
    }
}
