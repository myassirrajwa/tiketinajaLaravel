<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string('image');
            $table->text('deskripsi');    
            $table->string('kategori')->nullable();
            $table->string('harga');
            $table->foreignId("creator_id")->references("id")->on("users")->cascadeOnDelete();
            $table->timestamps();
        }); 
    }
    

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
