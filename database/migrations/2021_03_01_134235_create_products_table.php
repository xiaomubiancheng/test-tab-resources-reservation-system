<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('项目ID');
            $table->string('name',50)->comment('项目名称(Project Name)');
            $table->string('pdname',50)->comment('产品名称(Product Name)');
            $table->string('mname',50)->comment('市场名称(Marketing Name)');
            $table->tinyInteger('vpm')->comment('VPM');
            $table->char('devtime',11)->comment('Development(before SS)启动时间');
            $table->char('ostime',11)->comment('OS upgrade 启动时间');
            $table->char('otatime',11)->comment('OTA(12)启动时间');
            $table->string('engteam',30)->comment('研发中心(Engineering Team');
            $table->string('format',30)->comment('Format(形态)');
            $table->decimal('dev_budget',8,2)->comment('Development(before SS)阶段预算');
            $table->decimal('os_budget',8,2)->comment('OS upgrade阶段预算');
            $table->decimal('ota_budget',8,2)->comment('OTA(12)阶段预算');
            $table->decimal('dev_settle',8,2)->default(0)->comment('Development(before SS)阶段预算');
            $table->decimal('os_settle',8,2)->default(0)->comment('OS upgrade阶段预算');
            $table->decimal('ota_settle',8,2)->default(0)->comment('OTA(12)阶段预算');
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
        Schema::dropIfExists('products');
    }
}
