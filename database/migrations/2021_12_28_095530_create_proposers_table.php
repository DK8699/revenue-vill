<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProposersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('proposer_category_id')->unsigned()->index()->comment('Proposer category to which a proposer belongs to.');
            $table->string('proposer_name',100)->comment('Name of a proposer of a revenue vilage name.');
            $table->string('identity_number')->unique()->comment('Unique identification no. such as aadhar, registration no. of an organization or society.');
            $table->text('identity_document')->comment('Document for identification of an individual, Society and Organization');
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
        Schema::dropIfExists('proposers');
    }
}
