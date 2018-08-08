<?php session_start(); ?>
<?php require 'helper.php'; ?>
<?php
if (empty($_GET['id'])) {
	die("error1");
}

$id = $_GET['id'];

if ( ! preg_match("/[0-9]+/", $id)) {
	die("error2");
}

include 'connectdb.php';
$query = mysqli_query($con, "SELECT * FROM `tbupload` LEFT JOIN `tb_login` ON tb_login.login_ID = tbupload.UID WHERE tbupload.ID = $id");
$result = mysqli_fetch_assoc($query);

if (count($result) < 1) {
	die("error3");
}

$query = mysqli_query($con, "UPDATE tbupload SET view = view + 1 WHERE id = $id");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="shortcut icon" href="/favicon.ico">
	<title><?php echo $result['NAME']; ?></title>
	<link href="build/static/css/main.f034e09a.css" rel="stylesheet">
	<link href="asset/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<?php include 'navbar.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<div class="embed-responsive embed-responsive-16by9">
					<div class="embed-responsive-item" id="root"></div>
				</div>
				<div>
					<br/>
					<h4><?php echo $result['NAME']; ?></h4>
					<div class="btn-group">
						<?php if ( ! empty($_SESSION['user_data'])): ?>
							<?php if ($_SESSION['user_data']['login_Status'] == 1): ?>
								<a class="btn btn-danger" href="delete.php?id=<?php echo $id; ?>" onclick="return confirm('คุณต้องการลบไฟล์วิดีโอนี้ใช้หรือไม่');">Delete</a>
							<?php endif; ?>
						<?php endif; ?>
						<span class="btn btn-default">
							<?php echo "View " . $result['view']; ?>
						</span>
					</div>
					<hr/>
					<div>Upload By: <?php echo $result['login_Username']; ?></div>

					<!-- viewlog -->
					<?php
						if (! empty($_SESSION['user_data'])) {
							$iduser = $_SESSION['user_data']['login_ID'];
							$query2 = mysqli_query($con, "SELECT COUNT(*) FROM viewlog WHERE tbupload_id = $id AND user_ID = $iduser");
							// $query2 = mysqli_query($con, "SELECT * FROM trending");
							$result2 = mysqli_fetch_row($query2);
							// var_dump($result2);
							// exit(0);
							// $idDB = $result2['tbupload_id'];
							if ($result2[0] < 1)
								mysqli_query($con, "INSERT INTO viewlog(tbupload_id, date_viewlog, user_ID) VALUES($id, now(), $iduser)");
							else mysqli_query($con, "UPDATE viewlog SET `date_viewlog` = now() WHERE tbupload_id = $id AND user_ID = $iduser");
						}
					?>

				</div>
				<script type="text/javascript">
					var video_link="Video/<?php echo $result['URL']; ?>", poster_link="build/fote.jpg";
				</script>
			</div>
			<div class="col-sm-4">
				<?php include 'random.php'; ?>
				<br/><br/>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="build/static/js/main.a4e5dfaa.js"></script>
</body>
</html>
