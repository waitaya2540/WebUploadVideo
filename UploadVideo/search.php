<title>Search</title>
<?php session_start(); ?>
<?php include 'connectdb.php'; ?>
<?php require 'helper.php'; ?>
<?php include 'navbar.php'; ?>

<?php
    // $query = mysqli_query($con, $sql_search);

    $query = mysqli_query($con, "SELECT * FROM tbupload LEFT JOIN tb_login ON tb_login.login_ID = tbupload.UID WHERE `private` = 1");
    $result =  mysqli_fetch_assoc($query);

        $txt = mysql_escape_string($_GET['q']);

        if ($_SESSION['user_data']['login_Status'] == 1) {
            $que = mysqli_query($con, "SELECT * FROM tbupload, tb_login WHERE tb_login.login_ID = tbupload.UID AND NAME LIKE '%$txt%'");
        }else {
            $que = mysqli_query($con, "SELECT * FROM tbupload, tb_login WHERE tb_login.login_ID = tbupload.UID AND NAME LIKE '%$txt%' AND `private` = 1");
        }

        $res = mysqli_fetch_all($que, MYSQLI_ASSOC);
?>
        <div class="container">
            <div class="panel panel-warning">
                <div class="panel-heading"><i class="glyphicon glyphicon-search"></i> Search</div>
            </div>
        </div>
        <?php echo '<ol>'; ?>

        <?php foreach ($res as $key => $value): ?>
            <div class="container">
                <div class="media">
                    <div class="media-left media-middle">
                        <a href="view.php?id=<?php echo $value['ID']; ?>">
                            <img class="media-object" width="150px" src="Video/thumbnail/<?php echo $value['URL']; ?>.jpg" alt="<?php echo $value['NAME']; ?>">
                        </a>
                    </div>
                <div class="media-body">
                    <h4 class="media-heading"><?php printf("<li><a href='view.php?id=%s'>%s</a></li>", $value['ID'], $value['NAME']); ?></h4>
                    Upload By:<?php echo $value['login_Username']; ?><br/>
                    อัพโหลดเมื่อ: <?php echo diffdate($value['date']); ?>
                </div>
                </div>
            </div><br/>
        <?php endforeach; ?>

        <?php echo '</ol>'; ?>

<?php include 'footer.php'; ?>
