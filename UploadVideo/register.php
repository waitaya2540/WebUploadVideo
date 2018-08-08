<?php $title = 'REGISTER'; ?>
<?php include 'navbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
            <div class="well">
                <h1 class="page-header"><i class="glyphicon glyphicon-pencil"></i> Relist Register</h1>
                <form action="/workV2/login1/register.php" method="post">
                    <label for="username">Username:&nbsp;</label>
                    <input type="text" class="form-control" name="username" placeholder="enter your username" required autofocus>
                    <br>
                    <label for="password">Password:&nbsp;&nbsp;</label>
                    <input type= "password" class="form-control" name="password" placeholder="enter your password" required>
                    <br>
                    <label for="email"> e-mail:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input type="email" class="form-control" name="email" placeholder="example@hotmail.com" required="">
                    <br>
                    <div class="btn-group">
                        <input type="reset" class="btn btn-primary" name="" value="reset">
                        <input type="submit" class="btn btn-primary" name="" value="submit">
                    </div>
                </form>
                <br/><br/>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
