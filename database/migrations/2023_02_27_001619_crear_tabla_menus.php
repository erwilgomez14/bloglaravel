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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menus_id')->nullable();
            $table->foreign('menus_id','fk_menu_menus')->references('id')->on('menus')->onDelete('cascade')->onUpdate('restrict');
            $table->string('nombre', 50);
            $table->string('url', 50);
            $table->unsignedInteger('orden')->default(1);
            $table->string('icono', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
