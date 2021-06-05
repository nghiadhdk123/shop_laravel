<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','origin_price', 'price_sales', 'content', 'user_id'];
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orders(){
        $this->belongsToMany(Order::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    
}
