<div class="row">
    <div class="col-12">
        <h3><?= $this->profile['fullname']; ?></h3>
        <h5><?= $this->profile['email']; ?> - <?= $this->profile['role']; ?></h5>
        <hr />
    </div>
    <div class="col-12">
        <div class="row">
            <div class="col-xs-12 col-sm-6 offset-sm-3 col-md-4 offset-md-4">
                <form id="changePassword" method="post" >
                    <input type="hidden" class="form-control" name="form" value="changePassword" form="changePassword" placeholder='latitude'>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" name="password" form="changePassword" placeholder='Password Old'>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" name="password1" form="changePassword" placeholder='Password New'>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" name="password2" form="changePassword" placeholder='Password Verify'>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-lg btn-primary btn-block" type="submit" form="changePassword">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>