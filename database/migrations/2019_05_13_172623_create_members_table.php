<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('C_members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('C_name');
            $table->string('C_surname');
            //$table->string('C_username');
            $table->enum('C_gender', ['Male', 'Female', 'Other']);
            $table->string('C_password');
            $table->string('C_address');
            $table->string('C_email')->unique();
            $table->string('C_phonenumbers')->unique();
            $table->string('C_picture');
            $table->enum('C_usertype', ['Community_Member', 'Patrol_Member', 'Patrol_Leader'])->default('Community_Member');
            $table->date('C_dob');
            $table->enum('C_status', ['Active', 'Deactivated'])->default('Active');
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
        Schema::dropIfExists('C_members');
    }
}
