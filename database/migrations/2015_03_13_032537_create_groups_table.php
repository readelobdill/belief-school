<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('groups', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name', 200);
			$table->timestamps();
		});

        Schema::table('users', function(Blueprint $table) {
           $table->foreign('group_id')->references('id')->on('groups');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('users', function(Blueprint $table) {
            $table->dropForeign('group_id');
        });
		Schema::drop('groups');

	}

}
