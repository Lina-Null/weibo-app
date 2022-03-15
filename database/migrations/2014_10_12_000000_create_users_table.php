<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 运行迁移
     * @return void
     */
    public function up()
    {
        //通过 Schema类的create 方法来创建users表
        //create接收两个参数 一个是表名称 users  一个是接收$table（Blueprint实例）的闭包
        //迁移类中通过 Blueprint 的实例 $table 为 users 表创建所需的数据库字段
        Schema::create('users', function (Blueprint $table) {
            $table->id(); //id()是bigIncrements()  自增长id bigint unsigned
            $table->string('name');
            $table->string('email')->unique();  //unique() 唯一值
            $table->timestamp('email_verified_at')->nullable();  //Email验证时间，nullable 空的话意味着用户还未验证邮箱
            $table->string('password');
            $table->string('password_show');
            $table->rememberToken(); //用于保存 记住我的相关信息
            $table->timestamps();  //由 timestamps 方法创建了一个 created_at 和一个 updated_at 字段，分别用于保存用户的创建时间和更新时间。
        });
    }

    /**
     * Reverse the migrations.
     * 回滚迁移
     * @return void
     * down 方法会在回滚命令发起时被调用，是 up 方法的逆向操作。
     * 在上面的代码中，up 创建了 users 表，那么这里将会通过调用 Schema 的 drop 方法来删除 users 表。
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
