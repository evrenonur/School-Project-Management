<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('public/')?>css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>E-Proje Giriş</title>
</head>
<body>
<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">
    <div class="logo">
        <h1>E-Proje</h1>
    </div>

    <div class="login-box">

        <?php echo form_open('/login/control','class="login-form"')?>
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Giriş Yap</h3>
        <div class="form-group">
            <label class="control-label">E-Mail</label>
            <input class="form-control" type="email" name="email" placeholder="Email" autofocus>
        </div>
        <div class="form-group">
            <label class="control-label">Şifre</label>
            <input class="form-control" type="password" name="password" placeholder="Şifre">
        </div>

        <div class="form-group btn-container">
            <input type="submit" name="submit" class="btn btn-primary btn-block" value="Giriş Yap">
            <a href="<?=base_url('login/singup')?>" class="btn btn-primary btn-block">Kaydol</a>

        </div>
        <?php echo form_close()?>

        <form class="forget-form" action="index.html">
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
            <div class="form-group">
                <label class="control-label">EMAIL</label>
                <input class="form-control" type="text" placeholder="Email">
            </div>
            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
            </div>
            <div class="form-group mt-3">
                <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
            </div>
        </form>
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
<script type="text/javascript">
    // Login Page Flipbox control
    $('.login-content [data-toggle="flip"]').click(function() {
        $('.login-box').toggleClass('flipped');
        return false;
    });
</script>
</body>
</html>