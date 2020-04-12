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
            $table->bigIncrements('id');
            $table->string('isbn',8)->unique();
            $table->string('book_title');
            $table->text('review');
            $table->string('author');
            $table->text('book_image');
            $table->enum('is_rent', [ '0', '1'])->default('0');
            $table->unsignedBigInteger('shelf_id');
            $table->foreign('shelf_id')->references('id')->on('book_shelf');
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
        Schema::dropIfExists('books');
    }
}
