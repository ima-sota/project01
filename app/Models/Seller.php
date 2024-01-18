<?php

// app/Models/Seller.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = ['seller_name', 'seller_email'];

    // Seller と Item の関連付け（一対多）
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
