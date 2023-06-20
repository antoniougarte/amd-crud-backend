<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // $statement = 'ALTER TABLE customers MODIFY COLUMN updated_at TIMESTAMP NULL';

        $statement='ALTER TABLE customers MODIFY COLUMN updated_at DATE NULL';
        DB::statement($statement);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
