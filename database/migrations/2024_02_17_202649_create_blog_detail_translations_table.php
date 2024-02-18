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
        Schema::create('blog_detail_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blog_detail_id')->references('id')->on('blog_details')->onDelete('cascade');
            $table->string('locale')->index();
            $table->unique(['blog_detail_id', 'locale']);
            $table->string('title');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_detail_translations');
    }
};
