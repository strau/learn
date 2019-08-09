<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePdtProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdt_product', function (Blueprint $table) {
            $table->increments('p_id');
            $table->string('p_name', 255)->collation('utf8mb4_unicode_ci')->comment('商品标题');
            $table->integer('p_category_id')->unsigned()->comment('商品分类id');
            $table->integer('p_mer_id')->unsigned()->comment('商家id');
            $table->tinyInteger('p_type_id')->unsigned()->comment('类型id');
            $table->string('p_sketch', 255)->collation('utf8mb4_unicode_ci')->nullable()->comment('商品简述');
            $table->text('p_introduce')->collation('utf8mb4_unicode_ci')->comment('商品详细介绍');
            $table->string('p_keywords', 255)->collation('utf8mb4_unicode_ci')->nullable()->comment('商品关键字');
            $table->string('p_tags', 255)->collation('utf8mb4_unicode_ci')->nullable()->comment('商品标签');
            $table->string('p_marque', 255)->collation('utf8mb4_unicode_ci')->nullable()->comment('商品型号');
            $table->string('p_barcode', 255)->collation('utf8mb4_unicode_ci')->nullable()->comment('仓库条形码');
            $table->integer('p_brand_id')->comment('商品品牌id');
            $table->integer('p_virtual')->default(0)->comment('虚拟购买数量');
            $table->integer('p_price')->comment('商品价格，单位：分');
            $table->integer('p_market_price')->comment('商品市场价格，单位：分');
            $table->integer('p_integral')->default(0)->comment('可使用积分抵消');
            $table->integer('p_stock')->comment('商品库存数量');
            $table->integer('p_warning_stock')->comment('库存警告数量');
            $table->string('p_picture_url', 255)->collation('utf8mb4_unicode_ci')->comment('封面图');
            $table->tinyInteger('p_status')->unsigned()->comment('商品上架状态: 0.下架, 1.未上架,2.已上架,3.预售');
            $table->tinyInteger('p_audit_state')->unsigned()->default(0)->comment('商品审核状态: 0.待审核, 1.审核未通过, 2.审核通过');
            $table->tinyInteger('p_is_package')->unsigned()->default(0)->comment('是否是套餐商品, 0.否, 1.是');
            $table->tinyInteger('p_is_integral')->unsigned()->default(0)->comment('是否是积分商品, 0.否, 1.是');
            $table->integer('p_sort')->unsigned()->default(10000)->comment('商品辅助排序字段');
            $table->timestamp('p_created_at')->comment('商品创建时间');
            $table->timestamp('p_updated_at')->comment('商品最后更新时间');
            $table->timestamp('deleted_at')->comment('商品删除时间');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });

        \DB::statement("ALTER TABLE `pdt_product` comment '商品表(spu表)'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pdt_product');
    }
}
