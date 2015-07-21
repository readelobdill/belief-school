<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('modules', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name', 200);
            $table->integer('order');
			$table->integer('total_steps');
			$table->integer('module_id')->unsigned();
            $table->boolean('free')->default(false);
            $table->boolean('locks')->default(true);
            $table->string('slug', 50);
			$table->string('type', 50);
            $table->text('data');
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
		Schema::drop('modules');
	}

}
