<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id'); // clé primaire
            $table->string('title', 100); // VARCHAR 100
            $table->text('description')->nullable(); // TEXT NULL
            $table->dateTime('published_at')->nullable(); // DATETIME
            $table->dateTime('updated_at')->nullable(); // DATETIME
            $table->dateTime('created_at')->nullable(); // DATETIME
            $table->enum('status',['unpublished','publish','draft'])->default('unpublished');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
