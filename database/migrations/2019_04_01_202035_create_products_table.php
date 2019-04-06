<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('products', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name');
			$table->string('code');
			$table->float('price');
			$table->string('image');
			$table->text('description');
			$table->timestamps();
		});

		// Schema::create('product_custom_fields', function (Blueprint $table) {
		// 	$table->increments('id');
		// 	$table->integer('product_id')->unsigned();
		// 	$table->string('name');
		// 	$table->text('description');
		// 	$table->timestamps();

		// 	$table->foreign('product_id')
		// 		->references('id')
		// 		->on('products')
		// 		->onDelete('cascade');
		// });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('products');
	}
}
