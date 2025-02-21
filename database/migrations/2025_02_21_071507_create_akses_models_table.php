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
        Schema::create('akses_models', function (Blueprint $table) {
            $table->char('id_akses', 7)->primary();
            $table->char('id_role', 7);
            $table->foreign('id_role')->references('id_role')->on('role_models');
            $table->char('id_menu', 7);
            $table->foreign('id_menu')->references('id_menu')->on('menu_models');
            $table->char('id_submenu', 7);
            $table->foreign('id_submenu')->references('id_submenu')->on('sub_menu_models');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akses_models');
    }
};
