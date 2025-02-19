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
        Schema::create('sub_menu_models', function (Blueprint $table) {
            $table->char('id_submenu', 7)->primary();
            $table->string('nama_submenu', 64);
            $table->string('slug_submenu', 64);
            $table->char('id_menu', 7);
            $table->foreign('id_menu')->references('id_menu')->on('menu_models');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_menu_models');
    }
};
