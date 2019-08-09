<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductAlbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_album', function (Blueprint $table) {
            $table->increments('pa_id');
            $table->integer('pa_product_id')->unsigned()->comment('商品id');
            $table->string('pa_name', 255)->collation('utf8mb4_unicode_ci')->comment('商品名称');
            $table->string('pa_url', 255)->collation('utf8mb4_unicode_ci')->comment('文件url地址');
            $table->integer('pa_size')->unsigned()->comment('文件大小');
            $table->string('pa_sketch', 255)->collation('utf8mb4_unicode_ci')->comment('文件简介');
            $table->tinyInteger('pa_status')->unsigned()->default(1)->comment('文件状态: ');
            $table->tinyInteger('pa_type')->unsigned()->default(1)->comment('文件类型: 1.图片, 2.视频');
            $table->timestamp('pa_created_at')->comment('文件创建时间');
            $table->timestamp('pa_updated_at')->comment('文件最后修改时间');
            $table->timestamp('deleted_at')->nullable()->comment('文件删除时间');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
        \DB::statement("ALTER TABLE `product_album` comment '商品专辑表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_album');
    }
}
