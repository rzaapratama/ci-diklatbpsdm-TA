<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Create New Account</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="POST" action="<?= base_url('auth/registration'); ?>">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Full Name" name="name" type="text" id="name" value="<?= set_value('name'); ?>" autofocus>
                                <?= form_error('name', '<medium class="text-danger pl-0">', '</medium>'); ?>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="text" id="email" value="<?= set_value('email'); ?>" autofocus>
                                <?= form_error('email', '<medium class="text-danger pl-0">', '</medium>'); ?>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password1" type="password" id="password1">
                                <?= form_error('password', '<medium class="text-danger pl-0">', '</medium>'); ?>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Confirm Password" name="password2" type="password" id="password2">
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit" class="btn btn-lg btn-success btn-block">Login</button><br>
                            <div class="form-group">
                                <li class="m-b-8">
                                    <span class="txt1">
                                        Forgot
                                    </span>

                                    <a href="#" class="txt2">
                                        Username / Password?
                                    </a>
                                </li>

                                <li>
                                    <span class="txt1">
                                        Already have an account?
                                    </span>

                                    <a href="<?= base_url('auth'); ?>" class="txt2">
                                        Sign in
                                    </a>
                                </li>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>