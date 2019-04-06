<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomFields extends Model {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'custom_fields';

	/**
	 * Fields that can be mass assigned.
	 *
	 * @var array
	 */
	protected $fillable = ['product_id', 'name', 'description'];

	/**
	 * CustomFields belongs to Product.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function Product()
	{
		// belongsTo(RelatedModel, foreignKey = product_id, keyOnRelatedModel = id)
		return $this->belongsTo(Product::class);
	}
}
