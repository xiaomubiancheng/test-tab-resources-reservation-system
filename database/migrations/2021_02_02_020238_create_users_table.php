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
            $table->bigIncrements('id')->comment('用户ID');
            $table->string('username',20)->comment('用户名');
            $table->string('itcode',20)->comment("ITcode");
            $table->string('password',255)->comment('密码');
            $table->string('email',40)->default('')->comment('邮箱');
            $table->unsignedInteger('created_at')->default(0)->comment('创建于');
            $table->unsignedInteger('updated_at')->default(0)->comment('创建于');
            $table->string('remember_token',255)->default('')->comment('记住密码TOKEN');
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
