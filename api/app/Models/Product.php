<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'image', 'price', 'qty', 'category_id', 'store_id', 'status_id', 'is_active'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
