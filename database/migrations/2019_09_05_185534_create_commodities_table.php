<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommoditiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commodities', function (Blueprint $table) {
            $table->string('code', 25)->unique();
            $table->string('name');
            $table->string('specifications');
            $table->string('unit');
            $table->unsignedBigInteger('entry_price');
            $table->unsignedBigInteger('price_out');
            $table->unsignedBigInteger('product_carton');
            $table->string('note')->nullable();

            // foreign key
            $table->string('supplier_code');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('supplier_code')->references('code')->on('suppliers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commodities');
    }
}
