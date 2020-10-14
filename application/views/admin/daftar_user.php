<?php if ($this->session->flashdata('success')) { ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success') ?>" data-title="Data User"></div>
<?php } ?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?= $title; ?></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="<?= base_url('admin/tambah_user'); ?>" class="btn btn-primary"><i class="fa fa-users fa-fw"></i> Tambah Daftar User</a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role ID</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($pengguna as $pg) {
                                    ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $pg['name']; ?></td>
                                            <td><?= $pg['email']; ?></td>
                                            <td><?php if ($pg["role_id"] == "1") { ?>
                                                    <button class="btn btn-info disabled btn-xs">ADMIN</button>
                                                <?php } else { ?>
                                                    <button class="btn btn-warning disabled btn-xs">PESERTA</button>
                                                <?php } ?></td>
                                            <td><?php if ($pg["is_active"] == "1") { ?>
                                                    <button class="btn btn-success disabled btn-xs">Aktif</button>
                                                <?php } else { ?>
                                                    <button class="btn btn-danger disabled btn-xs">Tidak Aktif</button>
                                                <?php } ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/edit_user/') . $pg['id']; ?>">
                                                    <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil fa-fw"></i></button></a>
                                                <!-- <a href="<?= base_url('admin/delete_user/') . $pg['id']; ?>">
                                                    <button type="button" class="btn btn-danger btn-xs" onclick="return confirm('Hapus Data User?')"><i class="fa fa-trash fa-fw"></i></button></a> -->
                                                <a href="#modalDelete" data-toggle="modal" onclick="$('#modalDelete #formDelete').attr('action', '<?= base_url('admin/delete_user/') . $pg['id']; ?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash fa-fw"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->