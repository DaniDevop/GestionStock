<?php

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
        Schema::create('back_products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(produit::class);
            $table->string('motif');
            $table->integer('qte_entrant');
            $table->string('user_action');
            $table->string('date_creation')->nullable();
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
        Schema::dropIfExists('back_products');
    }
};
