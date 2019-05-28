<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('nro');
            $table->unsignedBigInteger('space_id');
            $table->string('title');
            $table->string('code');
            $table->unsignedBigInteger('milestone_id');
            $table->unsignedBigInteger('assigned_id');
            $table->unsignedBigInteger('tester_id');
            $table->string('status');
            $table->integer('work_remaining');
            $table->integer('worked_hours');
            $table->string('estimate');
            $table->unsignedBigInteger('brand_id');
            $table->time('production_date');
            $table->timestamps();

            // Se agregan relaciones

            //$table->foreign('milestone_id')->references('id')->on('milestones')->onDelete('cascade');
            $table->foreign('milestone_id')->references('id')->on('milestones')->onUpdate('cascade');

            // $table->foreign('assigned_id')->references('id')->on('people')->onDelete('cascade');
            // $table->foreign('assigned_id')->references('id')->on('people')->onUpdate('cascade');

            // $table->foreign('tester_id')->references('id')->on('people');
            // $table->foreign('tester_id')->references('id')->on('people');

            // $table->foreign('brand_id')->references('id')->on('milestones')->onDelete('cascade');
            // $table->foreign('brand_id')->references('id')->on('milestones')->onUpdate('cascade');
      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
