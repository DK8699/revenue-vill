<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevenueCirclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revenue_circles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('district_id')->unsigned()->index()->comment('District to which a revenue circle belongs to.');
            $table->string('circle_name',100)->comment('Name of a revenue circle.');
            $table->timestamps();
            $table->foreign('district_id')->references('id')->on('districts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('revenue_circles');
    }
}
