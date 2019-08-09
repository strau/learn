<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductBrandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_brand', function (Blueprint $table) {
            $table->increments('pb_id');
            $table->integer('pb_product_category_id')->unsigned()->comment('商品分类id');
            $table->string('pb_name', 255)->collation('utf8mb4_unicode_ci')->comment('品牌名称');
            $table->string('pb_img', 255)->collation('utf8mb4_unicode_ci')->comment('品牌图片url地址');
            $table->integer('pb_sort')->unsigned()->default(1000)->comment('辅助排序字段');
            $table->timestamp('pb_created_at')->comment('品牌创建时间');
            $table->timestamp('pb_updated_at')->comment('品牌最后修改时间');
            $table->timestamp('deleted_at')->nullable()->comment('品牌删除时间');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
        \DB::statement("ALTER TABLE `product_brand` comment '商品品牌表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_brand');
    }
}
