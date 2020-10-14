<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title; ?></title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url(); ?>assets/web/assets/img/bali-icon.png" rel="icon">
    <link href="<?= base_url(); ?>assets/web/assets/img/bali-touch-icon.png" rel="bali-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Lato:400,300,700,900" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url(); ?>assets/web/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/web/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/web/assets/vendor/venobox/venobox.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url(); ?>assets/web/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Amoeba - v2.1.0
  * Template URL: https://bootstrapmade.com/free-one-page-bootstrap-template-amoeba/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container">

            <div class="logo float-left">
                <h1 class="text-light"><a href="https://bpsdm.baliprov.go.id/"><span>Bidang PKT BPSDM Provinsi Bali</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav class="nav-menu float-right d-none d-lg-block">
                <ul>
                    <li class="active"><a href="<?= base_url('peserta'); ?>">Home</a></li>
                    <li class="drop-down"><a href="">More Setting</a>
                        <ul>
                            <li><a href="https://bpsdm.baliprov.go.id/category/berita/">News</a></li>
                            <li><a href data-toggle="modal" data-target="#exampleModal"="<?= base_url('auth/logout'); ?>"> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End #header -->

    <main id="main">

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="section-title">
                    <h2>Registrasi Peserta Diklat Teknis BPSDM Provinsi Bali Tahun <?= date('Y'); ?></h2>
                </div>

                <div class="row">
                    <form action="<?= base_url('peserta/tambah_registrasidiklat'); ?>" method="POST" class="table-responsive">
                        <div class="form-group">
                            <label>Pilih Diklat</label>
                            <select name="diklat" class="form-control">
                                <option value="">-- Pilih --</option>
                                <?php $select = $this->db->query('SELECT * FROM diklat')->result();
                                foreach ($select as $diklat) :
                                    $tanggal = strtotime($diklat->akhir_periode);
                                    $sekarang    = time(); // Waktu sekarang
                                    $diff   = $tanggal - $sekarang;
                                    if ($diff > 0) {
                                ?>
                                        <option><?= $diklat->nama_diklat;
                                            } ?></option>
                                    <?php endforeach; ?>
                            </select>
                            <?= form_error('diklat'); ?>
                        </div>
                        <!-- <div class="form-group">
                            <label>Nama Lengkap</label> -->
                        <input class="form-control" type="text" hidden value="<?= $user['name'] ?>" id="nama" name="nama">
                        <!-- <?= form_error('nama'); ?>
                        </div> -->
                        <div class="form-group">
                            <label>NIP</label>
                            <input class="form-control" type="number" id="nip" name="nip">
                            <?= form_error('nip'); ?>
                        </div>
                        <div class="form-group">
                            <label>NPWP</label>
                            <input class="form-control" type="number" id="npwp" name="npwp">
                            <?= form_error('npwp'); ?>
                        </div>
                        <div class="form-group">
                            <label>Pangkat / Golongan</label>
                            <input class="form-control" type="text" id="pangkat/gol" name="pangkat/gol">
                            <?= form_error('pangkat/gol'); ?>
                        </div>
                        <div class="form-group">
                            <label>Tempat / Tanggal Lahir</label>
                            <input class="form-control" id="ttl" name="ttl">
                            <?= form_error('ttl'); ?>
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <input class="form-control" id="jabatan" name="jabatan">
                            <?= form_error('jabatan'); ?>
                        </div>
                        <div class="form-group">
                            <label>Instansi</label>
                            <input class="form-control" id="instansi" name="instansi">
                            <?= form_error('instansi'); ?>
                        </div>
                        <div class="form-group">
                            <label>KTP</label>
                            <input class="form-control" id="ktp" name="ktp">
                            <?= form_error('ktp'); ?>
                        </div>
                        <div class="form-group">
                            <label>Agama</label>
                            <select name="agama" class="form-control">
                                <option value="">-- Pilih --</option>
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
                                <option value="">-- Pilih --</option>
                                <option>Laki-Laki</option>
                                <option>Perempuan</option>
                            </select>
                            <?= form_error('jenis_kelamin'); ?>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input class="form-control" id="alamat" name="alamat">
                            <?= form_error('alamat'); ?>
                        </div>
                        <div class="form-group">
                            <label>Telepon</label>
                            <input class="form-control" id="telp" name="telp">
                            <?= form_error('telp'); ?>
                        </div>
                        <small id="passwordHelpInline" class="font-italic">
                            *Harap isi data diri dengan benar.
                        </small>
                        <br>
                        <div class="section-title">
                            <button type="submit" class="btn btn-primary">Registrasi</button>
                            <a href="<?= base_url('peserta') ?>"><button type="button" class="btn btn-danger">Kembali </button> </a>
                        </div>
                    </form>
                </div>
        </section> <!-- End About Us Section -->

        <!-- ======= Map Section ======= -->
        <section class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.253278756708!2d115.23995101535266!3d-8.667445893772193!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd240674b7f81b7%3A0x5fb1b03706275dd2!2sJl.+Hayam+Wuruk+No.152%2C+Sumerta+Kelod%2C+Kec.+Denpasar+Tim.%2C+Kota+Denpasar%2C+Bali+80239!5e0!3m2!1sid!2sid!4v1560235726209!5m2!1sid!2sid" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </section><!-- End Map Section -->


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span><?= date('Y'); ?></span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-one-page-bootstrap-template-amoeba/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End #footer -->

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url(); ?>assets/web/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/web/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>assets/web/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="<?= base_url(); ?>assets/web/assets/vendor/php-email-form/validate.js"></script>
    <script src="<?= base_url(); ?>assets/web/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url(); ?>assets/web/assets/vendor/venobox/venobox.min.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url(); ?>assets/web/assets/js/main.js"></script>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Notification</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure want to Logout?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal -->

</body>

</html>