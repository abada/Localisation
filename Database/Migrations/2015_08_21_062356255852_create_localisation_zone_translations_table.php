<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalisationZoneTranslationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('localisation__zone_translations', function(Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields
						 $table->string('title');
            $table->integer('zone_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['zone_id', 'locale']);
            $table->foreign('zone_id')->references('id')->on('localisation__zones')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('localisation__zone_translations');
	}
}
