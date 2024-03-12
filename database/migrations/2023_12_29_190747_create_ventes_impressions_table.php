<?php

use App\Models\impression;
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
        Schema::create('ventes_impressions', function (Blueprint $table) {
            $table->id();
            $table->integer('qte_vendue');
            $table->foreignIdFor(impression::class);
            $table->string('user_action');
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
        Schema::dropIfExists('ventes_impressions');
    }
};
