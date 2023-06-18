<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('certificate_no')->unique();
            $table->string('ip_no')->unique();
            $table->string('child_name')->nullable();
            $table->string('child_name_dev')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_name_dev')->nullable();
            $table->integer('father_nationality')->unsigned()->nullable();
            $table->foreign('father_nationality')->references('id')->on('countries');
            $table->string('mother_name')->nullable();
            $table->string('mother_name_dev')->nullable();
            $table->integer('mother_nationality')->unsigned()->nullable();
            $table->foreign('mother_nationality')->references('id')->on('countries');
            $table->integer('province_id')->unsigned()->nullable();
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->integer('district_id')->unsigned()->nullable();
            $table->foreign('district_id')->references('id')->on('districts');
            $table->integer('municipal_id')->unsigned()->nullable();
            $table->foreign('municipal_id')->references('id')->on('municipals');
            $table->integer('ward_no')->unsigned()->nullable();
            $table->string('address')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('birth_date_bs')->nullable();
            $table->time('birth_time')->nullable();
            $table->enum('gender',['MALE','FEMALE','OTHER'])->nullable();
            $table->string('nationality')->nullable();
            $table->double('weight')->default(0);
            $table->date('registered_date')->nullable();
            $table->string('registered_date_bs')->nullable();
            $table->string('approved_by')->nullable();
            $table->string('verified_by')->nullable();
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
        Schema::dropIfExists('documents');
    }
};
