<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name','dni','phone','address_id'
    ];

    /**
	 * Get the client's full name.
	 *
	 * @return string
	 */
	public function getFullNameAttribute()
	{
	    return "{$this->first_name} {$this->last_name}";
	}

	/**
	 * Get the user that represent the client.
	 */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
	 * Get the address that belongs to the client.
	 */
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    /**
	 * Get the invoices that belongs to the client.
	 */
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
