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
            $table->bigIncrements('id');
            $table->string('username')->nullable();
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('access_token')->nullable();
            $table->string('email_verified_at')->nullable();
            $table->string('type')->nullable();
            $table->string('password')->nullable();
            $table->string('account_status')->nullable();
            $table->bigInteger('role_id')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('profile_picture')->nullable();
            $table->boolean('is_deleted')->default(0);
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
        Schema::dropIfExists('users');
    }
}
