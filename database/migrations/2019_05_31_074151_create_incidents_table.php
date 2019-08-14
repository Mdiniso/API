<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('I_Type', ['Fire', 'Burglary', 'Domestic_violence', 'Other']);
            $table->double('I_LocationLatitude');
            $table->double('I_LocationLongitude');
            $table->enum('I_LevelofPrivacy', ['Private', 'Public']);
            $table->enum('I_Status', ['Solved', 'Unsolved'])->default('Unsolved');
            $table->mediumText('I_AdditionalDetails');
            $table->unsignedBigInteger('c_member_id'); //Name of the model _id
            $table->foreign('c_member_id')->references('id')->on('C_members')->onDelete('cascade');
            //$table->unsignedBigInteger('incident_type_id'); //Name if the model _id
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
        Schema::dropIfExists('incidents');
    }
}
