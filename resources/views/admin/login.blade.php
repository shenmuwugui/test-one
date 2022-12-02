<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>登录</title>
    <link href="./css/login.css" rel="stylesheet" type="text/css"/>
    <style type="text/css">
        .login-bg{
            background: url(./img/login-bg-3.jpg) no-repeat center center fixed;
            background-size: 100% 100%;
        }
    </style>
    <script src='./js/jquery-3.1.1.min.js'></script>
</head>

<body class="login-bg">
<div class="login-box">
    <header>
        <h1>后台管理系统</h1>
    </header>
    <div class="login-main">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('Login')}}" class="form" method="post">
            @csrf
            <div class="form-item">
                <label class="login-icon">
                    <i></i>
                </label>
                <input type="text" id='username' name="username" placeholder="这里输入登录名" required>
            </div>
            <div class="form-item">
                <label class="login-icon">
                    <i></i>
                </label>
                <input type="password" id="password" name="password" placeholder="这里输入密码">
            </div>
            <div class="form-item verify">
                <label class="login-icon">
                    <i></i>
                </label>
                <input type="text" id='verify' class="pull-left" name="" placeholder="这里输入验证码">
                <img class="pull-right" src="./img/verify.png">
                <div class="clear"></div>
            </div>
            <div class="form-item">
                <button type="submit" class="login-btn">
                    登&emsp;&emsp;录
                </button>
            </div>
        </form>
        <div class="msg"></div>
    </div>
</div>
</body>
</html>
