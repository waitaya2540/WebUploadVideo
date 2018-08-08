<?php session_start(); ?>
<?php $title = "History"; ?>
<?php require 'connectdb.php'; ?>
<?php require 'helper.php'; ?>

<?php
$page = 1;

if ( ! empty($_GET['p'])) {
	$page = intval($_GET['p'], 10);
}

$iduser = $_SESSION['user_data']['login_ID'];
$totals = mysqli_fetch_row(mysqli_query($con, "SELECT COUNT(*) FROM viewlog WHERE user_ID = $iduser"));

$pagie = ceil($totals[0]/10);
$offset = ($page - 1) * 10;
$query = mysqli_query($con, "SELECT * FROM tbupload, viewlog, tb_login WHERE tbupload.ID = viewlog.tbupload_id AND tbupload.UID = tb_login.login_ID AND viewlog.user_ID = $iduser ORDER BY `date_viewlog` DESC LIMIT 10 OFFSET $offset");
?>

<!DOCTYPE html>
<html>
    <body>
        <?php include 'navbar.php'; ?>
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="glyphicon glyphicon-tags"></i> History</div>
            </div>

            <?php while ($result = mysqli_fetch_assoc($query)): ?>
                    <div class="media">
                        <div class="media-left">
                            <a href="view.php?id=<?php echo $result['tbupload_id']; ?>">
                                <img class="media-object" width="150px" src="Video/thumbnail/<?php echo $result['URL']; ?>.jpg" alt="<?php echo $result['NAME']; ?>">
                            </a>
                        </div>
                        <div class="media-body media-middle">
                            <h4 class="media-heading">
                                <a href="view.php?id=<?php echo $result['ID']; ?>"> <?php echo $result['NAME']; ?> </a>
                            </h4>
                            <div>Upload By: <?php echo $result['login_Username']; ?></div>
                            <div><?php echo 'เข้าชมเมื่อ: ' . diffdate($result['date_viewlog']); ?></div>
                        </div>
                    </div>
            <?php endwhile; ?>
            <nav aria-label="Page navigation">
                <ul class="pagination">
                <?php for($i = 1; $i <= $pagie; $i++): ?>
                    <li class="<?php echo $i === $page ? 'active' : ''; ?>"><a href="?p=<?php echo $i ?>"><?php echo $i; ?></a></li>
                <?php endfor; ?>
                </ul>
            </nav>
        </div>
    </body>
</html>
