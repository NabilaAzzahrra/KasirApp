<script src="<?= base_url('assets/plugins/scrollbar/scrollbar.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/select2/js/select2.full.min.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/select2/js/i18n/id.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/chart.js/Chart.bundle.min.js'); ?>"></script>
<script src="<?= base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/jquery-validation/jquery.validate.min.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/jquery-validation/additional-methods.min.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/jquery-validation/localization/messages_id.min.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/inputmask/jquery.inputmask.min.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/toastr/toastr.min.js'); ?>"></script>
<script>
    $(function() {
        $('#logout').click(function() {
            $('#ModalLogout').modal('show');
            $('.modal-dialog').removeClass('modal-lg');
        });
    });
</script>
