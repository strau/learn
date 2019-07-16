<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSysPermissionsTable extends Migration
{
    /**
     * 系统权限信息表
     *
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_permissions', function (Blueprint $table) {
            $table->increments('perm_id')->comment('系统权限主键ID');
            $table->string('perm_name', 32)->comment('系统权限名称');
            $table->string('perm_desc', 255)->nullable()->comment('系统权限描述');
            $table->string('perm_router', 255)->default('')->comment('系统权限对应的路由的名称');
            $table->timestamp('perm_updated_at')->nullable()->comment('最后一次修改系统权限的时间');
            $table->timestamp('perm_created_at')->nullable()->comment('创建系统权限的时间');
            $table->softDeletes()->comment('删除系统权限的时间');

            $table->engine    = 'InnoDB';
            $table->charset   = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_permissions');
    }
}
