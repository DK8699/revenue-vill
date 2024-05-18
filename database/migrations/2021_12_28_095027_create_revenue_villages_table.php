<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevenueVillagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revenue_villages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('revenue_circle_id')->unsigned()->index()->comment('Revenue circle to which a revenue village belongs to.');
            $table->string('village_name',100)->comment('Name of a revenue village of Assam');
            $table->timestamps();
            $table->foreign('revenue_circle_id')->references('id')->on('revenue_circles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('revenue_villages');
    }
}
