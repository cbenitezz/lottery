<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCustomersRecordView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("DROP VIEW IF EXISTS customers_records");
        DB::statement("
            CREATE VIEW customers_records
            AS
            SELECT
            customers.id,
            customers.identification_card,
            customers.name,
            customers.last_name,
            customers.phone,
            tickets.number_ticket,
            tickets.paid_ticket as abono,
            users.name as seller

            FROM
            customers
            inner join tickets on tickets.customer_id = customers.id
            inner join users on customers.seller_id = users.id
            where customers.deleted_at is null and customers.status = '1' order by id asc
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS customers_records");
    }
}
