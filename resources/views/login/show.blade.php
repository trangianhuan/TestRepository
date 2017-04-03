<html>
<head>
  <title></title>
  
  <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/test.js')}}"></script>
  <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/testcss.css')}}">
</head>
<body>
{{Form::open(['method' => 'POST','route'=>'checkLogin'])}}
<div class="container col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6 col-lg-offset-4 col-lg-4">
    <br>
    <br>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Login</h1>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-user" style="width: auto"></i>
                    </span>
                    {{Form::text('userId',null,['class'=>'form-control','placeholder'=>'Account'])}}
                    <!-- <input id="txtUsuario" runat="server" type="text" class="form-control" name="user" placeholder="Account" required=""> -->
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-lock" style="width: auto"></i>
                    </span>
                    {{Form::text('password',null,['class'=>'form-control','placeholder'=>'Password'])}}
                    <!-- <input id="txtSenha" runat="server" type="password" class="form-control" name="password" placeholder="Password" required=""> -->
                </div>
            </div>
            <button id="btnLogin" runat="server" class="btn btn-default" style="width: 100%">
                LOGIN<i class="glyphicon glyphicon-log-in"></i>
            </button>
        </div>
    </div>
</div>
{{Form::close()}}
</body>
</html>