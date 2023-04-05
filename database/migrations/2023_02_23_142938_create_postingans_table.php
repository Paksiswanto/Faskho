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
        Schema::create('postingans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('judul');
            $table->longText('konten');
            $table->string('thumbnail')->onDelete('cascade');
            $table->string('agree');
            $table->string('deskripsi');
            $table->string('status')->default('belum diterima');
            $table->integer('views')->default(0);
            $table->timestamps();
            $table->foreignId('kategori_id')->references('id')->on('kategoris')->onUpdate('cascade')->onDelete('cascade');
        });
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postingans');
    }
};
