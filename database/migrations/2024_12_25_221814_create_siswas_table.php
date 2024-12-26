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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('class');
            $table->string('nisn')->unique();
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->enum('religion', ['Islam', 'Kristen', 'Hindu', 'Buddha', 'Khonghucu', 'Tidak memiliki agama']);
            $table->text('address');
            $table->string('phone', 15);
            $table->foreignId('walikelas_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
