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
        Schema::create('user_test_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('test_id')->nullable();
            $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');
            $table->unsignedBigInteger('question_id')->nullable();
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->unsignedBigInteger('selected_option_id')->nullable();
            $table->foreign('selected_option_id')->references('id')->on('options')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_test_questions');
    }
};
