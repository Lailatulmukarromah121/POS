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
        Schema::create('m_supplier', function (Blueprint $table) {
            $table->id('supplier_id');
            $table->string('supplier_kode', 10)->unique();
            $table->string('supplier_nama', 100);
            $table->text('alamat')->nullable();
            $table->string('kota', 50)->nullable();
            $table->string('telepon', 15)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('kontak_nama', 100)->nullable();
            $table->string('kontak_telepon', 15)->nullable();
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_supplier');
    }
};
