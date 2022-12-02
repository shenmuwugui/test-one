<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>详情页面</title>
</head>
<body>
<div class="box">
    <h2>{{$data['novelname']}}</h2>
    <p>
        <span>作者：{{$data['author']}}</span>
        <span>分类：{{$data['t_name']}}</span>
        <span>状态：
            @if($data['status']==1)
                已完结
            @else
                连载中
            @endif
        </span>
    </p>
    <p><img src="{{$data['img']}}" alt=""></p>
    <p>&emsp;&emsp;{{$data['conment']}}</p>
    <p><span>添加时间：{{$data['created_at']}}</span></p>
</div>
</body>
</html>
