<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('products', function(Blueprint $table)
		{
			$table->string('name_url')->nullable();
			$table->integer('category_id')->nullable()->unsigned();
			$table->foreign('category_id')->references('id')->on('categories');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('products', function(Blueprint $table)
		{
			$table->dropForeign('products_category_id_foreign');
			$table->dropColumn('category_id');
			$table->dropColumn('name_url');
		});
	}

}
