<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBannersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('banners', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->unsignedInteger('site_id');
			$table->foreign('site_id')->references('id')->on('sites');
			$table->timestamps();
		});

		Schema::create('banner_items', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('banner_id');
			$table->foreign('banner_id')->references('id')->on('banners');
			$table->integer('order')->nullable();
			$table->string('url')->nullable();
			$table->string('image_file_name')->nullable();
			$table->integer('image_file_size')->nullable();
			$table->string('image_content_type')->nullable();
			$table->timestamp('image_updated_at')->nullable();
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
		Schema::drop('banner_itens');
		Schema::drop('banners');
	}

}
