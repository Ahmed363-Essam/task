<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'images_name', 'images_id', 'images_type',
    ];

    protected $table = 'images';


    public function imageables()
    {
        return $this->morphTo();
    }
}
