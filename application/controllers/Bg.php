<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bg extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->model('lov/Customer', 'cust');
    }

    function index() {
        check_login();
        $this->load->view('home/index');
    }




}