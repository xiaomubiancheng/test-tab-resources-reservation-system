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
            $table->string('username',20)->comment('账号');
            $table->string('truename',20)->comment('姓名');
            $table->string('itcode',20)->default('')->comment("ITcode");
            $table->char('itcode_status',1)->default(0)->comment("itcode登录状态");
            $table->string('password',255)->comment('密码');
            $table->string('email',40)->default('')->comment('邮箱');
            $table->string('remember_token',255)->default('')->comment('记住密码TOKEN');
            $table->timestamps();
            $table->softDeletes(); //软删除
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
