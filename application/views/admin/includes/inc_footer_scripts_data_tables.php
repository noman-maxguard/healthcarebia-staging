<!------------------------DataTables-------------------------->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


<!-- page script -->
<script>
    $(function () {


        $(".DataTable").DataTable({
            "responsive": true,
            "autoWidth": false,
        });

    });
</script>
<!------------------------custom-file-input-------------------------->
