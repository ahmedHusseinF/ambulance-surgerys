<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationQueuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_queues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ReservationUniqueKey')->nullable();
            $table->string('operation_type');
            $table->string('Insurance_Type');
            $table->integer('Operation_Cost')->nullable();
            $table->integer('Operation_Cost_Paid_Amount')->nullable();
            $table->integer('createdAt_hospital')->unsigned();
            $table->boolean('isDistributed');
            $table->bigInteger('patientID');

            $table->timestamps();

            $table->foreign('createdAt_hospital')->references('id')->on('hospitals');
            $table->foreign('patientID')->references('NationalID')->on('patients');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation_queues');
    }
}
