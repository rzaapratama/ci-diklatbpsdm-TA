<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?= $title; ?></h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Change Your Password
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row no-gutters">
                                    <div class="col-md-8">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <?= $this->session->flashdata('message'); ?>
                                                    <form action="<?= base_url('admin/edit_password_admin'); ?>" method="POST">
                                                        <div class="form-group">
                                                            <label>Current Password</label>
                                                            <input class="form-control" type="password" id="current_password" name="current_password">
                                                            <?= form_error('current_password', '<medium class="text-danger pl-0">', '</medium>'); ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>New Password</label>
                                                            <input class="form-control" type="password" id="new_password1" name="new_password1">
                                                            <?= form_error('new_password1', '<medium class="text-danger pl-0">', '</medium>'); ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Confirm New Password</label>
                                                            <input class="form-control" type="password" id="new_password2" name="new_password2">
                                                            <?= form_error('new_password2', '<medium class="text-danger pl-0">', '</medium>'); ?>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary" onclick="return confirm('Save Changes?')"><i class="fa fa-check fa-fw"></i>Save</button>
                                                        <button type="reset" class="btn btn-danger">Cancel</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->