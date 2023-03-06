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
<<<<<<< Updated upstream
            $table->string('rating');
=======
            $table->foreignId('komen_id')->nullable();
>>>>>>> Stashed changes
            $table->string('nama');
            $table->string('email');
            $table->string('foto');
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