<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'quantity', 'unit_price','invoice_id', 'product_id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'quantity' => 'integer',
        'unit_price' => 'float',
        'total' => 'float',
    ];

    /**
     * Set the purchase shipping charge
     *
     * @param  string  $value
     * @return void
     */
    public function setQuantityAttribute($value)
    {
        $this->attributes['quantity'] = intval($value);
    }

    /**
     * Get the item price
     *
     * @param  float  $value
     * @return void
     */
    public function getPriceAttribute($value)
    {
        return number_format($this->unit_price,2,',','.');
    }

    /**
     * Set the total charge for the purchase.
     *
     * @param  float  $value
     * @return void
     */
    public function setTotalAttribute()
    {
        $total = $this->unit_price * $this->quantity;
        $this->attributes['total'] = floatval($total);
    }

    /**
     * Get the invoice to which the item belongs.
     */
    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }

    /**
      * Get the product that represent the item.
     */
    public function product(){
        return $this->belongsTo(Product::class);
    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function($row){
            $row->total = 0;
        });
    }

}
