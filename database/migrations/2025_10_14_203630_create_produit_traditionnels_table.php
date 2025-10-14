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
        Schema::create('produits_traditionnels', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); // Nom du produit
            $table->string('categorie')->nullable(); // Catégorie du produit
            $table->text('description')->nullable(); // Description complète du produit

            // Images du produit
            $table->string('image')->nullable(); // Image principale
            $table->string('image1')->nullable(); // Image secondaire

            // Informations commerciales
            $table->decimal('prix', 10, 2)->default(0); // Prix du produit
            $table->integer('quantite')->default(0); // Quantité disponible
            $table->boolean('disponible')->default(true); // Disponibilité
            $table->boolean('est_expose')->default(false); // Produit exposé à la Maison du Village ?

            // Informations culturelles
            $table->string('origine')->nullable(); // Lieu ou région d’origine
            $table->string('createur')->nullable(); // Nom de l’artisan ou producteur
            $table->text('materiaux')->nullable(); // Matériaux utilisés
            $table->string('culture_associee')->nullable(); // Culture ou ethnie associée

            // Contacts
            $table->string('contact_whatsapp')->nullable(); // Numéro WhatsApp du vendeur / contact
            $table->string('contact_gmail')->nullable(); // Adresse Gmail de contact

            $table->timestamps(); // Dates de création et de mise à jour
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits_traditionnels');
    }
};
