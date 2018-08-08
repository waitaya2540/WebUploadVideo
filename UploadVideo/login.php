<?php $title = 'LOGIN'; ?>
<?php include 'navbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
            <div class="well">
                <h1 class="page-header"><i class="glyphicon glyphicon-globe"></i> Relist Login</h1>
                <form class="" action="login1/login.php" method="post">
                    <label for="Username">Username :<br></label>
                    <input type="text" class="form-control" name="Username" required autofocus>
                    <br>
                    <label for="Password">Password :<br></label>
                    <input type="Password" class="form-control" name="Password" required>
                    <hr/>
                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary">Login</button>
                        <a href="register.php" class="btn btn-primary">Register</a>
                    </div>
                </form>
                <br/><br/>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
