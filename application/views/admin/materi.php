<?php $this->load->view('templates/header') ?>

<?php if ($this->session->flashdata('success')) { ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success') ?>" data-title="Data Materi"></div>
<?php } ?>

<?php $this->load->view('templates/navigation') ?>

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
                        <a href="<?= base_url('admin/tambah_materi'); ?>" class="btn btn-primary"><i class="fa fa-book fa-fw"></i>Tambah Materi</a>
                        <a href="<?= base_url('admin/excelmateri'); ?>" class="btn btn-success"><i class="fa fa-file-excel-o fa-fw"></i>Export to Excel</a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Materi</th>
                                        <th>Jam Pelajaran</th>
                                        <th>Narasumber / Pengajar</th>
                                        <th>Kegiatan Diklat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($materi as $m) {
                                    ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $m['nama_materi']; ?></td>
                                            <td><?= $m['jam_pelajaran']; ?></td>
                                            <td><?= $m['narasumber']; ?></td>
                                            <td><?= $m['nama_diklat']; ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/edit_materi/') .  $m['id']; ?>">
                                                    <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil fa-fw"></i></button>
                                                    <!-- <a href="<?= base_url('admin/delete_materi/') .  $m['id']; ?>">
                                                        <button type="button" class="btn btn-danger btn-xs" onclick="return confirm('Hapus Materi Diklat?')"><i class="fa fa-trash fa-fw"></i></button> -->
                                                    <a href="#modalDelete" data-toggle="modal" onclick="$('#modalDelete #formDelete').attr('action', '<?= base_url('admin/delete_materi/') .  $m['id']; ?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash fa-fw"></i></a>
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
<?php $this->load->view('templates/footer') ?>