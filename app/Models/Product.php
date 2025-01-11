<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';
    public $incrementing = false; // Karena primary key berupa string manual
    protected $keyType = 'string';

    protected $fillable = [
        'product_id',
        'product_name',
        'image',
        'description',
        'price',
        'stock',
    ];
}
