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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produitId')->constrained('produits')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('clientId')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('adminId')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('adjointId')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('fournisseurId')->nullable()->constrained('fournisseurs')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('quantite')->nullable();
            $table->integer('etat')->default(0);
            $table->timestamp("date");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
