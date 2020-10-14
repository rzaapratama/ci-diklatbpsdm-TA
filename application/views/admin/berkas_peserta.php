<?php if ($this->session->flashdata('success')) { ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success') ?>" data-title="Berkas Peserta"></div>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#berkas"><i class="fa fa-user-plus fa-fw"></i>
                            Tambah Berkas Peserta
                        </button>
                        <a href="<?= base_url('admin/excelberkas'); ?>" class="btn btn-success"><i class="fa fa-file-excel-o fa-fw"></i>Export to Excel</a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Peserta</th>
                                        <th>Fotokopi KK</th>
                                        <th>Fotokopi NPWP</th>
                                        <th>Fotokopi KTP</th>
                                        <th>Fotokopi Rekening Bank</th>
                                        <th>Foto 3x4</th>
                                        <th>Surat Perintah</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $post = $this->db->query('select * from berkas');
                                    $berkas = $post->result();
                                    $i = 1;
                                    foreach ($berkas as $ber) {
                                    ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $ber->nama ?></td>
                                            <td>
                                                <?php if ($ber->kk == "Sudah") { ?>
                                                    <button class="btn btn-success disabled btn-sm">Sudah Lengkap</button>
                                                <?php } else { ?>
                                                    <button class="btn btn-danger disabled btn-sm">Belum Lengkap</button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($ber->npwp == "Sudah") { ?>
                                                    <button class="btn btn-success disabled btn-sm">Sudah Lengkap</button>
                                                <?php } else { ?>
                                                    <button class="btn btn-danger disabled btn-sm">Belum Lengkap</button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($ber->ktp == "Sudah") { ?>
                                                    <button class="btn btn-success disabled btn-sm">Sudah Lengkap</button>
                                                <?php } else { ?>
                                                    <button class="btn btn-danger disabled btn-sm">Belum Lengkap</button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($ber->rekening == "Sudah") { ?>
                                                    <button class="btn btn-success disabled btn-sm">Sudah Lengkap</button>
                                                <?php } else { ?>
                                                    <button class="btn btn-danger disabled btn-sm">Belum Lengkap</button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($ber->foto == "Sudah") { ?>
                                                    <button class="btn btn-success disabled btn-sm">Sudah Lengkap</button>
                                                <?php } else { ?>
                                                    <button class="btn btn-danger disabled btn-sm">Belum Lengkap</button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($ber->surat_perintah == "Sudah") { ?>
                                                    <button class="btn btn-success disabled btn-sm">Sudah Lengkap</button>
                                                <?php } else { ?>
                                                    <button class="btn btn-danger disabled btn-sm">Belum Lengkap</button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('admin/edit_berkas/' . $ber->id_berkas); ?>">
                                                    <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil fa-fw"></i></button>
                                                    <!-- <a href="<?= base_url('admin/delete_berkas/' . $ber->id_berkas); ?>">
                                                        <button type="button" class="btn btn-danger btn-xs" onclick="return confirm('Hapus Berkas Peserta?')"><i class="fa fa-trash fa-fw"></i></button> -->
                                                    <a href="#modalDelete" data-toggle="modal" onclick="$('#modalDelete #formDelete').attr('action', '<?= base_url('admin/delete_berkas/' . $ber->id_berkas); ?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash fa-fw"></i></a>
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

<!-- Modal -->
<div class="modal fade" id="berkas" tabindex="-1" role="dialog" aria-labelledby="berkas" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="berkas">Berkas Peserta Diklat</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('admin/add_berkas'); ?>" method="POST">
                    <div class="form-group">
                        <label>Nama Peserta</label>
                        <select name="nama" class="form-control">
                            <option value="">-- Pilih --</option>
                            <?php $post = $this->db->query('SELECT * FROM peserta');
                            $peserta = $post->result();
                            foreach ($peserta as $p) :
                            ?>
                                <option><?= $p->nama; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('nama'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Fotokopi KK</label>
                        <select name="kk" class="form-control">
                            <option value="">-- Pilih --</option>
                            <option>Sudah</option>
                            <option>Belum</option>
                        </select>
                        <?= form_error('kk'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Fotokopi NPWP</label>
                        <select name="npwp" class="form-control">
                            <option value="">-- Pilih --</option>
                            <option>Sudah</option>
                            <option>Belum</option>
                        </select>
                        <?= form_error('npwp'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Fotokopi KTP</label>
                        <select name="ktp" class="form-control">
                            <option value="">-- Pilih --</option>
                            <option>Sudah</option>
                            <option>Belum</option>
                        </select>
                        <?= form_error('ktp'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Fotokopi Rekening Bank</label>
                        <select name="rekening" class="form-control">
                            <option value="">-- Pilih --</option>
                            <option>Sudah</option>
                            <option>Belum</option>
                        </select>
                        <?= form_error('rekening'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Foto 3x4</label>
                        <select name="foto" class="form-control">
                            <option value="">-- Pilih --</option>
                            <option>Sudah</option>
                            <option>Belum</option>
                        </select>
                        <?= form_error('foto'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Surat Perintah</label>
                        <select name="surat_perintah" class="form-control">
                            <option value="">-- Pilih --</option>
                            <option>Sudah</option>
                            <option>Belum</option>
                        </select>
                        <?= form_error('surat_perintah'); ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>