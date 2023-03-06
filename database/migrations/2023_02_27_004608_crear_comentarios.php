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
        Schema::create('comentario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuarios_id');
            $table->foreign('usuarios_id', 'fk_comentario_usuario')->references('id')->on('usuario')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedBigInteger('posts_id');
            $table->foreign('posts_id', 'fk_comentario_post')->references('id')->on('post')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedBigInteger('comentarios_id')->nullable();
            $table->foreign('comentarios_id', 'fk_comentario_comentario')->references('id')->on('comentario')->onDelete('cascade')->onUpdate('restrict');
            $table->text('contenido');
            $table->boolean('estado')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentario');
    }
};
