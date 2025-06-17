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
            $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');
            $table->foreignId('mapel_id')->constrained('mapels')->onDelete('cascade');
            $table->decimal('tugas1', 5, 2)->nullable();
            $table->decimal('tugas2', 5, 2)->nullable();
            $table->decimal('tugas3', 5, 2)->nullable();
            $table->decimal('tugas4', 5, 2)->nullable();
            $table->decimal('tugas5', 5, 2)->nullable();
            $table->decimal('uts', 5, 2)->nullable();
            $table->decimal('uas', 5, 2)->nullable();
            $table->timestamps();

            $table->unique(['siswa_id', 'mapel_id']); // agar tidak ada duplikat nilai untuk 1 mapel oleh 1 siswa
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
