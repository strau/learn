<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_category', function (Blueprint $table) {
            $table->increments('pc_id');
            $table->string('pc_name', 255)->collation('utf8mb4_unicode_ci')->comment('商品分类名称');
            $table->integer('pc_upid')->unsigned()->default(0)->comment('商品分类的上级分类id');
            $table->string('pc_img', 255)->collation('utf8mb4_unicode_ci')->nullable()->comment('商品分类封面图url地址');
            $table->tinyInteger('pc_index_block_status')->unsigned()->default(0)->comment('首页块级显示状态: 0.不显示, 1.显示');
            $table->timestamp('pc_created_at')->comment('商品分类创建时间');
            $table->timestamp('pc_updated_at')->comment('商品分类最后修改时间');
            $table->timestamp('deleted_at')->nullable()->comment('商品分类删除时间');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
        \DB::statement("ALTER TABLE `product_category` comment '商品分类表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_category');
    }
}
