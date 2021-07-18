<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['name','product_id','user_id','total','qty','phone','status','content','address'];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    const XU_LI = 1;
    const NHAN_HANG = 2;
    const VAN_CHUYEN = 3;
    const THANH_CONG = 4;
    const HUY = 5;

    public static $status_text = [
        self::XU_LI => "Xử lí",
        self::NHAN_HANG => "Đang lấy hàng",
        self::VAN_CHUYEN => "Đang vận chuyển",
        self::THANH_CONG => "Giao hàng thành công",
        self::HUY => "Yêu cầu hủy đơn",
    ];

    public function getStatusTextAttribute()
    {
        return self::$status_text[$this->status];
    }
}
