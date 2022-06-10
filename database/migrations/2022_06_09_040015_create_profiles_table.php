<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfilesTable extends Migration {

	public function up()
	{
		Schema::create('profiles', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('identification_card', 30)->nullable();
			$table->string('name', 150);
			$table->string('last_name', 150)->nullable();
			$table->string('city', 50)->nullable();
			$table->string('address', 150)->nullable();
			$table->string('sector', 150)->nullable();
			$table->string('phone', 30)->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('profiles');
	}
}
