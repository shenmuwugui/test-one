<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class novel extends Model
{
    use HasFactory;
    //黑名单
    protected $guarded=[];
    //添加
    static function add($data){
        return self::create($data);
    }
    //展示
    static function index($ser){
        return self::join('types','types.tid','novels.tid')
            ->where('novelname','like',"%$ser%")
            ->orderBy('id','desc')
            ->paginate(5);
    }
    //删除
    static function del($id){
        return self::destroy($id);
    }
    //修改前查询,详情
    static function upd($id){
        return self::join('types','types.tid','novels.tid')
            ->where('id',$id)
            ->first();
    }
    //修改
    static function updat($data,$id){
        return self::where('id',$id)->update($data);
    }
}
