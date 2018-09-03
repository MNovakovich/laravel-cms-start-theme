<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Post;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('body');
            $table->text('featured_image')->nullable();
            $table->enum('status', ['published', 'draft','private']);
            $table->string('slug')->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('image_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                 ->references('id')->on('users')
                 ->onDelete('cascade');

            // $table->foreign('category_id')
            //      ->references('id')->on('categories')
            //      ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
