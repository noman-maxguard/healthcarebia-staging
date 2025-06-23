<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!------------------------select2-------------------------->
<script src="<?= base_url() ?>assets/plugins/select2/js/select2.full.min.js"></script>

<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

    })
</script>
<!------------------------select2-------------------------->


<!------------------------Tempusdominus Bootstrap 4 - Datepicker-------------------------->


<!-- Bootstrap4 Duallistbox -->
<script src="<?= base_url() ?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>

<!-- InputMask -->
<script src="<?= base_url() ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url() ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?= base_url() ?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>


<script>
    $(function () {

        //Date range picker
        $('.reservationdate').datetimepicker({
            format: 'DD-MM-YYYY',

        });
        //Date range picker


        $('.datetimepicker').datetimepicker({
            format: 'DD-MM-YYYY hh:mm A',

        });

    })
</script>


<!------------------------Tempusdominus Bootstrap 4 - Datepicker-------------------------->


<!------------------------tagsinput-------------------------->
<script src="<?= base_url() ?>assets/tagsinput/tagsinput.js"></script>
<!------------------------tagsinput-------------------------->

<!------------------------custom-file-input-------------------------->
<script src="<?= base_url() ?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        bsCustomFileInput.init();
    });
</script>
<!------------------------custom-file-input-------------------------->


<!------------------------clipboard-------------------------->
<!-- 2. Include library -->
<script src="<?= base_url() ?>assets/clipboard/clipboard.min.js"></script>

<!-- 3. Instantiate clipboard by passing a string selector -->
<script>
    var clipboard = new ClipboardJS('.copy');

    clipboard.on('success', function (e) {
        alert("URL is copied !")
    });

    clipboard.on('error', function (e) {
        console.log(e);
    });
</script>
<!------------------------clipboard-------------------------->


<!------------------------Summernote-------------------------->
<!-- Summernote -->
<script src="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(function () {
        // Summernote
        $('.textarea').summernote();
        $('.ckeditor').summernote();
        $('.textarea-big').summernote({
            height: 200,

        });
    })
</script>
<!------------------------Summernote-------------------------->


<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/dist/js/demo.js"></script>


<!------------------------flash-messages-------------------------->
<script type="text/javascript">
    $(function () {
        //alert(25);
        $(".flash-messages-error").delay(4000).fadeOut();
        $(".flash-messages-success").delay(4000).fadeOut();

    });
</script>
<?php if ($this->session->flashdata('success')): ?>
    <div class='  flash-messages-success '>
        <?php echo $this->session->flashdata('success') ?>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
    <div class='  flash-messages-error '>
        <?php echo $this->session->flashdata('error') ?>
    </div>
<?php endif; ?>
<!------------------------flash-messages-------------------------->


<script>
    $(document).on('click', '.datetimepicker-input', function () {
        $(this).next().children().trigger('click');
    })
</script>