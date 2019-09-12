<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImportOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_code', 25)->nullable();

            $table->string('commodity_code', 25)->nullable();
            $table->string('unit', 128);
            $table->unsignedBigInteger('quantity')->default(0);
            $table->unsignedBigInteger('price')->default(0);

            $table->timestamps();

            $table->foreign('order_code')->references('code')->on('import_orders')->onDelete('cascade');
            $table->foreign('commodity_code')->references('code')->on('commodities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('import_order_details');
    }
}
