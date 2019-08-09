<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSkuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sku', function (Blueprint $table) {
            $table->increments('sku_id');
            $table->integer('sku_product_id')->unsigned()->index()->comment('商品id');
            $table->string('sku_name', 255)->collation('utf8mb4_unicode_ci')->comment('sku名称');
            $table->string('sku_img', 255)->collation('utf8mb4_unicode_ci')->nullable()->comment('主图');
            $table->integer('sku_price')->unsigned()->comment('sku价格，单位：分');
            $table->integer('sku_stock')->unsigned()->comment('sku库存');
            $table->string('sku_code', 255)->collation('utf8mb4_unicode_ci')->nullable()->comment('商品编码');
            $table->string('sku_barcode', 255)->collation('utf8mb4_unicode_ci')->nullable()->comment('商品条形码');
            $table->string('sku_data', 255)->collation('utf8mb4_unicode_ci')->nullable()->comment('sku串,用于拼接多个属性');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
        \DB::statement("ALTER TABLE `product_sku` comment '商品sku表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_sku');
    }
}
