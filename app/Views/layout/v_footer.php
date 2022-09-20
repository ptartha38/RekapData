</div>
<!-- Form Status -->
<div class="container">
    <form id="form-status">
        <div class="form-group">
            <input type="hidden" class="form-control" id="status_username" name="status_username" value="<?= $session->username; ?>">
        </div>
    </form>
</div>
<!-- Form Status -->
</div>
</div>
<!-- Penutup Main -->
<div class="row">
    <div class="col-md-12">
        <div class="copyright">
            <p>Copyright ©2022 Mesin Cuan</p>
        </div>
    </div>
</div>
<!-- Jquery JS-->
<script src="<?= base_url() ?>/assets/dashboard/vendor/jquery-3.2.1.min.js"></script>

<!-- LightBox JS-->
<script src="<?= base_url() ?>/assets/lightbox/dist/js/lightbox.js"></script>

<!-- Bootstrap JS -->
<script src="<?= base_url() ?>/assets/dashboard/vendor/bootstrap-4.1/popper.min.js"></script>
<script src="<?= base_url() ?>/assets/dashboard/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="<?= base_url() ?>/assets/dashboard/vendor/slick/slick.min.js">
</script>
<script src="<?= base_url() ?>/assets/dashboard/vendor/wow/wow.min.js"></script>
<script src="<?= base_url() ?>/assets/dashboard/vendor/animsition/animsition.min.js"></script>
<script src="<?= base_url() ?>/assets/dashboard/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="<?= base_url() ?>/assets/dashboard/vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="<?= base_url() ?>/assets/dashboard/vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="<?= base_url() ?>/assets/dashboard/vendor/circle-progress/circle-progress.min.js"></script>
<script src="<?= base_url() ?>/assets/dashboard/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="<?= base_url() ?>/assets/dashboard/vendor/chartjs/Chart.bundle.min.js"></script>
<script src="<?= base_url() ?>/assets/dashboard/vendor/select2/select2.min.js">
</script>

<!-- DataTables -->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/fc-3.3.0/r-2.2.3/datatables.min.css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/fc-3.3.0/r-2.2.3/datatables.min.js"></script>


<!-- Main JS-->
<script src="<?= base_url() ?>/assets/dashboard/js/main.js"></script>

<!-- status user -->
<script>
    $(document).ready(function() {
        setInterval(() => {
            update_status_user();
        }, 1000);

        function update_status_user() {
            $.ajax({
                url: "<?php echo base_url('Personil/update_status_user'); ?>",
                type: 'POST',
                async: true,
                dataType: 'JSON',
                data: $('#form-status').serialize(),
                success: function(x) {
                    if (x.sukses == true) {
                        console.log(x.pesan);
                    }
                }
            });
        }
    });
</script>
</body>

</html>
<!-- end document-->