<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomFieldsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('custom_fields', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedBigInteger('product_id');
			$table->string('name');
			$table->text('description');
			$table->timestamps();

			$table->foreign('product_id')
				->references('id')
				->on('products')
				->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('custom_fields');
	}
}
