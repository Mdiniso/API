<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('c_member_id');
            $table->foreign('c_member_id')->references('id')->on('C_members')->onDelete('cascade');
            $table->unsignedBigInteger('Patrol_id');
            $table->foreign('Patrol_id')->references('id')->on('Patrols')->onDelete('cascade');
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
        Schema::dropIfExists('p_members');
    }
}
