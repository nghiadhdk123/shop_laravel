<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Image extends Model
{
    use HasFactory;

    protected $table = "images";

    protected $fillable = ['name','disk','path','product_id'];

    public function products(){
        return $this->belongsTo(Product::class);
    }

    public function getImageUrlAttribute()
    {
        return url(\Illuminate\Support\Facades\Storage::url($this->path));
    }
}
