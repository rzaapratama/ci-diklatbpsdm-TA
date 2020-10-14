<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <div class="text-center">
                            <img src="<?= base_url(); ?>assets/images/Bali.png" width="65" height="65">
                        </div>
                    </h3>
                </div>
                <div class="panel-body">
                    <p class="text-center text-muted"><strong><span>Bidang PKT BPSDM Provinsi Bali</span></strong></p>
                    <form role="form" method="POST" action="<?= base_url('auth'); ?>">
                        <fieldset>
                            <?= $this->session->flashdata('message'); ?>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="text" id="email" value="<?= set_value('email'); ?>" autofocus>
                                <?= form_error('email', '<medium class="text-danger pl-0">', '</medium>'); ?>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" id="password">
                                <?= form_error('password', '<medium class="text-danger pl-0">', '</medium>'); ?>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" class="form-checkbox" id="form-checkbox">Show Password
                                    </label>
                                </div>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                        </fieldset>
                    </form>
                </div>
            </div>
            <p class="text-center text-muted">&copy; Copyright <strong><span><?= date('Y'); ?></span></strong>. All Rights Reserved</p>
        </div>
    </div>
</div>