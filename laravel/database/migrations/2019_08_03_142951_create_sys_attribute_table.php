<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSysAttributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_attribute', function (Blueprint $table) {
            $table->increments('attr_id');
            $table->integer('attr_category_id')->unsigned()->comment('商品分类id');
            $table->string('attr_name', 255)->collation('utf8mb4_unicode_ci')->comment('属性名称');
            $table->integer('attr_sort')->unsigned()->default(1000)->comment('辅助排序字段');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
        \DB::statement("ALTER TABLE `sys_attribute` comment '系统属性表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_attribute');
    }
}
