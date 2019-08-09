<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductAttributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attribute', function (Blueprint $table) {
            $table->increments('pattr_id');
            $table->integer('pattr_product_id')->unsigned()->comment('商品id');
            $table->string('pattr_name', 255)->collation('utf8mb4_unicode_ci')->comment('自定义属性名称');
            $table->integer('pattr_sort')->unsigned()->comment('辅助排序字段');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
        \DB::statement("ALTER TABLE `product_attribute` comment '自定义属性表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_attribute');
    }
}
