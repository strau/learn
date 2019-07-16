<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserUsersTable extends Migration
{
    /**
     * 前台注册用户信息表
     * 
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_users', function (Blueprint $table) {
            $table->increments('user_id')->comment('用户主键ID');
            $table->string('user_name', 32)->nullable()->index()->comment('用户名称');
            $table->string('user_email', 128)->nullable()->index()->comment('用户邮箱');
            $table->string('user_phone', 11)->index()->comment('用户电话');
            $table->string('user_password', 255)->nullable()->comment('用户登录密码');
            $table->tinyInteger('user_status')
                  ->comment('用户账号状态。1.正常 2.锁定（密码输入错误次数超过限制） 3.封号')
                  ->default(1);
            $table->string('user_token', 100)->nullable()->comment('用户选择‘记住我’选项的令牌');
            $table->unsignedTinyInteger('user_error')->default(0)->comment('登录出错次数');
            $table->string('user_login_ip', 32)->nullable()->comment('用户登录IP');
            $table->timestamp('user_updated_at')->nullable()->comment('最后一次修改用户时间');
            $table->timestamp('user_created_at')->nullable()->comment('创建用户时间');
            $table->softDeletes()->comment('删除用户时间');

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
        Schema::dropIfExists('user_users');
    }
}
