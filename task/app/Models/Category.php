<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Product;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'description', 'admin_id',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function scopeCheckAuth(Builder $query): void
    {
        $query->where('admin_id', '=', auth('admin')->user()->id);
    }
}
