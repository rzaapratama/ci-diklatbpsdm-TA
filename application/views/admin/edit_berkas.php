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
                        Edit Berkas Peserta
                    </div>
                    <!-- /.panel-heading -->
                    <?php ?>
                    <div class="panel-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nama Peserta</label>
                                <input type="text" name="nama" class="form-control" value="<?= $berkas['nama'] ?>">
                                <?= form_error('nama'); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Fotokopi KK</label>
                                <select name="kk" class="form-control">
                                    <option value="<?= $berkas['kk'] ?>"><?= $berkas['kk'] ?></option>
                                    <option>Sudah</option>
                                    <option>Belum</option>
                                </select>
                                <?= form_error('kk'); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Fotokopi NPWP</label>
                                <select name="npwp" class="form-control">
                                    <option value="<?= $berkas['npwp'] ?>"><?= $berkas['npwp'] ?></option>
                                    <option>Sudah</option>
                                    <option>Belum</option>
                                </select>
                                <?= form_error('npwp'); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Fotokopi KTP</label>
                                <select name="ktp" class="form-control">
                                    <option value="<?= $berkas['ktp'] ?>"><?= $berkas['ktp'] ?></option>
                                    <option>Sudah</option>
                                    <option>Belum</option>
                                    <?= form_error('ktp'); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Fotokopi Rekening Bank</label>
                                <select name="rekening" class="form-control">
                                    <option value="<?= $berkas['rekening'] ?>"><?= $berkas['rekening'] ?></option>
                                    <option>Sudah</option>
                                    <option>Belum</option>
                                    <?= form_error('rekening'); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Foto 3x4</label>
                                <select name="foto" class="form-control">
                                    <option value="<?= $berkas['foto'] ?>"><?= $berkas['foto'] ?></option>
                                    <option>Sudah</option>
                                    <option>Belum</option>
                                    <?= form_error('foto'); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Surat Perintah</label>
                                <select name="surat_perintah" class="form-control">
                                    <option value="<?= $berkas['surat_perintah'] ?>"><?= $berkas['surat_perintah'] ?></option>
                                    <option>Sudah</option>
                                    <option>Belum</option>
                                    <?= form_error('surat_perintah'); ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="<?= base_url('berkas_peserta') ?>"><button type="button" class="btn btn-danger ">Back</button></a>
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