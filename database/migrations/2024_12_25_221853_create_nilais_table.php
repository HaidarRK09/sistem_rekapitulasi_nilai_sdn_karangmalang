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

            $table->decimal('agama_tugas1', 5, 2)->nullable();
            $table->decimal('agama_tugas2', 5, 2)->nullable();
            $table->decimal('agama_tugas3', 5, 2)->nullable();
            $table->decimal('agama_tugas4', 5, 2)->nullable();
            $table->decimal('agama_tugas5', 5, 2)->nullable();
            $table->decimal('agama_uts', 5, 2)->nullable();
            $table->decimal('agama_uas', 5, 2)->nullable();

            $table->decimal('pancasila_tugas1', 5, 2)->nullable();
            $table->decimal('pancasila_tugas2', 5, 2)->nullable();
            $table->decimal('pancasila_tugas3', 5, 2)->nullable();
            $table->decimal('pancasila_tugas4', 5, 2)->nullable();
            $table->decimal('pancasila_tugas5', 5, 2)->nullable();
            $table->decimal('pancasila_uts', 5, 2)->nullable();
            $table->decimal('pancasila_uas', 5, 2)->nullable();

            $table->decimal('indonesia_tugas1', 5, 2)->nullable();
            $table->decimal('indonesia_tugas2', 5, 2)->nullable();
            $table->decimal('indonesia_tugas3', 5, 2)->nullable();
            $table->decimal('indonesia_tugas4', 5, 2)->nullable();
            $table->decimal('indonesia_tugas5', 5, 2)->nullable();
            $table->decimal('indonesia_uts', 5, 2)->nullable();
            $table->decimal('indonesia_uas', 5, 2)->nullable();

            $table->decimal('matematika_tugas1', 5, 2)->nullable();
            $table->decimal('matematika_tugas2', 5, 2)->nullable();
            $table->decimal('matematika_tugas3', 5, 2)->nullable();
            $table->decimal('matematika_tugas4', 5, 2)->nullable();
            $table->decimal('matematika_tugas5', 5, 2)->nullable();
            $table->decimal('matematika_uts', 5, 2)->nullable();
            $table->decimal('matematika_uas', 5, 2)->nullable();

            $table->decimal('pjok_tugas1', 5, 2)->nullable();
            $table->decimal('pjok_tugas2', 5, 2)->nullable();
            $table->decimal('pjok_tugas3', 5, 2)->nullable();
            $table->decimal('pjok_tugas4', 5, 2)->nullable();
            $table->decimal('pjok_tugas5', 5, 2)->nullable();
            $table->decimal('pjok_uts', 5, 2)->nullable();
            $table->decimal('pjok_uas', 5, 2)->nullable();

            $table->decimal('sbk_tugas1', 5, 2)->nullable();
            $table->decimal('sbk_tugas2', 5, 2)->nullable();
            $table->decimal('sbk_tugas3', 5, 2)->nullable();
            $table->decimal('sbk_tugas4', 5, 2)->nullable();
            $table->decimal('sbk_tugas5', 5, 2)->nullable();
            $table->decimal('sbk_uts', 5, 2)->nullable();
            $table->decimal('sbk_uas', 5, 2)->nullable();

            $table->decimal('inggris_tugas1', 5, 2)->nullable();
            $table->decimal('inggris_tugas2', 5, 2)->nullable();
            $table->decimal('inggris_tugas3', 5, 2)->nullable();
            $table->decimal('inggris_tugas4', 5, 2)->nullable();
            $table->decimal('inggris_tugas5', 5, 2)->nullable();
            $table->decimal('inggris_uts', 5, 2)->nullable();
            $table->decimal('inggris_uas', 5, 2)->nullable();

            $table->decimal('muatanlokal_tugas1', 5, 2)->nullable();
            $table->decimal('muatanlokal_tugas2', 5, 2)->nullable();
            $table->decimal('muatanlokal_tugas3', 5, 2)->nullable();
            $table->decimal('muatanlokal_tugas4', 5, 2)->nullable();
            $table->decimal('muatanlokal_tugas5', 5, 2)->nullable();
            $table->decimal('muatanlokal_uts', 5, 2)->nullable();
            $table->decimal('muatanlokal_uas', 5, 2)->nullable();

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
