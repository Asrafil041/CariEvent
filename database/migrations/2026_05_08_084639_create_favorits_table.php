<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('favorits', function (Blueprint $table) {
        $table->id();
        $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
        $table->foreignId('id_event')->constrained('events')->onDelete('cascade');
        $table->timestamps();

        // Kunci biar 1 user cuma bisa favoritkan 1 event maksimal 1 kali
        $table->unique(['id_user', 'id_event']); 
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorits');
    }
};
