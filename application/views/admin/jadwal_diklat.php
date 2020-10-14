<?php $this->load->view('templates/header') ?>

<?php if ($this->session->flashdata('success')) { ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success') ?>" data-title="Jadwal Diklat"></div>
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
                        <a href="<?= base_url('admin/tambah_jadwal'); ?>" class="btn btn-primary"><i class="fa fa-calendar-plus-o fa-fw"></i>Tambah Jadwal Kegiatan</a>
                        <a href="<?= base_url('admin/exceljadwal'); ?>" class="btn btn-success"><i class="fa fa-file-excel-o fa-fw"></i>Export to Excel</a>
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
                                        <th>Mata Pelajaran</th>
                                        <th>Jam Pelajaran</th>
                                        <th>Narasumber</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($jadwaldiklat as $j) {
                                    ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $j['hari']; ?></td>
                                            <td><?= $j['tanggal']; ?></td>
                                            <td><?= $j['waktu']; ?></td>
                                            <td><?= $j['mata_pelajaran']; ?></td>
                                            <td><?= $j['jam_pelajaran']; ?></td>
                                            <td><?= $j['narasumber']; ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/edit_jadwal/') . $j['id']; ?>">
                                                    <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil fa-fw"></i></button>
                                                    <!-- <a href="<?= base_url('admin/delete_jadwal/') . $j['id']; ?>">
                                                        <button type="button" class="btn btn-danger btn-xs" onclick="return confirm('Hapus Jadwal Diklat?')"><i class="fa fa-trash fa-fw"></i></button> -->
                                                    <a href="#modalDelete" data-toggle="modal" onclick="$('#modalDelete #formDelete').attr('action', '<?= base_url('admin/delete_jadwal/') . $j['id']; ?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash fa-fw"></i></a>
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