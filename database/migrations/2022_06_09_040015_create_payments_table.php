<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentsTable extends Migration {

	public function up()
	{
		Schema::create('payments', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('ticket_id')->unsigned();
			$table->decimal('value',13,3);
            $table->string('recibo',50);
            $table->string('talonario',50);
			$table->date('date_payment');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('payments');
	}
}
