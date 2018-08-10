<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->helper('url');
        if ($this->session->userdata("logado")) {
            redirect(base_url("Home"));
        } else {
            $this->load->view('emconstrucao');
        }
    }

}
