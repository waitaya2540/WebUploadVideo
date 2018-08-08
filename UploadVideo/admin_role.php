<?php
$title = "ADMIN-ROLE";
session_start();

if (empty($_SESSION['user_data'])) {
    die('คุณยังไม่ได้: Login');
    exit(0);
}

if ($_SESSION['user_data']['login_Status'] != 1) {
    die('คุณไม่ใช่: ADMIN');
    exit(0);
}

include 'connectdb.php';
include 'navbar.php';

$query = mysqli_query($con, "SELECT * FROM tb_login");

 ?>

    <body>
        <div class="container">
            <div class="panel panel-success">
                <div class="panel-heading">
                    AdminRole
                </div>
            </div>
                <div class="label label-danger">
                    Web Master: Admin
            </div><hr/>
        <?php while ($result = mysqli_fetch_assoc($query)): ?>
            <?php if ($result['login_ID'] != 1): ?>
                <?php echo 'Username: ' . $result['login_Username'] . '<br/>'; ?>
                <?php echo 'Email: ' . $result['login_Email']; ?>
                <?php if ($result['login_Status'] == '1'): ?>
                    <a href="role.php?id=<?php echo $result['login_ID']; ?>" class="label label-danger">Admin</a><br/><hr/>
                <?php else: ?>
                    <a href="role.php?id=<?php echo $result['login_ID']; ?>" class="label label-success">Member</a><br/><hr/>
                <?php endif; ?>
            <?php endif; ?>
        <?php endwhile; ?>

    </div>
    </body>
</html>
