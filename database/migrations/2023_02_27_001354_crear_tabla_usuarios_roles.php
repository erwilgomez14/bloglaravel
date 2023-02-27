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
        Schema::create('usuarios_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('usuarios_id');
            $table->foreign('usuarios_id', 'fk_usuariorol_usuario')->references('id')->on('usuarios')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedBigInteger('roles_id');
            $table->foreign('roles_id', 'fk_usuariorol_rol')->references('id')->on('roles')->onDelete('cascade')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios_roles');
    }
};
