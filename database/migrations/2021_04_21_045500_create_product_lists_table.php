<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('goldquality')->nullable();
            $table->string('shopname')->nullable();
            $table->integer('kyat');
            $table->integer('pel');
            $table->integer('yway');
            $table->integer('ayaw');
            $table->integer('k_price');
            $table->integer('k_kyat');
            $table->integer('k_pel');
            $table->integer('k_yway');
            $table->date('bought_date');
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
        Schema::dropIfExists('product_lists');
    }
}
