<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCheck;
use App\Models\novel;
use App\Models\type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redis;
class novelController extends Controller
{
    //添加视图
    public function novel(){
        $type=type::novel();
        return view('admin.novel',['type'=>$type]);
    }
    //添加
    public function add(AddCheck $request){
        $validated = $request->validated();
        $path = Storage::putFile('image', $request->file('img'));
        $validated['img']='/'.$path;
        $res=novel::add($validated);
        if($res){
            return redirect('index');
        }else{
            return redirect()->back()->withErrors('添加失败，请稍后重试');
        }
    }
    //展示
    public function index(Request $request){
        $ser=$request->input('ser');
        $data=novel::index($ser);
        $data->appends(['ser'=>$ser]);
        return view('admin.index',['data'=>$data]);
    }
    //删除
    public function del(Request $request){
        $id=$request->input('id');
        $res=novel::del($id);
        if($res){
            return redirect('index');
        }else{
            return redirect()->back()->withErrors('删除失败');
        }
    }
    //修改前查询
    public function upd(Request $request){
        $id=$request->input('id');
        $data=novel::upd($id);
        $type=type::novel();
        return view('admin.upd',['data'=>$data,'type'=>$type]);
    }
    //修改
    public function update(AddCheck $request){
        $id=$request->input('id');
        $validated = $request->validated();
        $path = Storage::putFile('image', $request->file('img'));
        $validated['img']='/'.$path;
        $res=novel::updat($validated,$id);
        if($res){
            return redirect('index');
        }else{
            return redirect()->back()->withErrors('修改失败，请稍后重试');
        }
    }
    //详情
    public function lists(Request $request){
        $id=$request->input('id');
        if(Redis::hgetall($id)){
            $data=Redis::hgetall($id);
        }else{
            $data=novel::upd($id)->toArray();
            Redis::hmset($id,$data);
            echo '1';
        }
        return view('admin.lists',['data'=>$data]);
    }
}
