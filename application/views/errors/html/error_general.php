<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$ci = & get_instance();
$ci->load->helper('url');
?>
<!DOCTYPE html>
<html>
    <meta charset="utf-8" />
    <head>
        <title>Erro</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/theme.bootstrap_3.min.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?php echo base_url('assets/images/favicon/ms-icon-144x144.png') ?>">
        <!-- Latest compiled and minified JavaScript -->
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url('assets/images/favicon/apple-icon-57x57.png') ?>">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url('assets/images/favicon/apple-icon-60x60.png') ?>">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('assets/images/favicon/apple-icon-72x72.png') ?>">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/images/favicon/apple-icon-76x76.png') ?>">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url('assets/images/favicon/apple-icon-114x114.png') ?>">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('assets/images/favicon/apple-icon-120x120.png') ?>">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url('assets/images/favicon/apple-icon-144x144.png') ?>">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('assets/images/favicon/apple-icon-152x152.png') ?>">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/images/favicon/apple-icon-180x180.png') ?>">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url('assets/images/favicon/android-icon-192x192.png') ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('assets/images/favicon/favicon-32x32.png') ?>">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('assets/images/favicon/favicon-96x96.png') ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/images/favicon/favicon-16x16.png') ?>">
        <link rel="manifest" href="<?php echo base_url('assets/images/favicon/manifest.json') ?>">
        <style>
            .logo{padding-top: 8%;}
            h1{text-align:center; padding-top: 2%;color:#2A8F9E}
            h3{text-align:center;padding-top: 1%;color: #FAA74B}
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12 logo">
                    <img class="img-responsive center-block" src='<?= base_url("assets/images/emconstrucao.jpg") ?>'/>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h1>Erro</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12"><h3><?php echo $heading; ?></h3></div>
                    <div class="col-md-12">
                        <small>
                            <?php echo "<pre>" . $message . "</pre>"; ?>
                        </small>
                    </div>
                    <div class="col-md-12"><h3><a class="btn btn-primary" href="<?php echo base_url(); ?>"><i class="fa fa-reply"></i> Retornar para página inicial</a></h3></div>
                </div>
            </div>
        </div>
    </body>
</html>