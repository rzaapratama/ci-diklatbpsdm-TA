<?php $this->load->view('templates/header') ?>

<?php if ($this->session->flashdata('success')) { ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success') ?>" data-title="Data Diklat"></div>
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
                        <a href="<?= base_url('admin/tambah_diklat'); ?>" class="btn btn-primary"><i class="fa fa-tasks fa-fw"></i>Tambah Data Diklat</a>
                        <a href="<?= base_url('admin/exceldiklat'); ?>" class="btn btn-success"><i class="fa fa-file-excel-o fa-fw"></i>Export to Excel</a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Diklat</th>
                                        <th>Awal Periode Diklat</th>
                                        <th>Akhir Periode Diklat</th>
                                        <th>Lama Periode Diklat</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($diklat as $d) :
                                    ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $d['nama_diklat']; ?></td>
                                            <td><?= $d['awal_periode']; ?></td>
                                            <td><?= $d['akhir_periode']; ?></td>
                                            <td><?= $d['lama_periode']; ?></td>
                                            <td>
                                                <?php
                                                $tanggal = strtotime($d['akhir_periode']);
                                                $sekarang    = time(); // Waktu sekarang
                                                $diff   = $tanggal - $sekarang;
                                                if ($diff > 0) {
                                                    echo '<button class="btn btn-warning disabled btn-xs">SEDANG BERJALAN</button>';
                                                } else {
                                                    echo '<button class="btn btn-success disabled btn-xs">SELESAI</button>';
                                                }
                                                ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/edit_diklat/') . $d['id_diklat']; ?>">
                                                    <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil fa-fw"></i></button>
                                                    <!-- <a href="<?= base_url('admin/delete_diklat/') . $d['id_diklat']; ?>">
                                                        <button type="button" class="btn btn-danger btn-xs" onclick="return confirm('Hapus Data Diklat?')"><i class="fa fa-trash fa-fw"></i></button> -->
                                                    <a href="#modalDelete" data-toggle="modal" onclick="$('#modalDelete #formDelete').attr('action', '<?= base_url('admin/delete_diklat/') . $d['id_diklat']; ?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash fa-fw"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
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