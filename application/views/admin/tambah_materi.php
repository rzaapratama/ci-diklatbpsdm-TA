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
                        Tambah Materi
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <form action="<?= base_url('admin/add_materi'); ?>" enctype="multipart/form-data" method="POST">
                            <div class="form-group">
                                <label>Nama Materi</label>
                                <input class="form-control" type="text" id="nama_materi" name="nama_materi" placeholder="Nama Materi">
                                <?= form_error('nama_materi'); ?>
                            </div>
                            <div class="form-group">
                                <label>Jam Pelajaran</label>
                                <input class="form-control" type="text" id="jam_pelajaran" name="jam_pelajaran" placeholder="Jam Pelajaran">
                                <?= form_error('jam_pelajaran'); ?>
                            </div>
                            <div class="form-group">
                                <label>Narasumber / Pengajar</label>
                                <select name="narasumber" class="form-control">
                                    <option value="">-- Pilih --</option>
                                    <?php $post = $this->db->query('SELECT * FROM narasumber');
                                    $narasumber = $post->result();
                                    foreach ($narasumber as $nara) :
                                    ?>
                                        <option><?= $nara->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('narasumber'); ?>
                            </div>
                            <div class="form-group">
                                <label>Kegiatan Diklat</label>
                                <select name="nama_diklat" class="form-control">
                                    <option value="">-- Pilih --</option>
                                    <?php $post = $this->db->query('SELECT * FROM diklat');
                                    $diklat = $post->result();
                                    foreach ($diklat as $d) :
                                    ?>
                                        <option><?= $d->nama_diklat; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('nama_diklat'); ?>
                            </div>
                            <div class="form-group">
                                <label>Upload Materi</label>
                                <input type="file" name="materi" class="form-control" required>
                            </div>

                            <button type=" submit" class="btn btn-primary">Submit</button>
                            <a href="<?= base_url('materi') ?>"><button type="button" class="btn btn-danger ">Back</button></a>
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