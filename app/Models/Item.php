<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['item_image', 'item_size', 'item_condition', 'seller_id'];

    // Item と Seller の関連付け（多対一）
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
