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

    <?php if ($this->session->flashdata('success')) { ?>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success') ?>" data-title="Registrasi Berhasil"></div>
    <?php } ?>

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
                    <li class="active"><a href="#header">Home</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#faq">Frequently Asked Questions</a></li>
                    <li><a href="#contact">Contact Us</a></>
                    <li class="drop-down"><a href="">More Setting</a>
                        <ul>
                            <?php $select = $this->db->query('SELECT * FROM peserta where nama="' . $user['name'] . '"')->result();
                            if (count($select) == 0) { ?>
                                <li>
                                    <a href="<?= base_url('peserta/registrasidiklat'); ?>">Registrasi Peserta Diklat</a>
                                </li>
                            <?php } ?>
                            <li><a href="https://bpsdm.baliprov.go.id/category/berita/">News</a></li>
                            <li><a href data-toggle="modal" data-target="#exampleModal"="<?= base_url('auth/logout'); ?>"> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End #header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container">
            <h1>Selamat Datang, <?= $user['name'] ?></h1>
            <h2>Website ini digunakan hanya untuk keperluan dalam kegiatan diklat teknis yang diselenggarakan oleh bidang Pengembangan Kompetensi Teknis BPSDM Provinsi Bali.</h2>
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
        </div>
    </section><!-- #hero -->

    <main id="main">

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="section-title">
                    <h2>About Us</h2>
                </div>

                <div class="row">
                    <div class="col-lg-6 order-1 order-lg-2">
                        <img src="<?= base_url(); ?>assets/web/assets/img/12-1.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1">
                        <h3>BPSDM Provinsi Bali</h3>
                        <p class="font-italic">
                            Tugas yang menjadi tanggung jawab BPSDM Provinsi bali
                            berdasarkan Peraturan Gubernur Bali Nomor 95 tahun 2016 adalah
                            melaksanakan fungsi penunjang urusan pemerintahan yang menjadi
                            kewenangan daerah provinsi di bidang pengembangan sumber daya
                            manusia, serta melaksanakan tugas dekonsentrasi sampai dengan
                            dibentuknya Sekretariat Gubernur sebagai Wakil Pemerintah Pusat
                            dan melakukan tugas pembantuan sesuai bidang tugasnya.
                            <br>
                            <br>Fungsi yang dijalankan BPSDM Provinsi Bali berdasarkan Peraturan Gubernur Bali Nomor 95 tahun 2016 ada lima, yaitu :
                        </p>
                        <ul>
                            <li><i class="icofont-check-circled"></i> A. Penyusunan kebijakan teknis lingkup bidang pengembangan
                                sumber daya manusia.</li>
                            <li><i class="icofont-check-circled"></i> B. Pelaksanaan tugas dukungan teknis bidang pengembangan
                                sumber daya manusia.</li>
                            <li><i class="icofont-check-circled"></i> C. Pemantauan, evaluasi dan pelaporan pelaksanaan tugas
                                dukungan teknis bidang pengembangan sumber daya manusia.</li>
                            <li><i class="icofont-check-circled"></i> D. Pembinaan teknis penyelenggaraan fungsi penunjang Urusan
                                Pemerintahan Daerah bidang pengembangan sumber daya
                                manusia.</li>
                            <li><i class="icofont-check-circled"></i> E. Penyelenggaraan fungsi lain yang diberikan Gubernur sesuai
                                dengan tugas dan fungsinya.</li>
                        </ul>
                    </div>
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Frequently Asked Questions Section ======= -->
        <section id="faq" class="faq section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>Frequently Asked Questions</h2>
                </div>

                <ul class="faq-list">

                    <li>
                        <a data-toggle="collapse" class="" href="#faq1">Apa saja kebijakan diklat di BPSDM Provinsi Bali? <i class="icofont-simple-up"></i></a>
                        <div id="faq1" class="collapse show" data-parent=".faq-list">
                            <p>1. Mendorong peningkatan kapasitas aparatur melalui diklat
                                kepemimpinan, diklat teknis dan diklat fungsional berbasis
                                kompetensi.
                                2. Menyediakan sarana dan prasarana di kelas yang memadai
                                sesuai standar yang dibutuhkan.
                                3. Mengembangkan sinergitas dan networking dengan lembaga pemerintah dan swasta.
                                4. Pengembangan diklat sebagai Center of Excellence
                            </p>
                        </div>
                    </li>

                    <li>
                        <a data-toggle="collapse" href="#faq2" class="collapsed">Apakah tujuan mengikuti kegiatan diklat? <i class="icofont-simple-up"></i></a>
                        <div id="faq2" class="collapse" data-parent=".faq-list">
                            <p>
                                Agar calon Aparatur Sipil Negara memiliki kualitas dalam menjalankan kehidupan sebagai seorang pegawai negeri sipil dan menjalankan kewajibannya dengan baik.
                            </p>
                        </div>
                    </li>

                    <li>
                        <a data-toggle="collapse" href="#faq3" class="collapsed">Apakah kegiatan diklat teknis ini dilaksanakan setiap tahun? <i class="icofont-simple-up"></i></a>
                        <div id="faq3" class="collapse" data-parent=".faq-list">
                            <p>
                                Benar, kegiatan diklat teknis di BPSDM Provinsi Bali selalu terlaksana setiap tahunnya dan ditangani oleh bidang PKT.
                            </p>
                        </div>
                    </li>

                    <li>
                        <a data-toggle="collapse" href="#faq4" class="collapsed">Apakah harapan kedepannya setelah calon ASN mengikut kegiatan diklat ini? <i class="icofont-simple-up"></i></a>
                        <div id="faq4" class="collapse" data-parent=".faq-list">
                            <p>
                                Para calon ASN diharapkan mampu memberikan contoh yang baik dan juga mampu bekerja dengan baik sesuai dengan bidang teknis yang sudah mereka kuasai.
                            </p>
                        </div>
                    </li>

                    <li>
                        <a data-toggle="collapse" href="#faq5" class="collapsed">Berapa banyak jumlah kegiatan diklat teknis yang biasanya dilaksanakan oleh bidang PKT? <i class="icofont-simple-up"></i></a>
                        <div id="faq5" class="collapse" data-parent=".faq-list">
                            <p>
                                Setiap tahunnya untuk jumlah kegiatan diklat teknis yang dilaksanakan tiap tahunnya itu beragam, akan tetapi biasanya setiap tahun bisa terlaksana sekitar 10 sampai dengan 12 jenis kegiatan diklat teknis yang dilaksanakan.
                            </p>
                        </div>
                    </li>

                    <li>
                        <a data-toggle="collapse" href="#faq6" class="collapsed">Apa tujuan yang dicapai dari kegiatan Benchmarking atau Patok Banding? <i class="icofont-simple-up"></i></a>
                        <div id="faq6" class="collapse" data-parent=".faq-list">
                            <p>
                                Benchmarking biasanya para peserta akan menuju ke daerah tertentu yang tujuannya yaitu untuk mencari perbandingan baik buruknya ataupun kekurangan dan kelebihan dari suatu pekerjaan yang kita miliki dengan mereka dari sisi pengelolaan maupun beberapa aspek lainnya yang menjadi hal pokok dalam melakukan pekerjaan sebagai kita dalam bekerja nantinya.
                            </p>
                        </div>
                    </li>

                </ul>

            </div>
        </section><!-- End Frequently Asked Questions Section -->

        <!-- ======= Call To Action Section ======= -->
        <?php $select = $this->db->query('SELECT * FROM peserta where nama="' . $user['name'] . '"')->result();
        if (count($select) > 0) { ?>
            <section class="call-to-action">
                <div class="container">

                    <div class="text-center">
                        <h3>Download Materi</h3>
                        <p> Materi pembelajaran kegiatan diklat dapat di unduh dengan cara menekan tombol download di bawah ini.</p>
                        <a class="cta-btn" onClick="document.location.href='peserta/table'" />Download</a>
                    </div>

                </div>
            </section>
        <?php } else {
        } ?>
        <!-- End Call To Action Section -->

        <!-- ======= Contact Us Section ======= -->
        <section id="contact" class="contact section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>Contact Us</h2>
                    <p>BPSDM Provinsi Bali mendorong peningkatan kapasitas aparatur melalui diklat kepemimpinan, diklat teknis dan diklat fungsional berbasis kompetensi. Tetap terhubung dengan kami agar mendapatkan informasi terbaru mengenai kegiatan diklat di BPSDM Provinsi Bali.</p>
                    <br>
                    <div class="social-links">
                        <a href="https://web.facebook.com/pages/category/Government-Organization/BPSDM-Provinsi-Bali-397284487274754/?_rdc=1&_rdr" class="facebook"><i class="icofont-facebook"></i></a>
                        <a href="mailto:bandiklatprovbali@gmail.com" class="mail"><i class="icofont-envelope"></i></a>
                        <a href="tel:0361224074" class="tel"><i class="icofont-phone"></i></a>
                    </div>
                </div>
            </div>
        </section><!-- End Contact Us Section -->

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

    <!-- Sweet Alert 2 -->
    <script src="<?= base_url(); ?>assets/web/assets/js/sweetalert/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

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
                    Are you sure want to logout?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal -->


    <script>
        // sweetalert 
        const flashData = $('.flash-data').data('flashdata');
        const title = $('.flash-data').data('title');

        if (flashData) {
            Swal.fire({
                title: '' + title,
                text: '' + flashData,
                icon: 'success',
                position: 'top'
            });
        }
    </script>

</body>

</html>