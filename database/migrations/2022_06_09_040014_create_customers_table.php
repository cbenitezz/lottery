<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('seller_id')->unsigned();
            $table->string('identification_card', 30)->nullable();
			$table->string('name', 150);
			$table->string('last_name', 150)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('address', 150)->nullable();
			$table->string('sector', 150)->nullable();
			$table->string('phone', 30)->nullable();
            $table->char('status',1)->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
