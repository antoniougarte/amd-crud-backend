<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {

            $table->id();

            $table->float('payment');

            $table->unsignedBigInteger('customer_id');

            $table->foreign('customer_id')->references('id')->on('customers');

            $table->timestamps();

            $table->string('transaction_id', 120);

            $table->date('payment_date');
            

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
