<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit User</h1>
            </div>
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Data User
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input class="form-control" type="text" id="name" name="name" placeholder="Full Name" value="<?= $pengguna['name']; ?>">
                                <?= form_error('name'); ?>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" id="email" name="email" placeholder="Email" value="<?= $pengguna['email']; ?>" readonly>
                                <?= form_error('email'); ?>
                            </div>
                            <div class="form-group">
                                <label>Role ID</label>
                                <select class="form-control" name="role_id">
                                    <?php $query = $this->db->query('SELECT * FROM user_role where id ="' . $pengguna['role_id'] . '"');
                                    $select = $query->result(); ?>
                                    <option value="<?= $pengguna['role_id']; ?>"><?= $select[0]->role ?></option>
                                    <?php
                                    $query = $this->db->query('SELECT * FROM user_role');
                                    $select = $query->result();
                                    foreach ($select as $data) :
                                    ?> <option value="<?= $data->id ?>"><?= $data->role ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('role_id'); ?>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="is_active">
                                    <?php if ($pengguna['is_active'] == "1") {
                                    ?>
                                        <option value="<?= $pengguna['is_active']; ?>">Aktif</option>
                                    <?php } else { ?>
                                        <option value="<?= $pengguna['is_active']; ?>">Tidak Aktif</option>
                                    <?php } ?>
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                                <?= form_error('is_active'); ?>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="<?= base_url('admin/daftar_user') ?>"><button type="button" class="btn btn-danger ">Back</button></a>
                    </div>
                    </form>
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