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
        Schema::create('clienti_settori_pivot', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('clienti_id');
            $table->unsignedBigInteger('settori_id');

            $table->foreign('clienti_id')->references('id')->on('clienti')->onDelete('CASCADE');
            $table->foreign('settori_id')->references('id')->on('settori')->onDelete('CASCADE');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clienti_settori_pivot');
    }
};
