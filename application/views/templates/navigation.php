<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="<?= base_url('admin'); ?>">Bidang PKT BPSDM Provinsi Bali</a>
    </div>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <ul class="nav navbar-nav navbar-left navbar-top-links">
        <li><a href="https://bpsdm.baliprov.go.id/"><i class="fa fa-home fa-fw"></i> Website</a></li>
    </ul>
    <ul class="nav navbar-right navbar-top-links">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <?= $user['name']; ?> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="<?= base_url('admin/profile_admin'); ?>"><i class="fa fa-user fa-fw"></i> My Profile</a>
                </li>
                <li><a href="<?= base_url('admin/daftar_user'); ?>"><i class="fa fa-users fa-fw"></i> Daftar User</a>
                </li>
                <li class="divider"></li>
                <li><a href data-toggle="modal" data-target="#myModal"="<?= base_url('auth/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="<?= base_url('admin'); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Data Master<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?= base_url('data_peserta'); ?>">Data Peserta Diklat</a>
                        </li>
                        <li>
                            <a href="<?= base_url('berkas_peserta'); ?>">Data Berkas Peserta</a>
                        </li>
                        <li>
                            <a href="<?= base_url('data_narasumber'); ?>">Data Narasumber</a>
                        </li>
                        <li>
                            <a href="<?= base_url('data_diklat'); ?>">Data Diklat</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-calendar fa-fw"></i> Agenda Kegiatan Diklat<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?= base_url('jadwal_diklat'); ?>"">Jadwal Diklat</a>
                        </li>
                        <li>
                            <a href=" <?= base_url('jadwal_bm'); ?>">Jadwal Benchmarking</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="<?= base_url('materi'); ?>"><i class="fa fa-book fa-fw"></i> Materi</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>