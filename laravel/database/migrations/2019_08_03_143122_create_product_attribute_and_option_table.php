<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductAttributeAndOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attribute_and_option', function (Blueprint $table) {
            $table->increments('pao_id');
            $table->integer('pao_product_id')->unsigned()->comment('sku id');
            $table->integer('pao_option_id')->unsigned()->comment('属性选项id');
            $table->integer('pao_supplier_option_id')->unsigned()->comment('供应商id');
            $table->integer('pao_sort')->unsigned()->default(1000)->comment('辅助排序字段');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
        \DB::statement("ALTER TABLE `product_attribute_and_option` comment '商品-系统属性关系表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_attribute_and_option');
    }
}
