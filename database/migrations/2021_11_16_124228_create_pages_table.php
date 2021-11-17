<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('template')->nullable();
            $table->string('page_name');
            $table->string('page_title');
            $table->string('page_slug')->nullable();
            $table->string('meta_title')->nullable();;
            $table->string('meta_description')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('status')->nullable();
            $table->string('content');
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
        Schema::dropIfExists('pages');
    }
}
