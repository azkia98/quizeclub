<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Foreignkey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories') ->onDelete('cascade');
        });

        Schema::table('exams', function (Blueprint $table) {
            $table->foreign('course_id')->references('id')->on('courses') ->onDelete('cascade');
        });

        Schema::table('questions', function (Blueprint $table) {
            $table->foreign('exam_id')->references('id')->on('exams') ->onDelete('cascade');
        });

        Schema::table('answers', function (Blueprint $table) {
            $table->foreign('question_id')->references('id')->on('questions') ->onDelete('cascade');
        });

        Schema::table('correct_answer', function (Blueprint $table) {
            $table->foreign('answer_id')->references('id')->on('answers') ->onDelete('cascade');
        });

        Schema::table('answer_sheets', function (Blueprint $table) {
            $table->foreign('exam_id')->references('id')->on('exams') ->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users') ->onDelete('cascade');
        });

        Schema::table('user_answers', function (Blueprint $table) {
            $table->foreign('answer_sheet_id')->references('id')->on('answer_sheets') ->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('questions') ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            //
        });
    }
}
