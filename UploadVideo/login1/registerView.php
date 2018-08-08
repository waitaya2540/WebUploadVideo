<!DOCTYPE html>
<html>
    <head>
        <link href="/workV2/asset/css/bootstrap.min.css" rel="stylesheet">
        <meta charset="utf-8">
        <title></title>
    </head>
    <style media='screen'>
        a{
            color: #000;
            text-decoration: none;
            font-size: 15px;
        }
        a:hover{
            color: #3DF2F5;
            text-decoration: none;
        }
    </style>
    <body>

        <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/workV2/Homepage.php"><i class="glyphicon glyphicon-home" style="font-size: 23px;"></i></a>
          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <!-- <li class="active"><a href="#"><i style="">Register</i><span class="sr-only">(current)</span></a></li> -->
            </ul>
          <ul class="nav navbar-nav navbar-right">
              <li><a href="/workV2/register.php">Register</a></li>
              <li class="dropdown">
              <li><a href="/workV2/login1/index.php">Login</a></li>
              </li>
            </ul>
            </div>
          </div>
        </nav>

        <br/><h2 align='center'>ไอดีหรืออีเมล์นี้มีผู้ใช้งานแล้ว</h2>
        <center><a href='frm_register.php'>Redirect is Register in <span id='redirect'>5</span> Second</a></center>
        <script type="text/javascript">
          var redirect = document.getElementById('redirect');
          setTimeout(() => {redirect.innerHTML = '4'}, 1000);
          setTimeout(() => {redirect.innerHTML = '3'}, 2000);
          setTimeout(() => {redirect.innerHTML = '2'}, 3000);
          setTimeout(() => {redirect.innerHTML = '1'}, 4000);
          setTimeout(() => {window.location = '../register.php'}, 5000);
        </script>
    </body>
</html>
