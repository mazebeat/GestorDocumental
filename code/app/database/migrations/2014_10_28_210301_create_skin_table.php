<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSkinTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('skin', function (Blueprint $table) {
			$table->increments('id');
			$table->string('header-color');
			$table->string('header-image');
			$table->string('body-color');
			$table->string('body-image');
			$table->string('footer-color');
			$table->string('footer-image');
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
		Schema::drop('skin');
	}

}
