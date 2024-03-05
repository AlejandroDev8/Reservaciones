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
        Schema::table('reservacions', function (Blueprint $table) {
            $table->string('email');
            $table->foreignId('sala_id')->constrained()->onDelete('cascade');
            $table->date('fecha')->unique();
            $table->foreignId('acomodo_id')->constrained()->onDelete('cascade');
            $table->text('extras')->nullable();
            $table->integer('estado')->default(0); // 0 = pendiente, 1 = aceptado, 2 = rechazado
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservacions', function (Blueprint $table) {
            $table->dropForeign(['sala_id']);
            $table->dropForeign(['acomodo_id']);
            $table->dropForeign(['user_id']);
            $table->dropColumn(['email', 'sala_id', 'fecha', 'acomodo_id', 'extras', 'estado', 'user_id']);
        });
    }
};
