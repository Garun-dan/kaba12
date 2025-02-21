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
        Schema::create('tampilan_models', function (Blueprint $table) {
            $table->char('id_tampilan', 7)->primary();
            $table->string('nama_web', 20);
            $table->string('slogan_web', 128);
            $table->string('nama_instansi', 128);
            $table->string('alamat_email', 128);
            $table->string('nomor_telephone', 16);
            $table->longText('alamat');
            $table->string('logo_web', 128);
            $table->string('favicon_web', 128);
            $table->string('background_web', 128);
            $table->string('background_login', 128);
            $table->string('fb', 128);
            $table->string('ig', 128);
            $table->string('thread', 128);
            $table->string('tiktok', 128);
            $table->string('youtube', 128);
            $table->string('twitter', 128);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tampilan_models');
    }
};
