<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id',
        'total_amount'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function recalculateTotalAmount()
    {
        $this->load('products');
        $this->total_amount = $this->products->sum(function ($product) {
            return $product->price * $product->pivot->quantity;
        });
        $this->save();
    }
}