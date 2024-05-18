<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGramPanchayatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gram_panchayats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('block_id')->unsigned()->index()->comment('Block to which a GP belongs to.');
            $table->string('gp_name')->comment('Name of a GP');
            $table->timestamps();
            $table->foreign('block_id')->references('id')->on('blocks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gram_panchayats');
    }
}
