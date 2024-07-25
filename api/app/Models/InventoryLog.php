<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InventoryLog extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'product_id', 'qty'];

    
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
