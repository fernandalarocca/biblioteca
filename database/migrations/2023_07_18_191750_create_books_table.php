<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('synopsis', 255);
            $table->string('category', 255);
            $table->date('published_at');
            $table->integer('quantity_in_stock');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
