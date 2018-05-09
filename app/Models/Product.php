<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'category_id', 'brand', 'model', 'name', 'description', 'price',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'price' => 'float',
    ];

	/**
	 * Get the product formated price.
	 *
	 * @return string
	 */
	public function getFormatedPriceAttribute()
	{

	    return number_format($this->price, 2, ',','.');
	}

	/**
	 * Get the category to which the product belongs.
	 */
    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    /**
     * Get the stock record associated with the product.
     */
    public function stock()
    {
        return $this->hasOne(ProductStock::class);
    }

     /**
     * Scope a query to only include available products.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAvailable($query)
    {
        return $query->whereHas('stock', function ($q) {
            $q->where('current','>', 0);
        });
    }
}
