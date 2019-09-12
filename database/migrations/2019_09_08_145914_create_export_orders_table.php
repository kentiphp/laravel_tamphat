<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExportOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('export_orders', function (Blueprint $table) {
            $table->string('code', 25)->unique()->primary();
            $table->string('customer_code', 25);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('customer_code')->references('code')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('export_orders');
    }
}
