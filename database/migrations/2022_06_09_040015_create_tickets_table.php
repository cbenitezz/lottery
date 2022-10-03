<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketsTable extends Migration {

	public function up()
	{
		Schema::create('tickets', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('lottery_id')->unsigned();
            $table->integer('customer_id')->unsigned();
			$table->string('number_ticket');
			$table->decimal('paid_ticket',13,3);
            $table->char('status',1)->default(0);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('tickets');
	}
}
