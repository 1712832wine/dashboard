<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->text('title');
            $table->string('slug');
            $table->date('date');
            $table->text('content');
            $table->string('image')->default('toan');
            $table->string('category');
            $table->string('tags');
            $table->string('status');
            $table->boolean('featured');
            $table->string('template')->nullable();
            $table->integer('count')->default(0);
            $table->json('blocks_content')->nullable();
            $table->string('description')->nullable();
            $table->integer('priority')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
