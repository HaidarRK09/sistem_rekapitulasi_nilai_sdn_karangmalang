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
        Schema::create('walkels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->string('nip');
            $table->string('nuptk');
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->string('education');
            $table->enum('position', ['Wali Kelas 1', 'Wali Kelas 2', 'Wali Kelas 3', 'Wali Kelas 4', 'Wali Kelas 5', 'Wali Kelas 6']);
            $table->string('rank');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('walkels');
    }
};
