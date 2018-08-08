<!DOCTYPE html>
<html>
<head>
    <link href="/workV2/asset/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="utf-8">
    <title>upload</title>
</head>

<style media="screen" rel="stylesheet">
.wallpaper2 {
    width: 50%;
    margin: 0 auto;

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

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!-- <li><a href="#">#</a></li> -->
                    <li class="dropdown">
                        <!-- <li><a href="/workV2/login/index.php">Login</a></li> -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="wallpaper2">
        <?php
        session_start();
        include'./connectdb.php';
        $name =$_FILES['video']['name'];
        $type = explode(".",$name);
        $type = end($type);
        $ran_name = md5(time() . $name) . '.' .$type;
        // ------------------------------------------------------------------------------
        $uid = $_SESSION['user_data']['login_ID'];
        // ------------------------------------------------------------------------------
        $temp = $_FILES['video']['tmp_name'];
        if($type=='MP4'|| $type=='mp4') {
            $url = 'Video' . DIRECTORY_SEPARATOR . $ran_name;

            move_uploaded_file($temp, $url);

            $video  = __DIR__ . DIRECTORY_SEPARATOR . $url;
            $image  = __DIR__ .'\\Video\\thumbnail\\' . $ran_name . '.jpg';

            require 'ffmpeg.php';

            $time1 = Time();
            $date1 = date("Y-m-d h:i:s A", $time1);

            //นำข้อมูลลงฐานข้อมูล
            // ------------------------------------------------------------------------------
            $sql="INSERT INTO tbupload(name,url,UID,date) VALUES('$name','$ran_name','$uid', now())";
            // ------------------------------------------------------------------------------


            mysqli_query($con,$sql);
            echo "<body>";
            echo"<center><h3>อัพโหลดเสร็จสิ้น<h3></center><br><br>";
            echo "<center><a href='index.php'>Redirect in <span id=\"redirect\">5</span> Second</a></center>";
        }else {
            echo "<br/><br/>";
            echo "<center>กรุณาอัพโหลดไฟล์ที่เป็น MP4 เท่านั้น</center>";
            echo "<br/><br/>";
            echo "<center><a href='index.php'>Redirect in <span id=\"redirect2\">5</span> Second</a></center>";
            // echo "<center><a href='index.php'>กลับหน้าอัพโหลด</a></center>";
        }
        ?>
    </div>

    <script type="text/javascript">
        var redirect = document.getElementById('redirect');
        setTimeout(() => {redirect.innerHTML = '4'}, 1000);
        setTimeout(() => {redirect.innerHTML = '3'}, 2000);
        setTimeout(() => {redirect.innerHTML = '2'}, 3000);
        setTimeout(() => {redirect.innerHTML = '1'}, 4000);
        setTimeout(() => {window.location = 'Homepage.php'}, 5000);

        var redirect2 = document.getElementById('redirect2');
        setTimeout(() => {redirect2.innerHTML = '4'}, 1000);
        setTimeout(() => {redirect2.innerHTML = '3'}, 2000);
        setTimeout(() => {redirect2.innerHTML = '2'}, 3000);
        setTimeout(() => {redirect2.innerHTML = '1'}, 4000);
        setTimeout(() => {window.location = 'index.php'}, 5000);
    </script>

</body>
</html>
