<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('payments', function(Blueprint $table) {
			$table->foreign('ticket_id')->references('id')->on('tickets')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('profiles', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('tickets', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('tickets', function(Blueprint $table) {
			$table->foreign('lottery_id')->references('id')->on('lotteries')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
        Schema::table('tickets', function(Blueprint $table) {
			$table->foreign('customer_id')->references('id')->on('customers')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
        Schema::table('customers', function(Blueprint $table) {
			$table->foreign('seller_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});


	}

	public function down()
	{
		Schema::table('payments', function(Blueprint $table) {
			$table->dropForeign('payments_ticket_id_foreign');
		});
		Schema::table('profiles', function(Blueprint $table) {
			$table->dropForeign('profiles_user_id_foreign');
		});
		Schema::table('tickets', function(Blueprint $table) {
			$table->dropForeign('tickets_user_id_foreign');
		});
		Schema::table('tickets', function(Blueprint $table) {
			$table->dropForeign('tickets_lottery_id_foreign');
		});
        Schema::table('tickets', function(Blueprint $table) {
			$table->dropForeign('tickets_customer_id_foreign');
		});
        Schema::table('customers', function(Blueprint $table) {
			$table->dropForeign('customers_seller_id_foreign');
		});

	}
}
