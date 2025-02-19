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
        Schema::create('users', function (Blueprint $table) {
            $table->char('id_user', 12)->primary();
            $table->string('nama_lengkap', 128);
            $table->string('panggilan', 20);
            $table->string('email', 128);
            $table->string('nomor_whatsapp', 13);
            $table->mediumText('alamat');
            $table->enum('gender', ['L', 'P']);
            $table->string('avatar', 128);
            $table->char('id_role', 7);
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamp('tgl_join')->useCurrent();
            $table->enum('aktivitas', ['online', 'offline']);
            $table->char('kode_otp', 4);
            $table->string('ttd', 64);
            $table->timestamps();
        });

        // Schema::create('password_reset_tokens', function (Blueprint $table) {
        //     $table->string('email')->primary();
        //     $table->string('token');
        //     $table->timestamp('created_at')->nullable();
        // });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        // Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
