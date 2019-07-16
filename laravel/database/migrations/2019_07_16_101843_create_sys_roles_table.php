<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSysRolesTable extends Migration
{
    /**
     * 系统角色信息表
     *
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_roles', function (Blueprint $table) {
            $table->increments('id')->comment('系统角色主键ID');
            $table->string('role_name', 32)->comment('系统角色名称');
            $table->string('role_desc', 255)->nullable()->comment('系统角色描述');
            $table->timestamp('role_updated_at')->nullable()->comment('最后一次修改系统角色的时间');
            $table->timestamp('role_created_at')->nullable()->comment('创建系统角色的时间');
            $table->softDeletes()->comment('删除系统角色的时间');

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
        Schema::dropIfExists('sys_roles');
    }
}
