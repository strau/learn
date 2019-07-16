<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSysStaffsTable extends Migration
{
    /**
     * 系统后台员工信息表
     * 
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_staffs', function (Blueprint $table) {
            $table->increments('staff_id')->comment('员工主键ID');
            $table->string('staff_name', 32)->nullable()->index()->comment('员工名称');
            $table->string('staff_email', 128)->nullable()->index()->comment('员工邮箱');
            $table->string('staff_phone', 11)->index()->comment('员工电话');
            $table->string('staff_password', 255)->nullable()->comment('员工登录密码');
            $table->tinyInteger('staff_status')
                ->comment('员工账号状态。1.正常 2.锁定（密码输入错误次数超过限制） 3.封号')
                ->default(1);
            $table->string('staff_token', 100)->nullable()->comment('员工选择‘记住我’选项的令牌');
            $table->timestamp('staff_updated_at')->nullable()->comment('最后一次修改员工时间');
            $table->timestamp('staff_created_at')->nullable()->comment('创建员工时间');
            $table->softDeletes()->comment('删除员工时间');

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
        Schema::dropIfExists('sys_staffs');
    }
}
