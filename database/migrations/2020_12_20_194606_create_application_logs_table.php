<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_logs', function (Blueprint $table) {
            $table->id();
            $table->string('start_date');
            $table->string('end_date');
            $table->integer('status');
            $table->unsignedBigInteger('applied_by');
            $table->unsignedBigInteger('leave_id')->nullable();

            $table->foreign('leave_id')->references('id')->on('leaves')
                ->onUpdate('restrict')->onDelete('restrict');

            $table->foreign('applied_by')->references('id')->on('users')
                ->onUpdate('restrict')->onDelete('restrict');

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
        Schema::dropIfExists('application_logs');
    }
}
