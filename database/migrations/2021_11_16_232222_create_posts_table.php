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
            $table->string('slug')->nullable();
            $table->date('date');
            $table->text('content')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->nullable();
            $table->boolean('featured');
            // optional
            $table->text('blocks_content')->nullable();
            $table->string('template')->nullable();
            $table->string('description')->nullable();
            $table->integer('priority')->default(0);
            // end optional
            $table->string('category_id');
            $table->timestamps();
            $table->softDeletes();
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
