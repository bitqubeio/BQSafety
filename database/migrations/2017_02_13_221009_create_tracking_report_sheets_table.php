<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackingReportSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracking_report_sheets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tracking_report_sheet_responsible');
            $table->tinyInteger('tracking_report_sheet_status')->unsigned();
            $table->date('tracking_report_sheet_start_date');
            $table->date('tracking_report_sheet_end_date');
            $table->mediumText('tracking_report_sheet_description');
            $table->string('tracking_report_sheet_image')->default('default.png');
            $table->string('tracking_report_sheet_file')->nullable();
            $table->integer('reportsheet_id')->unsigned()->unique();
            $table->foreign('reportsheet_id')->references('id')->on('reportsheets');
            $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('tracking_report_sheets');
    }
}
