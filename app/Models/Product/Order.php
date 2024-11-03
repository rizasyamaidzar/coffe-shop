<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'state',
        'address',
        'city',
        'post_code',
        'phone',
        'email',
        'price',
        'status',
        'user_id',
    ];
}
