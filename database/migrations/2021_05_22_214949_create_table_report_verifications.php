<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableReportVerifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_verifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('county_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('case_report_id'); //in future, morph relation to handle vaccine, case or bed report
            $table->date('date');

            $table->foreign('case_report_id')->references('id')->on('case_reports');
            $table->foreign('county_id')->references('id')->on('counties');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('report_verifications');
    }
}
