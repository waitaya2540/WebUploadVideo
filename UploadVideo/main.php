<?php

session_start();

if (empty($_SESSION['user_data'])) {
    header("Location: index.php");
}

$title = 'STATUS';

function role($sss) {
    switch ($sss) {
        case 1:
            return 'ADMIN';
        default:
            return 'MEMBER';
    }
}
?>

<?php include 'navbar.php'; ?>
    <div class="container">
        <hr/>
            <p>ยินดีต้อนรับคุณ : <?php echo $_SESSION['user_data']['login_Username']; ?></p>
            <p>Email : <?php echo $_SESSION['user_data']['login_Email']; ?></p>
            <p>รหัสสมาชิก : <?php echo $_SESSION['user_data']['login_ID']; ?></p>
            <p>Role : <?php echo role($_SESSION['user_data']['login_Status']); ?></p>
        <hr/>
        <div class="btn-group">
            <a href="/workV2/index.php" class="btn btn-primary">เข้าสู่หน้าอัพโหลด</a>
            <a href="/workV2/login1/logout.php" class="btn btn-primary">ออกจากระบบ</a>
        </div>
    </div>
<?php include 'footer.php'; ?>
