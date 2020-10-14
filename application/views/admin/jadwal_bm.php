<?php $this->load->view('templates/header') ?>

<?php if ($this->session->flashdata('success')) { ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success') ?>" data-title="Jadwal Benchmarking"></div>
<?php } ?>

<?php $this->load->view('templates/navigation') ?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?= $title; ?></h1>
                <?= $this->session->flashdata('message'); ?>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="<?= base_url('admin/tambah_jadwal_bm'); ?>" class="btn btn-primary"><i class="fa fa-calendar-plus-o fa-fw"></i>Tambah Jadwal Benchmarking</a>
                        <a href="<?= base_url('admin/exceljadwalbm'); ?>" class="btn btn-success"><i class="fa fa-file-excel-o fa-fw"></i>Export to Excel</a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Hari Kegiatan</th>
                                        <th>Tanggal Kegiatan</th>
                                        <th>Waktu</th>
                                        <th>Tempat</th>
                                        <th>Nama Kegiatan</th>
                                        <th>Penanggung Jawab</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($jadwalbm as $bm) {
                                    ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $bm['hari']; ?></td>
                                            <td><?= $bm['tanggal']; ?></td>
                                            <td><?= $bm['waktu']; ?></td>
                                            <td><?= $bm['tempat']; ?></td>
                                            <td><?= $bm['nama_kegiatan']; ?></td>
                                            <td><?= $bm['penanggung_jawab']; ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/edit_jadwal_bm/') . $bm['id']; ?>">
                                                    <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil fa-fw"></i></button>
                                                    <!-- <a href="<?= base_url('admin/delete_jadwal_bm/') . $bm['id']; ?>">
                                                        <button type="button" class="btn btn-danger btn-xs" onclick="return confirm('Hapus Jadwal Benchmarking?')"><i class="fa fa-trash fa-fw"></i></button> -->
                                                    <a href="#modalDelete" data-toggle="modal" onclick="$('#modalDelete #formDelete').attr('action', '<?= base_url('admin/delete_jadwal_bm/') . $bm['id']; ?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash fa-fw"></i></a>
                                            </td>
                                        </tr>
                                </tbody>
                            <?php } ?>
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