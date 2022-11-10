<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('contact_no');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('mission_id');
            $table->string('role');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('active_yn');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('country_id')->references('id')->on('country')->onDelete('cascade');
            $table->foreign('mission_id')->references('id')->on('lmission')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
