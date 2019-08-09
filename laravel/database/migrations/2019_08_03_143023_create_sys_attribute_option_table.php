<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSysAttributeOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_attribute_option', function (Blueprint $table) {
            $table->increments('opt_id');
            $table->string('opt_name', 255)->collation('utf8mb4_unicode_ci ')->comment('系统属性选项的名称');
            $table->integer('opt_attribute_id')->unsigned()->comment('属性id');
            $table->integer('opt_sort')->unsigned()->default(1000)->comment('辅助排序字段');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
        \DB::statement("ALTER TABLE `sys_attribute_option` comment '系统属性选项表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_attribute_option');
    }
}
