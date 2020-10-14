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
                        Tambah Data Diklat
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <form action="<?= base_url('admin/add_diklat'); ?>" method="POST">
                            <div class="form-group">
                                <label>Nama Diklat</label>
                                <input class="form-control" type="text" id="nama_diklat" name="nama_diklat" placeholder="Nama Diklat">
                                <?= form_error('nama_diklat'); ?>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Awal Periode Kegiatan Diklat</label>
                                        <input class="form-control" type="date" id="awal_periode" name="awal_periode" placeholder="Mulai Periode Kegiatan Diklat">
                                        <?= form_error('awal_periode'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Akhir Periode Kegiatan Diklat</label>
                                        <input class="form-control" type="date" id="akhir_periode" name="akhir_periode" placeholder="Akhir Periode Kegiatan Diklat">
                                        <?= form_error('akhir_periode'); ?>
                                    </div>
                                </div>
                            </div>
                            <button type=" submit" class="btn btn-primary">Submit</button>
                            <a href="<?= base_url('data_diklat') ?>"><button type="button" class="btn btn-danger ">Back</button></a>
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