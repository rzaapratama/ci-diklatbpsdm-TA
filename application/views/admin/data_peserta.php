<?php $this->load->view('templates/header') ?>

<?php if ($this->session->flashdata('success')) { ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success') ?>" data-title="Data Peserta"></div>
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
                        <a href="<?= base_url('admin/add'); ?>" class="btn btn-primary"><i class="fa fa-user-plus fa-fw"></i>Tambah Data Peserta</a>
                        <a href="<?= base_url('admin/excel'); ?>" class="btn btn-success"><i class="fa fa-file-excel-o fa-fw"></i>Export to Excel</a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kegiatan Diklat</th>
                                        <th>Nama Peserta</th>
                                        <th>NIP</th>
                                        <th>Pangkat/Gol</th>
                                        <th>Jabatan</th>
                                        <th>Instansi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($peserta as $p) {
                                    ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $p['diklat']; ?></td>
                                            <td><?= $p['nama']; ?></td>
                                            <td><?= $p['nip']; ?></td>
                                            <td><?= $p['pangkatgol']; ?></td>
                                            <td><?= $p['jabatan']; ?></td>
                                            <td><?= $p['instansi']; ?></td>
                                            <td><a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#peserta" id="set_dtl" data-diklat="<?= $p['diklat']; ?>" data-nama="<?= $p['nama']; ?>" data-nip="<?= $p['nip']; ?>" data-npwp="<?= $p['npwp']; ?>" data-ktp="<?= $p['ktp']; ?>" data-pangkatgol="<?= $p['pangkatgol']; ?>" data-ttl="<?= $p['ttl']; ?>" data-jabatan="<?= $p['jabatan']; ?>" data-instansi="<?= $p['instansi']; ?>" data-agama="<?= $p['agama']; ?>" data-jenis_kelamin="<?= $p['jenis_kelamin']; ?>" data-alamat="<?= $p['alamat']; ?>" data-telp="<?= $p['telp']; ?>">
                                                    <i class="fa fa-search-plus fa-fw"></i>
                                                    <a href="<?= base_url('admin/edit_peserta/') . $p['nip']; ?>">
                                                        <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil fa-fw"></i></button>
                                                        <!-- <a href="<?= base_url('admin/delete_peserta/') . $p['nip']; ?>">
                                                            <button type="button" class="btn btn-danger btn-xs" onclick="return confirm('Hapus Data Peserta?')"><i class="fa fa-trash fa-fw"></i></button> -->
                                                        <a href="#modalDelete" data-toggle="modal" onclick="$('#modalDelete #formDelete').attr('action', '<?= base_url('admin/delete_peserta/') . $p['nip']; ?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash fa-fw"></i></a>
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
<div class="modal fade" id="peserta" tabindex="-1" role="dialog" aria-labelledby="peserta" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="peserta">Detail Peserta Diklat</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Diklat</label>
                    <span id="diklat" class="form-control"></span>
                </div>
                <div class="form-group">
                    <label>Nama Peserta</label>
                    <span id="nama" class="form-control"></span>
                </div>
                <div class="form-group">
                    <label>NIP</label>
                    <span id="nip" class="form-control"></span>
                </div>
                <div class="form-group">
                    <label>NPWP</label>
                    <span id="npwp" class="form-control"></span>
                </div>
                <div class="form-group">
                    <label>Pangkat/Gol</label>
                    <span id="pangkatgol" class="form-control"></span>
                </div>
                <div class="form-group">
                    <label>Tempat / Tanggal Lahir</label>
                    <span id="ttl" class="form-control"></span>
                </div>
                <div class="form-group">
                    <label>Jabatan</label>
                    <span id="jabatan" class="form-control"></span>
                </div>
                <div class="form-group">
                    <label>Instansi</label>
                    <span id="instansi" class="form-control"></span>
                </div>
                <div class="form-group">
                    <label>KTP</label>
                    <span id="ktp" class="form-control"></span>
                </div>
                <div class="form-group">
                    <label>Agama</label>
                    <span id="agama" class="form-control"></span>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <span id="jenis_kelamin" class="form-control"></span>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <span id="alamat" class="form-control"></span>
                </div>
                <div class="form-group">
                    <label>Telepon</label>
                    <span id="telp" class="form-control"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
    $(document).ready(function() {
        $(document).on('click', '#set_dtl', function() {
            var diklat = $(this).data('diklat');
            var nama = $(this).data('nama');
            var nip = $(this).data('nip');
            var npwp = $(this).data('npwp');
            var ktp = $(this).data('ktp');
            var pangkatgol = $(this).data('pangkatgol');
            var ttl = $(this).data('ttl');
            var jabatan = $(this).data('jabatan');
            var instansi = $(this).data('instansi');
            var agama = $(this).data('agama');
            var jenis_kelamin = $(this).data('jenis_kelamin');
            var alamat = $(this).data('alamat');
            var telp = $(this).data('telp');
            $('#diklat').text(diklat);
            $('#nama').text(nama);
            $('#nip').text(nip);
            $('#npwp').text(npwp);
            $('#ktp').text(ktp);
            $('#pangkatgol').text(pangkatgol);
            $('#ttl').text(ttl);
            $('#jabatan').text(jabatan);
            $('#instansi').text(instansi);
            $('#agama').text(agama);
            $('#jenis_kelamin').text(jenis_kelamin);
            $('#alamat').text(alamat);
            $('#telp').text(telp);
        })
    })
</script>

<?php $this->load->view('templates/footer') ?>