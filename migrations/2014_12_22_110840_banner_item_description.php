<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BannerItemDescription extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('banner_items', function(Blueprint $table)
		{
			$table->string('title')->nullable();
			$table->string('description')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('banner_items', function(Blueprint $table)
		{
			$table->dropColumn('title');
			$table->dropColumn('description');
		});
	}

}
