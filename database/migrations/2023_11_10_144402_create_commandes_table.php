<?php

use App\Models\BonCommandes;
use App\Models\BonEntree;
use App\Models\Entree;
use App\Models\fournisseur;
use App\Models\produit;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->integer('qte_entrant');
            $table->string('date_commandes');
            $table->string('statut',20)->nullable();
            $table->foreignIdFor(produit::class);
            $table->string('user_action')->nullable();
            $table->string('date_creation')->nullable();
            $table->string('date_update')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commandes');
    }
};
