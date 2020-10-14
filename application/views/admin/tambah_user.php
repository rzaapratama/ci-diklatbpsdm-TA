<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Halaman Tambah User</h1>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tambah User Baru
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <form action="<?= base_url('admin/add_new_user'); ?>" method="POST">
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
                                    <label for="role_id">Role ID</label>
                                    <select name="role_id" class="form-control">
                                        <option value="">-- Pilih --</option>
                                        <?php
                                        $query = $this->db->query('SELECT * from user_role ');
                                        $role_id = $query->result();
                                        foreach ($role_id as $id) : ?>
                                            <option value="<?= $id->id ?>"><?= $id->role ?></option>
                                        <?php endforeach;
                                        ?>
                                    </select>
                                    <?= form_error('role_id', '<medium class="text-danger pl-0">', '</medium>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="is_active">Status</label>
                                    <select name="is_active" class="form-control">
                                        <option value="">-- Pilih --</option>
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                    <?= form_error('is_active', '<medium class="text-danger pl-0">', '</medium>'); ?>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password1" type="password" id="password1">
                                    <small id="passwordHelpInl  ine" class="text-muted">
                                        Must be 4-15 characters long.
                                    </small>
                                    <?= form_error('password1', '<medium class="text-danger pl-0">', '</medium>'); ?>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Confirm Password" name="password2" type="password" id="password2">
                                    <?= form_error('password2', '<medium class="text-danger pl-0">', '</medium>'); ?>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="<?= base_url('admin/daftar_user') ?>"><button type="button" class="btn btn-danger ">Back</button></a>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->