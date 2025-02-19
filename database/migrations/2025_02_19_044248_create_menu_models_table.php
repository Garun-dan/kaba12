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
        Schema::create('menu_models', function (Blueprint $table) {
            $table->char('id_menu', 7)->primary();
            $table->string('nama_menu', 64);
            $table->string('slug_menu', 64);
            $table->string('icon_menu', 64);
            $table->enum('posisi_menu', ['admin', 'home']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_models');
    }
};
