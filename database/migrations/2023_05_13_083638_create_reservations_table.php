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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('offre_id');
            $table->unsignedBigInteger('id_Transitaire');
            $table->string('status')->default('attente');
            $table->string('Service')->nullable();
            $table->string('quantite')->nullable();
            $table->string('longueur')->nullable();
            $table->string('largeur')->nullable();
            $table->string('hauteur')->nullable();
            $table->float('poids',8,3)->nullable();
            $table->string('type')->nullable();
            $table->string('nature')->nullable();
            $table->string('stockage')->nullable();
            $table->string('etat')->nullable();
            $table->float('poids_total',8,3)->nullable();
            $table->float('poids_taxable',8,3)->nullable();
            $table->float('prix_total',10,5)->nullable();
            $table->unsignedBigInteger('code');
            $table->string('type_code')->nullable();
            $table->timestamps();


            $table->foreign('offre_id')->references('id')->on('offres');
            $table->foreign('id_Transitaire')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
