<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Image;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'cat_id',
        'admin_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }


    public function scopeCheckAuth(Builder $query): void
    {
        $query->where('admin_id', '=', auth('admin')->user()->id);
    }


    public function imagables()
    {
        return $this->morphMany(Image::class, 'images');
    }
}
