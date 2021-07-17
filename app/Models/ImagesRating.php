<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagesRating extends Model
{
    use HasFactory;

    protected $table = "images_rating";
    protected $fillable = ['name','path','rating_id'];

    public function ratings()
    {
        return $this->belongsTo(Rating::class);
    }

    public function getImageUrlAttribute()
    {
        return url(\Illuminate\Support\Facades\Storage::url($this->path));
    }
}
