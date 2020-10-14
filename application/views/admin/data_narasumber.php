<?php $this->load->view('templates/header') ?>

<?php if ($this->session->flashdata('success')) { ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success') ?>" data-title="Data Narasumber"></div>
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
                        <a href="<?= base_url('admin/add_process_narasumber'); ?>" class="btn btn-primary"><i class="fa fa-user-plus fa-fw"></i>Tambah Data Narasumber</a>
                        <a href="<?= base_url('admin/excelnarasumber'); ?>" class="btn btn-success"><i class="fa fa-file-excel-o fa-fw"></i>Export to Excel</a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Narasumber</th>
                                        <th>NIP</th>
                                        <th>NPWP</th>
                                        <th>KTP</th>
                                        <th>Pangkat/Gol</th>
                                        <th>Pendidikan</th>
                                        <th>Tempat/Tgl Lahir</th>
                                        <th>Jabatan</th>
                                        <th>Instansi</th>
                                        <th>Agama</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($narasumber as $n) {
                                    ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $n['nama']; ?></td>
                                            <td><?= $n['nip']; ?></td>
                                            <td><?= $n['npwp']; ?></td>
                                            <td><?= $n['ktp']; ?></td>
                                            <td><?= $n['pangkatgol']; ?></td>
                                            <td><?= $n['pendidikan']; ?></td>
                                            <td><?= $n['ttl']; ?></td>
                                            <td><?= $n['jabatan']; ?></td>
                                            <td><?= $n['instansi']; ?></td>
                                            <td><?= $n['agama']; ?></td>
                                            <td><?= $n['alamat']; ?></td>
                                            <td><?= $n['telp']; ?></td>
                                            <td><a href="<?= base_url('admin/edit_narasumber/') . $n['nip']; ?>">
                                                    <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil fa-fw"></i></button>
                                                    <!-- <a href="<?= base_url('admin/delete_narasumber/') . $n['nip']; ?>">
                                                        <button type="button" class="btn btn-danger btn-xs" onclick="return confirm('Hapus Data Narasumber?')"><i class="fa fa-trash fa-fw"></i></button> -->
                                                    <a href="#modalDelete" data-toggle="modal" onclick="$('#modalDelete #formDelete').attr('action', '<?= base_url('admin/delete_narasumber/') . $n['nip']; ?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash fa-fw"></i></a>
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