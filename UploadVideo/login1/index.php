<?php include '../navbar.php'; ?>

    <div class="walldisplay">
      <h1 align="center">Relist Login</h1>
      <div class="walldisplay2">
      <form class="" action="login.php" method="post">
        <label for="Username">Username :<br></label>
        <input type="text" name="Username" required autofocus>
        <br>
        <label for="Password">Password :<br></label>
        <input type="Password" name="Password" required>
        <br><br>
        <input type="submit" class="btn btn-primary" name="" value="Log In">
      </form>
      <br>
      </div>
      <a href="frm_register.php">สมัครสมาชิก</a>
    </div>

<?php include '../footer.php'; ?>
