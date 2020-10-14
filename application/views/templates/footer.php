</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery-3.5.1.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?= base_url(); ?>assets/js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?= base_url(); ?>assets/js/startmin.js"></script>

<!-- DataTables JavaScript -->
<script src="<?= base_url(); ?>assets/js/dataTables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/js/dataTables/dataTables.bootstrap.min.js"></script>

<!-- Chart JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

<!-- Sweet Alert 2 -->
<script src="<?= base_url(); ?>assets/js/sweetalert/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Notification</h4>
            </div>
            <div class="modal-body">
                Are you sure want to logout?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal Delete -->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="modalDelete">Notification</h4>
            </div>
            <div class="modal-body">
                Delete this data?
            </div>
            <div class="modal-footer">
                <form id="formDelete" action="" method="POST">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    //SweetAlert 
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

    //dataTable
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });

    //Chart.js
    <?php if (isset($jenis_kelamin) || isset($jml)) : ?>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?= json_encode($jenis_kelamin) ?>,
                datasets: [{
                    label: 'Peserta Diklat Teknis',
                    data: <?= json_encode($jml) ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                cutoutPercentage: 40,
                responsive: false,
            }
        });

        document.querySelectorAll("#selectDiklat a").forEach(function(aElm) {
            aElm.addEventListener('click', function(event) {
                event.preventDefault();
                const diklatSelected = this.getAttribute('data');
                fetch(`http://localhost/ci-diklatbpsdm/admin/diklat/${diklatSelected.split(' ').join('-')}`)
                    .then(response => {
                        return response.json();
                    })
                    .then(responseJson => {
                        document.querySelector("#diklat-selected #txtDiklatSelected").innerHTML = diklatSelected;
                        myChart.data.labels = responseJson.jenis_kelamin;
                        myChart.data.datasets.forEach(dataset => {
                            dataset.data = responseJson.jml;
                        });
                        myChart.update();
                    });
            });
        });
    <?php endif; ?>

    //Chart.js
    <?php if (isset($pangkatgol) || isset($jml_pangkatgol)) : ?>
        var ctx2 = document.getElementById("diagramPangkatGol");
        var myChart2 = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: <?= json_encode($pangkatgol) ?>,
                datasets: [{
                    label: 'Peserta Diklat Teknis',
                    data: <?= json_encode($jml_pangkatgol) ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(0, 128, 0, 0.3)',
                        'rgba(255, 128, 0, 0.2)',
                        'rgba(255, 0, 255, 0.1)',
                        'rgba(128, 128, 128, 0.5)',
                        'rgba(255, 255, 0, 0.4)',
                        'rgba(0, 128, 128, 1)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(0, 128, 0, 0.3)',
                        'rgba(255, 128, 0, 0.2)',
                        'rgba(255, 0, 255, 0.1)',
                        'rgba(128, 128, 128, 0.5)',
                        'rgba(255, 255, 0, 0.4)',
                        'rgba(0, 128, 128, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                cutoutPercentage: 40,
                responsive: false,
            }
        });

        document.querySelectorAll("#selectDiklatPangkatGol a").forEach(function(aElm) {
            aElm.addEventListener('click', function(event) {
                event.preventDefault();
                const diklatSelected = this.getAttribute('data');
                fetch(`http://localhost/ci-diklatbpsdm/admin/diklatPangkatgol/${diklatSelected.split(' ').join('-')}`)
                    .then(response => {
                        return response.json();
                    })
                    .then(responseJson => {
                        document.querySelector("#diklat-selected-pangkatgol #txtDiklatSelectedPangkatGol").innerHTML = diklatSelected;
                        myChart2.data.labels = responseJson.pangkatgol;
                        myChart2.data.datasets.forEach(dataset => {
                            dataset.data = responseJson.jml_pangkatgol;
                        });
                        myChart2.update();
                    });
            });
        });
    <?php endif; ?>
</script>

</body>

</html>