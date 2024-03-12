<?php

use App\Models\categorie;
use App\Models\fournisseur;
use App\Models\ranger;
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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('user_action');
            $table->string('designation',100);
            $table->integer('qteStock');
            $table->integer('seuil_alert');
            $table->text('code_qr')->nullable();
            $table->decimal('prix_achat',10,2);
            $table->decimal('prix_vente',10,2);
            $table->string('image')->nullable();
            $table->timestamps();
            $table->foreignIdFor(fournisseur::class)->nullable();
            $table->foreignIdFor(categorie::class)->nullable();
            $table->string('date_creation')->nullable();
            $table->string('date_update')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produits');
    }
};
