<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInstructorIdUpcomingInOexMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oex_exam_masters', function (Blueprint $table) {
            //
            $table->string('instructor_id')->nullable();
            $table->string('is_upcoming')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('oex_exam_masters', function (Blueprint $table) {
            //
            $table->dropColumn('instructor_id');
            $table->dropColumn('is_upcoming');
        });
    }
}
