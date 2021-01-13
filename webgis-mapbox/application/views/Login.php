<div class="col-sm-4"></div>
<div class="col-sm-4">
<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <?= $title ?>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
<?php echo form_open('user/login'); ?>
            <div class="form-group">
                <label>Username</label>
                <input class="form-control" name = "username" placeholder= "Username" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name = "password" placeholder= "Password" required>
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-sm btn-block" type="submit">Login</button>
            </div>

<?php echo form_close () ?>
</div>
</div>
</div>
<div class="col-sm-4"></div>