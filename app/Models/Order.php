<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_time',
        'total_price',
        'total_item',
        'cashier_id',
        'payment_method'
    ];

    public function cashier()
    {
        return $this->belongsTo(User::class, 'cashier_id', 'id');
    }
}
