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
        Schema::create('post_categoria', function (Blueprint $table) {
            $table->unsignedBigInteger('posts_id');
            $table->foreign('posts_id', 'fk_postcategoria_post')->references('id')->on('post')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedBigInteger('categorias_id');
            $table->foreign('categorias_id', 'fk_postcategoria_categoria')->references('id')->on('categoria')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts_categorias');
    }
};
