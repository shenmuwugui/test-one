<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>后台管理系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="./css/main.css" rel="stylesheet" type="text/css"/>
    <link href="./css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="./css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
    <script src="./js/jquery-1.8.1.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
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
<div class="sidebar-nav">
    <a href="#accounts-menu" class="nav-header" data-toggle="collapse"><i class="icon-exclamation-sign"></i>小说管理</a>
    <ul id="accounts-menu" class="nav nav-list collapse in">
        <li><a href="index">小说列表</a></li>
        <li><a href="novel">小说新增</a></li>
    </ul>
</div>
<!-- 右 -->
<div class="content">
    <div class="header">
        <h1 class="page-title">小说列表</h1>
    </div>

    <div class="well">
        <!-- search button -->
        <form action="" method="get" class="form-search">
            <div class="row-fluid" style="text-align: left;">
                <div class="pull-left span4 unstyled">
                    <p> 小说名称：<input class="input-medium" name="ser" type="text"></p>
                </div>
            </div>
            <button type="submit" class="btn">查找</button>
            <a class="btn btn-primary" href="#">新增</a>
        </form>
    </div>
    <div class="well">
        <!-- table -->
        <table class="table table-bordered table-hover table-condensed">
            <thead>
            <tr>
                <th>编号</th>
                <th>小说名称</th>
                <th>小说作者</th>
                <th>小说分类</th>
                <th>小说封面</th>
                <th>小说简介</th>
                <th>小说状态</th>
                <th>添加时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $val)
                <tr class="success">
                    <td>{{$val['id']}}</td>
                    <td><a href="lists?id={{$val['id']}}">{{$val['novelname']}}</a></td>
                    <td>{{$val['author']}}</td>
                    <td>{{$val['t_name']}}</td>
                    <td><img src="{{$val['img']}}" width="50px"></td>
                    <td>{{$val['conment']}}</td>
                    <td>
                        @if($val['status']==1)
                            已完结
                        @else
                            连载中
                        @endif
                    </td>
                    <td>{{$val['created_at']}}</td>
                    <td>
                        <a href="upd?id={{$val['id']}}"> 编辑 </a>
                        <a href="del?id={{$val['id']}}"> 删除 </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <!-- pagination -->
        <div class="pagination">
            {{$data->links()}}
        </div>
    </div>

    <!-- footer -->
    <footer>
        <hr>
        <p>© 2017 <a href="javascript:void(0);" target="_blank">ADMIN</a></p>
    </footer>
</div>
</body>
</html>
