<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('montant');
            $table->integer('solde_a_rembourser');
            $table->integer('delai_remboursement');
            $table->integer('nombre_versement');
            $table->string('bien_garanti');
            $table->integer('valeur_bien_garanti');
            $table->text('activite');
            $table->string('contrat_bail');
            $table->string('recu_impot');
            $table->string('facture_bien');
            $table->string('photo_entiere');
            $table->string('photo_cni');
            $table->string('photo_bien');
            $table->string('photo_business');
            $table->timestamps();
        });

         Schema::table('orders', function(Blueprint $table){
            $table->integer('user_id')->unsigned()->index();
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
