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
        Schema::create('komen', function (Blueprint $table) {
            $table->id();
            $table->string('rating')->nullable();
            $table->foreignId('komen_id')->nullable();
            $table->foreignId('postingan_id')->references('id')->on('postingans')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama');
            $table->integer('parent')->default(0);
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('email');
            $table->string('foto')->nullable();
            $table->string('pesan');
            $table->timestamps();
        });

        Schema::create('sukas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('komen_id')->constrained('komen')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    
    public function down()
    {
        Schema::dropIfExists('sukas');
        Schema::dropIfExists('komen');
    }
};