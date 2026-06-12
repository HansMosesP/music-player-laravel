<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();   
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('song_title');
            $table->string('artist');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('histories');
    }
};