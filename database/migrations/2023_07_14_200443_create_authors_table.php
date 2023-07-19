<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->integer('age');
            $table->string('description', 255)->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('authors');
    }
};
