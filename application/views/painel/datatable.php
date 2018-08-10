<!--Datatables-->
<?php if ($dt) { ?>
    <link href="<?= base_url('/assets/tables/responsive/assets/lib/css/footable.core.min.css') ?>" rel="stylesheet"/>
    <link href="<?= base_url('/assets/tables/datatables/assets/lib/extras/ColVis/media/css/ColVis.css') ?>" rel="stylesheet"/>
    <script type="text/javascript" src="<?= base_url('/assets/tables/responsive/assets/lib/js/footable.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('/assets/tables/responsive/assets/custom/js/tables-responsive-footable.init.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('/assets/tables/datatables/assets/lib/js/jquery.dataTables.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('/assets/tables/datatables/assets/lib/extras/TableTools/media/js/TableTools.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('/assets/tables/datatables/assets/lib/extras/ColVis/media/js/ColVis.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('/assets/tables/datatables/assets/custom/js/DT_bootstrap.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('/assets/tables/datatables/assets/custom/js/' . $dt . '') ?>"></script>
    <script type="text/javascript" src="<?= base_url('/assets/tables/datatables/assets/custom/js/datatables.fixedHead.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('/assets/tables/responsive/assets/lib/js/footable.min.js') ?>"></script>
<?php } ?>