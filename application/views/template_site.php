<?php
$ci =& get_instance();

$data = array(
    //'carrinho' => $carrinho,
);

$this->load->view('header_site', $data);
$this->load->view('menu_site', $data);
$this->load->view($view, $data);
$this->load->view('footer_site', $data);


