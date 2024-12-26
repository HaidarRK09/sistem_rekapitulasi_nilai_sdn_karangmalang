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
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas');
            $table->integer('tugas1')->nullable();
            $table->integer('tugas2')->nullable();
            $table->integer('tugas3')->nullable();
            $table->integer('tugas4')->nullable();
            $table->integer('tugas5')->nullable();
            $table->integer('uts')->nullable();
            $table->integer('uas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};
