<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>后台管理系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="/css/main.css" rel="stylesheet" type="text/css"/>
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
    <script src="/js/jquery-1.8.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</head>
<body>
<!-- 上 -->
<div class="navbar">
    <div class="navbar-inner">
        <div class="container-fluid">
            <ul class="nav pull-right">
                <li id="fat-menu" class="dropdown">
                    <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-user icon-white"></i> admin
                        <i class="icon-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="javascript:void(0);">修改密码</a></li>
                        <li class="divider"></li>
                        <li><a tabindex="-1" href="javascript:void(0);">安全退出</a></li>
                    </ul>
                </li>
            </ul>
            <a class="brand" href="index.html"><span class="first">后台管理系统</span></a>
            <ul class="nav">
                <li class="active"><a href="javascript:void(0);">首页</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- 左 -->
<!-- 右 -->
<div>
    <div class="header">
        <h1 class="page-title">小说修改</h1>
    </div>

    <!-- add form -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="update?id={{$data['id']}}" method="post" id="tab" enctype="multipart/form-data">
        @csrf
        <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="#basic" data-toggle="tab">基本信息</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="basic">
                <div class="well">
                    <label>小说名称：</label>
                    <input type="text" name="novelname" value="{{$data['novelname']}}" class="input-xlarge">
                    <label>小说作者：</label>
                    <input type="text" name="author" value="{{$data['author']}}" class="input-xlarge">
                    <label>小说封面：</label>
                    <input type="file" name="img" class="input-xlarge">
                    <label>小说状态：</label>
                    <select name="status" class="input-xlarge">
                        @if($data['status']==1)
                            <option value="0">连载中</option>
                            <option value="1" selected>已完结</option>
                        @else
                            <option value="0" selected>连载中</option>
                            <option value="1">已完结</option>
                        @endif
                    </select>
                    <label>小说分类：</label>
                    <select name="tid" class="input-xlarge">
                        @foreach($type as $val)
                            @if($data['tid']==$val['tid'])
                                <option value="{{$val['tid']}}" selected>{{$val['t_name']}}</option>
                            @else
                                <option value="{{$val['tid']}}">{{$val['t_name']}}</option>
                            @endif
                        @endforeach
                    </select>
                    <label>小说简介：</label>
                    <textarea value="Smith" name="conment" rows="3" class="input-xlarge"></textarea>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">修改</button>
        </div>
    </form>
    <!-- footer -->
    <footer>
        <hr>
    </footer>
</div>
</body>
</html>
