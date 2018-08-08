<?php
    include 'connectdb.php';
    $query = mysqli_query($con, "SELECT * FROM config WHERE name = 'TimeTrending'");
    $result = mysqli_fetch_assoc($query);
    $today = date('Y-m-d');
    // $today = '2017-04-29';
    if ($result['value'] !== $today) {
    // if (true) {
        $today = new DateTime($today);
        $today->setTime(-24,0,0);
        $today = $today->format('Y-m-d');
        $query = mysqli_query($con, "SELECT ID FROM tbupload WHERE Date(`date`) = '$today' AND `private` = 1 ORDER BY `view` DESC LIMIT 2");
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);

        $sqls = [];
        foreach ($result as $key => $value) {
            $id = $value['ID'];
            $sqls[] = "($id, '$today', $key)";
        }

        mysqli_query($con, "INSERT INTO `trending` (video_ID, tren_date, t_order) VALUES " . implode($sqls, ', '));
        mysqli_query($con, "UPDATE `config` SET `value` = DATE(CURRENT_TIMESTAMP) WHERE `name` = 'TimeTrending'");
    }

    switch ($m) {
        case 'month':
            $query = mysqli_query($con, "SELECT * FROM `trending`, `tbupload`
                WHERE YEAR(trending.tren_date) = YEAR(CURRENT_TIMESTAMP) AND
                MONTH(trending.tren_date) = MONTH(CURRENT_TIMESTAMP) AND trending.t_order = 0 AND
                trending.video_ID = tbupload.ID ORDER BY tbupload.view DESC LIMIT 6");
            break;
        case 'year':
            $query = mysqli_query($con, "SELECT * FROM `trending`, `tbupload`
                WHERE YEAR(trending.tren_date) = YEAR(CURRENT_TIMESTAMP) AND
                trending.video_ID = tbupload.ID ORDER BY trending.tren_date,trending.t_order DESC LIMIT 6");
            break;
        default:
            $query = mysqli_query($con, "SELECT * FROM `trending`, `tbupload`
                WHERE WEEK(trending.tren_date) = WEEK(CURRENT_TIMESTAMP) AND MONTH(trending.tren_date) = MONTH(CURRENT_TIMESTAMP) AND
                trending.video_ID = tbupload.ID ORDER BY trending.tren_date,trending.t_order DESC LIMIT 6");
            break;
    }

    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>

<?php foreach ($result as $key => $value): ?>
    <div class="media">
        <div class="media-left">
            <a href="view.php?id=<?php echo $value['ID']; ?>">
                <img class="media-object" width="150px" src="Video/thumbnail/<?php echo $value['URL']; ?>.jpg" alt="<?php echo $value['NAME']; ?>">
            </a>
        </div>
        <div class="media-body">
            <div class="media-heading">
                <a href="view.php?id=<?php echo $value['ID']; ?>">
                    <?php echo $value['NAME']; ?>
                </a>
            </div>
            <div><?php echo date('D d M Y', strtotime($value['date'])); ?></div>
            <div class="label label-default">View: <?php echo $value['view']; ?></div>
        </div>
    </div>
<?php endforeach; ?>
