<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSysRolePermissionTable extends Migration
{
    /**
     * 系统角色和权限关系表
     *
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_role_permission', function (Blueprint $table) {
            $table->increments('role_perm_id')->comment('系统角色和权限关系表主键ID');
            $table->unsignedInteger('rel_role_id')->comment('系统角色ID');
            $table->unsignedInteger('rel_perm_id')->comment('系统角色ID');
            $table->timestamp('rel_updated_at')->nullable()->comment('最后一次修改系统角色和权限关系的时间');
            $table->timestamp('rel_created_at')->nullable()->comment('创建系统角色和权限关系的时间');
            $table->softDeletes()->comment('删除系统角色和权限关系的时间');

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
        Schema::dropIfExists('sys_role_permission');
    }
}
