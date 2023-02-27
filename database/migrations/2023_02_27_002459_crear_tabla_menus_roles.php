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
        Schema::create('menus_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('menus_id');
            $table->foreign('menus_id', 'fk_menurol_menu')->references('id')->on('menus')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedBigInteger('roles_id');
            $table->foreign('roles_id', 'fk_menurol_rol')->references('id')->on('roles')->onDelete('cascade')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus_roles');
    }
};
