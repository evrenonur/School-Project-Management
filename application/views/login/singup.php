<!DOCTYPE html>
<html>
<head>

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('public/')?>css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>E-Odev</title>
</head>
<body>
<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">

    <div class="login-box" style="height: 500px">
        <?php echo form_open('/login/sing','class="login-form"')?>
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Kaydol</h3>

        <div class="form-group">
            <label class="control-label">İsim - Soyisim</label>
            <input class="form-control" type="text" name="name" placeholder="İsim - Soyisim" autofocus>
        </div>
        <div class="form-group">
            <label class="control-label">E-Mail</label>
            <input class="form-control" type="email" name="email" placeholder="Email" autofocus>
        </div>
        <div class="form-group">
            <label class="control-label">Şifre</label>
            <input class="form-control" type="password" name="password" placeholder="Şifre">
        </div>

        <div class="form-group">
            <label class="control-label">Cinsiyet</label>
            <select name="gender" id="gender" class="form-control">
                <option value="0">Erkek</option>
                <option value="1">Kız</option>
            </select>
        </div>

        <div class="form-group btn-container">
            <input type="submit" name="submit" class="btn btn-primary btn-block" value="Kaydol">
        </div>
        <?php echo form_close()?>
    </div>
</section>
<!-- Essential javascripts for application to work-->
<script src="<?=base_url('public/')?>js/jquery-3.3.1.min.js"></script>
<script src="<?=base_url('public/')?>js/popper.min.js"></script>
<script src="<?=base_url('public/')?>js/bootstrap.min.js"></script>
<script src="<?=base_url('public/')?>js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="<?=base_url('public/')?>js/plugins/pace.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<?php if ($this->session->flashdata('error')): ?>
    <script>
        Swal.fire({
            position: 'center',
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
            position: 'center',
            icon: 'success',
            title: '<?=$this->session->flashdata('success')?>',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
<?php endif; ?>

</body>
</html>