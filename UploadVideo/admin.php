<?php

session_start();

if (empty($_SESSION['user_data'])) {
    die('คุณยังไม่ได้: Login');
    exit(0);
}

if ($_SESSION['user_data']['login_Status'] != 1) {
    die('คุณไม่ใช่: ADMIN');
    exit(0);
}
require 'connectdb.php';
// $query = mysqli_query($con, 'SELECT * FROM tbupload ORDER BY `date` DESC');
$query= mysqli_query($con, "SELECT * FROM tbupload LEFT JOIN tb_login ON tb_login.login_ID = tbupload.UID ORDER BY `date` DESC");
$resul = mysqli_fetch_all($query, MYSQL_ASSOC);

?>

<?php $title = 'ADMIN'; ?>
<?php include 'navbar.php'; ?>
    <div class="container">
        <ol>
        <?php foreach ($resul as $key => $value): ?>
            <li>
                <div class="btn-group btn-sm">
                    <a href="delete.php?id=<?php echo $value['ID']; ?>" onclick="return confirm('คุณต้องการลบไฟล์วิดีโอนี้ใช้หรือไม่');" class="btn btn-danger">
                        <i class="glyphicon glyphicon-trash"></i>
                    </a>
                </div>
                <a href="view.php?id=<?php echo $value['ID']; ?>"><?php echo $value['NAME']; ?></a>
                <?php echo "Upload By:" . $value['login_Username'] . " || " . "Upload Time:"; ?>
                <?php echo date('D d M Y H:i:s', strtotime($value['date'])); ?>
            </li>
        <?php endforeach; ?>
        </ol>
    </div>
<?php include 'footer.php'; ?>
