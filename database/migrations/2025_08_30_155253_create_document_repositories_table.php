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
    Schema::create('document_repositories', function (Blueprint $table) {
        $table->id('document_id');
        $table->string('title');

        $table->foreignId('student_id')->nullable()
              ->constrained('users', 'user_id')->cascadeOnDelete();
        $table->foreignId('teacher_id')->nullable()
              ->constrained('users', 'user_id')->nullOnDelete();
        $table->foreignId('approved_by')->nullable()
              ->constrained('users', 'user_id')->nullOnDelete();

        $table->longText('authors')->nullable();
        $table->longText('citation')->nullable();
        $table->longText('metadata')->nullable();
        $table->binary('file')->nullable();
        $table->string('status')->default('pending');
        $table->dateTime('date_submitted')->nullable();
        $table->dateTime('date_reviewed')->nullable();
        $table->longText('study_type')->nullable();
        $table->dateTime('abandoned_date')->nullable();
        $table->dateTime('recovered_date')->nullable();
        $table->dateTime('lost_date')->nullable();
        $table->boolean('archived')->default(false);

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_repositories');
    }
};
