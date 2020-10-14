<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?= $title; ?></h1>
            </div>
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tambah Jadwal Benchmarking
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <form action="<?= base_url('admin/add_jadwal_bm'); ?>" method="POST">
                            <div class="form-group">
                                <label>Hari Kegiatan</label>
                                <select name="hari" class="form-control">
                                    <option value="">-- Pilih --</option>
                                    <option>Minggu</option>
                                    <option>Senin</option>
                                    <option>Selasa</option>
                                    <option>Rabu</option>
                                    <option>Kamis</option>
                                    <option>Jumat</option>
                                    <option>Sabtu</option>
                                </select>
                                <?= form_error('hari'); ?>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Kegiatan</label>
                                <input class="form-control" type="date" id="tanggal" name="tanggal" placeholder="Tanggal">
                                <?= form_error('tanggal'); ?>
                            </div>
                            <div class="form-group">
                                <label>Waktu</label>
                                <input class="form-control" type="time" id="waktu" name="waktu" placeholder="Waktu">
                                <?= form_error('waktu'); ?>
                            </div>
                            <div class="form-group">
                                <label>Tempat</label>
                                <input class="form-control" type="text" id="tempat" name="tempat" placeholder="Tempat">
                                <?= form_error('tempat'); ?>
                            </div>
                            <div class="form-group">
                                <label>Nama Kegiatan</label>
                                <input class="form-control" type="text" id="nama_kegiatan" name="nama_kegiatan" placeholder="Nama Kegiatan">
                                <?= form_error('nama_kegiatan'); ?>
                            </div>
                            <div class="form-group">
                                <label>Penanggung Jawab</label>
                                <input class="form-control" type="text" id="penanggung_jawab" name="penanggung_jawab" placeholder="Penanggung Jawab"">
                                <?= form_error('penanggung_jawab'); ?>
                            </div>
                            <button type=" submit" class="btn btn-primary">Submit</button>
                                <a href="<?= base_url('jadwal_bm') ?>"><button type="button" class="btn btn-danger ">Back</button></a>
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