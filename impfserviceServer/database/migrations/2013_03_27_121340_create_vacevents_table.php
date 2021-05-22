<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaceventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacevents', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->dateTime('startTime');
            $table->dateTime('endTime');
            $table->integer('maxVac')->default('5');
            $table->foreignId('vaclocation_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('vacevents');
    }
}
