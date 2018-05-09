<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subtotal'
    ];

    /**
     * The attributes that have default values.
     *
     * @var array
     */

    protected $attributes = [
        'shipping_charge' => 200,
    ];



    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'shipping_charge' => 'float',
        'subtotal' => 'float',
        'total' => 'float',
    ];

    /**
     * Set the purchase shipping charge
     *
     * @param  string  $value
     * @return void
     */
    public function setShippingChargeAttribute($value)
    {
        $this->attributes['shipping_charge'] = floatval($value);
    }

    /**
     * Set the Subtotal charge for the purchase.
     *
     * @param  string  $value
     * @return void
     */
    public function setSubtotalAttribute($value)
    {
        $this->attributes['subtotal'] = floatval($value);
    }


    /**
     * Get the Subtotal charge for the purchase.
     *
     * @param  float  $value
     * @return void
     */
    public function getPurchaseSubtotalAttribute($value)
    {
        return number_format($this->subtotal,2,',','.');
    }

    /**
     * Set the total charge for the purchase.
     *
     * @param  string  $value
     * @return void
     */
    public function setTotalAttribute()
    {
        $this->attributes['total'] = $this->shipping_charge + $this->subtotal;
    }

    /**
     * Get the total charge for the purchase.
     *
     * @return float
     */
    public function getTotalAttribute($value)
    {
        return number_format($value,2,',','.');
    }

    /**
     * Get the client that owns the invoice.
     */
    public function client(){
        return $this->belongsTo(Client::class);
    }

    /**
     * The items that belong to the invoice.
     */
    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
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
