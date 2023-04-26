<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('clienti', function (Blueprint $table) {
            $table->id();
            $table->string('ragione_sociale')->unique();
            $table->string('telefono')->unique();
            $table->integer('rating')->unsigned()->default(0);
            $table->string('piva')->unique();
            $table->string('cf')->unique();
            $table->string('indirizzo');
            $table->date('inizio_attivita');
            $table->string('attach_visura_camerale')->nullable();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');

            $table->unsignedBigInteger('tipi_id')->nullable();
            $table->foreign('tipi_id')->references('id')->on('tipi')->onDelete('SET NULL');

            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('clienti');
    }
};
