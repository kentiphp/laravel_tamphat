<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImportOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_orders', function (Blueprint $table) {
            $table->string('code', 25)->unique()->primary();
            $table->string('supplier_code', 25);
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('import_orders');
    }
}
