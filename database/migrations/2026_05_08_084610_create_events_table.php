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
    Schema::create('events', function (Blueprint $table) {
        $table->id();
        // cascade: kalo user dihapus, event-nya ikut kehapus
        $table->foreignId('id_user')->constrained('users')->onDelete('cascade'); 
        $table->string('judul_event');
        $table->text('deskripsi');
        $table->string('lokasi');
        $table->date('tanggal');
        $table->integer('harga')->nullable(); // nullable untuk antisipasi event gratis
        $table->string('link_pendaftaran');
        $table->string('poster')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
