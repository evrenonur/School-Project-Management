<!-- Essential javascripts for application to work-->
<script src="<?=base_url('public/')?>js/jquery-3.3.1.min.js"></script>
<script src="<?=base_url('public/')?>js/popper.min.js"></script>
<script src="<?=base_url('public/')?>js/bootstrap.min.js"></script>
<script src="<?=base_url('public/')?>js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="<?=base_url('public/')?>js/plugins/pace.min.js"></script>
<!-- Page specific javascripts-->
<script type="text/javascript" src="<?=base_url('public/')?>js/plugins/chart.js"></script>
<script type="text/javascript" src="<?=base_url('public/')?>js/plugins/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?=base_url('public/')?>js/plugins/select2.min.js"></script>
<script type="text/javascript" src="<?=base_url('public/')?>js/plugins/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?=base_url('public/')?>js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?=base_url('public/')?>js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript">

    $('#demoDate').datepicker({
        format: "dd-mm-yyyy",
        autoclose: true,
        todayHighlight: true
    });

</script>

<?php if ($this->session->flashdata('error')): ?>
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: '<?=$this->session->flashdata('error')?>',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
<?php endif; ?>
<?php if ($this->session->flashdata('success')): ?>
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '<?=$this->session->flashdata('success')?>',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
<?php endif; ?>

</body>
</html>