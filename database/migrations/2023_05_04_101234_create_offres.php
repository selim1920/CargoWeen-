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
        Schema::create('offres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->string('num_vol')->nullable();
            $table->string('nom_compagnie')->nullable();
            $table->string('airport_depart')->nullable();
            $table->string('airport_arrive')->nullable();
            $table->dateTime('jour_depart')->nullable();
            $table->dateTime('jour_arrive')->nullable();
            $table->float('maxquantite')->nullable();
            $table->float('tarif_kg',8,2)->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offres');
    }
};
