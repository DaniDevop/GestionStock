<?php

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
        Schema::create('fournisseurs', function (Blueprint $table) {
            $table->id();
            $table->string('user_action');
            $table->string('nom',100);
            $table->string('prenom',100);
            $table->string('email')->nullable();
            $table->string('adresse',150)->nullable();
            $table->string('profile')->nullable();
            $table->string('tel',120)->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('fournisseurs');
    }
};
