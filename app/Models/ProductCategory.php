<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'name',
    ];

    /**
     * The products that belong to the category.
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
