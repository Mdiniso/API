<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmergencyServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emergency_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ES_name');
            $table->string('ES_contactnumbers');
            $table->timestamps();
        });

        DB::table('emergency_services')->insert(
            array(
                [
                    'ES_name' => 'Nationwide police',
                    'ES_contactnumbers' => '10111',
                    'created_at' => now()
                ],
                [
                    'ES_name' => 'Nationwide ambulance',
                    'ES_contactnumbers' => '10177',
                    'created_at' => now()
                ],
                [
                    'ES_name' => 'Nationwide fire Brigade',
                    'ES_contactnumbers' => '10177',
                    'created_at' => now()
                ]


            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emergency_services');
    }
}
