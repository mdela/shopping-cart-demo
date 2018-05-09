<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products_stock';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'product_id', 'initial', 'current',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
		'initial' => 'integer',
		'current' => 'integer',
    ];

    /**
     * Get the products in stock.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
