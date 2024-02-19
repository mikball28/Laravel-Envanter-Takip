<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['product_id', 'satis_miktari', 'kalan_miktar', 'hasılat'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
