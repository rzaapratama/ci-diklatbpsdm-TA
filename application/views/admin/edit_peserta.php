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
                        Edit Data Peserta
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>Diklat</label>
                                <select name="diklat" class="form-control">
                                    <option value="<?= $peserta['diklat'] ?>"><?= $peserta['diklat'] ?></option>
                                    <?php $select = $this->db->query('SELECT * FROM diklat')->result();
                                    foreach ($select as $diklat) :
                                    ?>
                                        <option><?= $diklat->nama_diklat ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('diklat'); ?>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input class="form-control" type="text" id="nama" name="nama" placeholder="Nama Peserta" value="<?= $peserta['nama']; ?>">
                                <?= form_error('nama'); ?>
                            </div>
                            <div class="form-group">
                                <label>NIP</label>
                                <input class="form-control" type="number" id="nip" name="nip" placeholder="NIP Peserta" value="<?= $peserta['nip']; ?>" readonly>
                                <?= form_error('nip'); ?>
                            </div>
                            <div class="form-group">
                                <label>NPWP</label>
                                <input class="form-control" type="number" id="npwp" name="npwp" placeholder="NPWP Peserta" value="<?= $peserta['npwp']; ?>">
                                <?= form_error('npwp'); ?>
                            </div>
                            <div class="form-group">
                                <label>Pangkat/Gol</label>
                                <input class="form-control" type="text" id="pangkat/gol" name="pangkat/gol" placeholder="Pangkat / Golongan" value="<?= $peserta['pangkatgol']; ?>">
                                <?= form_error('pangkat/gol'); ?>
                            </div>
                            <div class="form-group">
                                <label>Tempat / Tanggal Lahir</label>
                                <input class="form-control" id="ttl" name="ttl" placeholder="Tempat / Tanggal Lahir" value="<?= $peserta['ttl']; ?>">
                                <?= form_error('ttl'); ?>
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" value="<?= $peserta['jabatan']; ?>">
                                <?= form_error('jabatan'); ?>
                            </div>
                            <div class="form-group">
                                <label>Instansi</label>
                                <input class="form-control" id="instansi" name="instansi" placeholder="Instansi" value="<?= $peserta['instansi']; ?>">
                                <?= form_error('instansi'); ?>
                            </div>
                            <div class="form-group">
                                <label>KTP</label>
                                <input class="form-control" id="ktp" name="ktp" placeholder="KTP" value="<?= $peserta['ktp']; ?>">
                                <?= form_error('ktp'); ?>
                            </div>
                            <div class="form-group">
                                <label>Agama</label>
                                <select name="agama" class="form-control">
                                    <option value="<?= $peserta['agama'] ?>"><?= $peserta['agama'] ?></option>
                                    <option>Islam</option>
                                    <option>Kristen</option>
                                    <option>Hindu</option>
                                    <option>Buddha</option>
                                    <option>Konghucu</option>
                                </select>
                                <?= form_error('agama'); ?>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control">
                                    <option value="<?= $peserta['jenis_kelamin'] ?>"><?= $peserta['jenis_kelamin'] ?></option>
                                    <option>Laki-Laki</option>
                                    <option>Perempuan</option>
                                </select>
                                <?= form_error('jenis_kelamin'); ?>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= $peserta['alamat']; ?>">
                                <?= form_error('alamat'); ?>
                            </div>
                            <div class="form-group">
                                <label>Telepon</label>
                                <input class="form-control" id="telp" name="telp" placeholder="Telepon" value="<?= $peserta['telp']; ?>">
                                <?= form_error('telp'); ?>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="<?= base_url('data_peserta') ?>"><button type="button" class="btn btn-danger">Back</button></a>
                    </div>
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