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
        Schema::create('deleted_posts', function (Blueprint $table) {
            $table->id();
            $table->longText('content');
            $table->unsignedBigInteger('post_id')->nullable();
            $table->string('judul')->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamp('read_at')->nullable();
            $table->string('foto')->nullable();
            $table->foreign('post_id')->references('id')->on('postingans')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deleted_posts');
    }
};
