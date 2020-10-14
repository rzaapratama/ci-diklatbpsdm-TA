<?php if ($this->session->flashdata('success')) { ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success') ?>" data-title="Profile Admin"></div>
<?php } ?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?= $title; ?></h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Personal Info
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="card mb-3">
                                <div class="col-md-10">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-14">
                                                <form role="form">
                                                    <div class="form-group">
                                                        <label>Full Name</label>
                                                        <input class="form-control" type="text" id="name" name="name" value="<?= $user['name']; ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input class="form-control" type="text" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-lg">
                                                            <div class="float-right"><small> Account created : <?= date('d F Y', $user['date_created']); ?></small></div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Login Activity
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Login Time</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    $query = $this->db->query('SELECT * FROM log');
                                                    $log = $query->result();
                                                    foreach ($log as $waktu) :
                                                    ?>
                                                        <tr>
                                                            <td><?= $i++ ?></td>
                                                            <td><?= $waktu->nama ?></td>
                                                            <td><?= $waktu->waktu ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->