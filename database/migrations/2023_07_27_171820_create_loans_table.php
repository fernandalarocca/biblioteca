<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->constrained();
            $table->foreignId('book_id')->constrained();
            $table->integer('quantity');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('loans');
    }
};
