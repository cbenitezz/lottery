<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLotteriesTable extends Migration {

	public function up()
	{
		Schema::create('lotteries', function(Blueprint $table) {
			$table->increments('id');
			$table->string('eslogan', 250);
			$table->string('nit', 20);
			$table->string('name', 150);
			$table->string('representative', 150);
			$table->date('date_start');
			$table->date('date_end');
			$table->integer('ticket_value');
			$table->string('lottery', 150);
			$table->string('winning_number_lottery', 4);
			$table->integer('commission_sale');
			$table->string('address', 200);
			$table->string('city', 150);
			$table->integer('per_commission_sale');
			$table->softDeletes();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('lotteries');
	}
}