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
        Schema::create('translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key_name', 255);
            $table->foreignId('language_id')->constrained('languages')->cascadeOnDelete();
            $table->foreignId('tag_id')->constrained('translation_tags')->cascadeOnDelete();
            $table->text('content');
            $table->timestamps();

            $table->unique(['key_name', 'language_id', 'tag_id'], 'unique_translation');
            $table->index('key_name');
            $table->index('language_id');
            $table->index('tag_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('translations');
    }
};
