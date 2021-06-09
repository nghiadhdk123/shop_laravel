<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userinfor extends Model
{
    use HasFactory;

    protected $table = "user_infor";

    protected $fillable = [
        'address',
        'phone',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
