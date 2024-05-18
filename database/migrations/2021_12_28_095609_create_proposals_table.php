<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('revenue_village_id')->unsigned()->index()->comment('Revenue village of which a new name is be proposed.');
            $table->bigInteger('block_id')->unsigned()->index()->comment('Block to which a revenue village belongs to.');
            $table->bigInteger('gram_panchayat_id')->unsigned()->index()->comment('GP to which a  revenue village belongs to.');
            $table->string('proposed_name',100)->comment('Propose name of a village.');
            $table->date('establish_date')->comment('Date on which a revenue village was established.');
            $table->longText('description')->comment('Description or remarks on a revenue village.');
            $table->timestamps();
            $table->foreign('revenue_village_id')->references('id')->on('revenue_villages');
            $table->foreign('block_id')->references('id')->on('blocks');
            $table->foreign('gram_panchayat_id')->references('id')->on('gram_panchayats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposals');
    }
}
