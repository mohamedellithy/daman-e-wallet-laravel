<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payer_id')->nullable();
            $table->foreign('payer_id')->references('id')->on('users');
            $table->unsignedBigInteger('payee_id');
            $table->foreign('payee_id')->references('id')->on('users');
            $table->decimal('value',10,2);
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->comments('0 => pending , 1 => approve , 2 => refused');
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
        Schema::dropIfExists('payment_orders');
    }
}
