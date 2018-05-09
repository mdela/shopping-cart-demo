<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'street','number','floor','dept', 'postal_code', 'city', 'country',
    ];

    
    /**
     * Get the address complete reference.
     *
     * @return string
     */
    public function getFullAddressAttribute(){

    	return "{$this->street} {$this->number}. {$this->dept}{$this->floor} - ({$this->postal_code}). {$this->city} - {$this->country}";
    }

    /**
     * Get the client record associated with the address.
     */
    public function client()
    {
        return $this->hasOne(Client::class);
    }
}
