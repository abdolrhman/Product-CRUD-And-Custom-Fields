<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';
    
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['name', 'code', 'price', 'image', 'description'];

    /**
     * Product has many CustomFields.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function CustomFields()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = product_id, localKey = id)
    	return $this->hasMany(CustomFields::class);
    }
}
