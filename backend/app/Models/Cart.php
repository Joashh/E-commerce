<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $fillable = ['price', 'product_id', 'quantity'];

    public function product()
{
    return $this->belongsTo(ProductList::class);
}
}
