<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const STATUS_INIT = 0;
    const STATUS_BUY = 1;
    const STATUS_STOP = 2;

    public static $status_text = [
        self::STATUS_INIT => "Đang nhập",
        self::STATUS_BUY => "Đang bán",
        self::STATUS_STOP => "Dừng bán",
    ];

    public function getStatusTextAttribute()
    {
        return self::$status_text[$this->status];
    }


    protected $fillable = ['name','slug','origin_price', 'price_sales', 'content','content_more','category_id','user_id'];

    public function getContentMoreJsonAttribute(){
        $content_json = json_decode($this->content_more, true);
        return $content_json;
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orders(){
        $this->belongsTo(Order::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    
}
