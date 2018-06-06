<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id')->comment('主键');
            $table->string('goods_name','40')->comment('商品名字');
            $table->text('goods_content')->comment('商品描述');
            $table->tinyInteger('goods_type')->comment('商品类型');
            $table->integer('click_cout')->comment('点击次数');
            $table->tinyInteger('is_free_shipping')->comment('是否包邮');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods');
    }
}
