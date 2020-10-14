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
                        Tambah Jadwal Diklat
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>Hari Kegiatan</label>
                                <select name="hari" class="form-control">
                                    <option value="<?= $jadwaldiklat['hari'] ?>"><?= $jadwaldiklat['hari'] ?></option>
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
                                <input class="form-control" type="date" id="tanggal" name="tanggal" placeholder="Tanggal" value="<?= $jadwaldiklat['tanggal']; ?>">
                                <?= form_error('tanggal'); ?>
                            </div>
                            <div class="form-group">
                                <label>Waktu Kegiatan</label>
                                <input class="form-control" type="time" id="waktu" name="waktu" placeholder="Waktu" value="<?= $jadwaldiklat['waktu']; ?>">
                                <?= form_error('waktu'); ?>
                            </div>
                            <div class="form-group">
                                <label>Mata Pelajaran</label>
                                <input class="form-control" type="text" id="mata_pelajaran" name="mata_pelajaran" placeholder="Mata Pelajaran" value="<?= $jadwaldiklat['mata_pelajaran']; ?>">
                                <?= form_error('mata_pelajaran'); ?>
                            </div>
                            <div class="form-group">
                                <label>Jam Pelajaran</label>
                                <input class="form-control" type="text" id="jam_pelajaran" name="jam_pelajaran" placeholder="Jam Pelajaran" value="<?= $jadwaldiklat['jam_pelajaran']; ?>">
                                <?= form_error('jam_pelajaran'); ?>
                            </div>
                            <div class="form-group">
                                <label>Narasumber</label>
                                <select name="narasumber" class="form-control">
                                    <option value="<?= $jadwaldiklat['narasumber']; ?>"><?= $jadwaldiklat['narasumber']; ?></option>
                                    <?php $post = $this->db->query('SELECT * FROM narasumber');
                                    $narasumber = $post->result();
                                    foreach ($narasumber as $nara) :
                                    ?>
                                        <option><?= $nara->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('narasumber'); ?>
                            </div>

                            <button type=" submit" class="btn btn-primary">Save</button>
                            <a href="<?= base_url('jadwal_diklat') ?>"><button type="button" class="btn btn-danger ">Back</button></a>
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