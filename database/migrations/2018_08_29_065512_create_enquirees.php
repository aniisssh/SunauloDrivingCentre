<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnquirees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses');
            $table->text('first_name');
            $table->text('last_name');
            $table->text('email');
            $table->text('address');
            $table->text('contact_no');
            $table->text('date_of_birth');
            $table->text('remarks')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enquirees');
    }
}
