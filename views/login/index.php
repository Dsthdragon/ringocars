<div class="row pt-5">
    <div class="col-xs-12 col-sm-6 offset-sm-3 col-md-4 offset-md-4">
        <div class="card">
            <div class="card-body p-3">
                <h3 class="p-3 text-center">LOGIN</h3>
                <form id="loginForm" method="post" >
                    <input type="hidden" class="form-control" name="form" value="loginForm" form="loginForm" placeholder='latitude'>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" name="username" form="loginForm" placeholder='Username'>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" name="password" form="loginForm" placeholder='Password'>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-lg btn-primary btn-block" type="submit" form="loginForm">Sign in</button>
                    </div>
                </form>
                <div class="">
                    <a href="<?= URL ?>registration">Don't have an account?</a>
                    <div class="text-right">
                        <a href="<?= URL ?>login">Lost Your Password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
