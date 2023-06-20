<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {

            $table->id();

            $table->string('first_name');

            $table->string('last_name');

            $table->date('dob');

            $table->string('email')->unique();

            $table->string('phone', 8);

            $table->string('address');

            $table->dateTime('deleted_at')->nullable();

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
        Schema::dropIfExists('payments');
    }
}
