<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('user_id');
            $table->string('invoice_number');
            $table->string('quantity');
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
        Schema::dropIfExists('book_orders');
    }
}
