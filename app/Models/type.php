<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type extends Model
{
    use HasFactory;
    //获取分类
    static function novel(){
        return self::get();
    }
}
