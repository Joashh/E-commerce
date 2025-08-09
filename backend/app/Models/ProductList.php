<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductList extends Model

{
    use HasFactory;
     protected $table = 'product_list';
    protected $fillable = ['img_path','name', 'description', 'price', 'availability', 'category', 'posted_id'];
}
