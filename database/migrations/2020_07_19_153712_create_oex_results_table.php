<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOexResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oex_results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('exam_id');
            $table->string('user_id');
            $table->string('right_ans');
            $table->string('wrong_ans');
            $table->string('result_json');
            $table->string('status');
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
        Schema::dropIfExists('oex_results');
    }
}
