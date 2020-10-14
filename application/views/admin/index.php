<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
                <?= $this->session->flashdata('message'); ?>
            </div>
        </div>
        <!-- /.col-lg-12 -->
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-user fa-4x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    <?php $query = $this->db->query('SELECT * FROM narasumber');
                                    $peserta = $query->result();
                                    $jmlpeserta = count($peserta);
                                    echo $jmlpeserta;  ?>
                                </div>
                                <div>Orang Narasumber</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-server fa-4x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    <?php $query = $this->db->query('SELECT * FROM diklat');
                                    $peserta = $query->result();
                                    $jmlpeserta = count($peserta);
                                    echo $jmlpeserta;  ?>
                                </div>
                                <div>Diklat Teknis</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-users fa-4x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    <?php $query = $this->db->query('SELECT * FROM user');
                                    $peserta = $query->result();
                                    $jmlpeserta = count($peserta);
                                    echo $jmlpeserta;  ?>
                                </div>
                                <div>User Terdaftar</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-files-o fa-4x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">
                                    <?php $query = $this->db->query('SELECT * FROM materi');
                                    $peserta = $query->result();
                                    $jmlpeserta = count($peserta);
                                    echo $jmlpeserta;  ?>
                                </div>
                                <div>Materi Terupload</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Chart of Peserta Diklat by Gender
                        <div class="pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    Pilihan Diklat
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu" id="selectDiklat">
                                    <li><a href="#" data='Diklat TOC'>Diklat TOC</a>
                                    </li>
                                    <li><a href="#" data='Diklat BAPPENDA'>Diklat BAPPENDA</a>
                                    </li>
                                    <li><a href="#" data='Diklat Perencanaan Dan Pembangunan Daerah'>Diklat Perencanaan Dan Pembangunan Daerah</a>
                                    </li>
                                    <li><a href="#" data='Diklat Sosio Kultural'>Diklat Sosio Kultural</a>
                                    </li>
                                    <li><a href="#" data='Diklat PJB'>Diklat PJB</a>
                                    </li>
                                    <li><a href="#" data='Diklat Satpol PP'>Diklat Satpol PP</a>
                                    </li>
                                    <li><a href="#" data='Diklat Revolusi Mental'>Diklat Revolusi Mental</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body" id="chart-container">
                        <div id="diklat-selected">
                            <span class="label label-primary badge-pill">Pilihan Diklat: </span>
                            <span class="label label-default badge-pill" id="txtDiklatSelected"></span>
                        </div>
                        <canvas id="myChart" width="400" height="400" style="display: block; margin: 0 auto;"></canvas>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Chart of Peserta Diklat by Pangkat / Golongan
                        <div class="pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    Pilihan Diklat
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu" id="selectDiklatPangkatGol">
                                    <li><a href="#" data='Diklat TOC'>Diklat TOC</a>
                                    </li>
                                    <li><a href="#" data='Diklat BAPPENDA'>Diklat BAPPENDA</a>
                                    </li>
                                    <li><a href="#" data='Diklat Perencanaan Dan Pembangunan Daerah'>Diklat Perencanaan Dan Pembangunan Daerah</a>
                                    </li>
                                    <li><a href="#" data='Diklat Sosio Kultural'>Diklat Sosio Kultural</a>
                                    </li>
                                    <li><a href="#" data='Diklat PJB'>Diklat PJB</a>
                                    </li>
                                    <li><a href="#" data='Diklat Satpol PP'>Diklat Satpol PP</a>
                                    </li>
                                    <li><a href="#" data='Diklat Revolusi Mental'>Diklat Revolusi Mental</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body" id="chart-container">
                        <div id="diklat-selected-pangkatgol">
                            <span class="label label-primary badge-pill">Pilihan Diklat: </span>
                            <span class="label label-default badge-pill" id="txtDiklatSelectedPangkatGol"></span>
                        </div>
                        <canvas id="diagramPangkatGol" width="400" height="400" style="display: block; margin: 0 auto;"></canvas>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>