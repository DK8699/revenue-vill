<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProposalDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposal_documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('proposal_id')->unsigned()->index()->comment('Proposal to which a document belongs to.');
            $table->text('proposal_document')->comment('Path to the proposal documents of a proposed revenue village');
            $table->timestamps();
            $table->foreign('proposal_id')->references('id')->on('proposals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposal_documents');
    }
}
