<?php session_start(); ?>
<?php require 'helper.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>RELIST VIDEO UPLOAD</title>
    <link href="/workV2/asset/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="glyphicon glyphicon-expand"></i> New Release</div>
                </div>
                <?php
                include './connectdb.php';
                $perp = 10;
                $pages = empty($_GET['p']) ? 1 : intval($_GET['p'], 10);
                $query= mysqli_query($con, "SELECT * FROM tbupload LEFT JOIN tb_login ON tb_login.login_ID = tbupload.UID WHERE `private` = 1 ORDER BY `date` DESC LIMIT $perp OFFSET " . ($pages - 1) * $perp);
                ?>
                <?php while($run= mysqli_fetch_assoc($query)): ?>
                    <div class="media">
                        <div class="media-left">
                            <a href="view.php?id=<?php echo $run['ID']; ?>">
                                <img class="media-object" src="Video/thumbnail/<?php echo $run['URL']; ?>.jpg" alt="<?php echo $run['NAME']; ?>">
                            </a>
                        </div>
                        <div class="media-body media-middle">
                            <h4 class="media-heading">
                                <a href="view.php?id=<?php echo $run['ID']; ?>"> <?php echo $run['NAME']; ?> </a>
                            </h4>
                            <div>Upload By: <?php echo $run['login_Username']; ?></div>
                            <div><?php echo 'อัพโหลดเมื่อ: ' . diffdate($run['date']); ?></div>
                            <div><span class="label label-default">View: <?php echo $run['view']; ?></span></div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php $query = mysqli_query($con, "SELECT COUNT(ID) FROM tbupload"); ?>
                <?php $resul = ceil(intval(mysqli_fetch_row($query)[0], 10) / $perp) + 1; ?>
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                    <?php for ($i = 1; $i < $resul; $i++): ?>
                        <?php $current = false; ?>
                        <?php if ($pages == $i): ?>
                            <?php $current = true; ?>
                        <?php endif; ?>
                        <li <?php if ($current) echo 'class="active"'; ?>><a href="?p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php endfor; ?>
                    </ul>
                </nav>
            </div>
            <div class="col-md-4">
                <div class="panel panel-success">
                    <div class="panel-heading"><i class="glyphicon glyphicon-star"></i> Popular</div>
                </div>
                <?php include 'popular.php'; ?>
                <hr/>
                <div class="panel panel-danger">
                    <div class="panel-heading"><i class="glyphicon glyphicon-hourglass"></i> Trending</div>
                </div>

                <?php $m = 'week'; ?>
                <?php if ( ! empty($_GET['m'])): ?>
                    <?php $m = $_GET['m']; ?>
                <?php endif; ?>

                <?php include 'trending.php'; ?>

                <nav aria-label="Page navigation">
                  <ul class="pagination">
                    <li class="<?php echo $m === 'week' ? 'active' : ''; ?>"><a href="?m=week">Week</a></li>
                    <li class="<?php echo $m === 'month' ? 'active' : ''; ?>"><a href="?m=month">Month</a></li>
                    <li class="<?php echo $m === 'year' ? 'active' : ''; ?>"><a href="?m=year">Year</a></li>
                  </ul>
                </nav>

                <hr/>
                <?php include 'global.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
