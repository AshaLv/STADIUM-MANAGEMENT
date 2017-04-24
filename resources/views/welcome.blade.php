<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>经管学员篮球队成员信息管理系统</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

        </style>
    </head>
    <body style="background-image: url('public/1.jpg'); background-repeat: no-repeat;background-size: cover;">
        <a href="/home" style="text-decoration: none;"><h1 style="position: relative;color: brown;text-decoration: none;">黄逸伦篮球馆<br>物资管理系统</h1></a>
        <div class="flex-center position-ref full-height">
            
            <div class="content">
                <div class="title m-b-md">
                 @if (Auth::guest())
                    <a  class="btn btn-primary"  style="text-decoration: none;font-size: 24px" data-target="#login" data-toggle="modal">登入</a>
                    <a class="btn btn-primary"  style="text-decoration: none;font-size: 24px" data-target="#register" data-toggle="modal">注册</a>
                @endif
                </div>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>

<!-- login -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="position: relative;top: 120px">
      <div class="modal-body">
        @include('auth.login')
      </div>
    </div>
  </div>
</div>

<!-- register -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="position: relative;top: 120px">
      <div class="modal-body">
        @include('auth.register')
      </div>
    </div>
  </div>
</div>

    </body>
</html>
