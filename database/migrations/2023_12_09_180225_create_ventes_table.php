<?php

use App\Models\factures;
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
        Schema::create('ventes', function (Blueprint $table) {
            $table->id();
            $table->integer('qte_vendue');
            $table->foreignIdFor(produit::class);
            $table->integer('prix_marchande');
            $table->foreignIdFor(factures::class)->nullable();
            $table->string('date_creation')->nullable();
            $table->string('user_action')->nullable();
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
        Schema::dropIfExists('ventes');
    }
};
