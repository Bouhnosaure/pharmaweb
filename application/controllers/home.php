<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of cart
 *
 * @author Alex
 */
class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('layouts/index');
    }

    public function notfound() {
        $this->load->view('statics/404');
    }

    public function contact() {
        $this->load->view('statics/contact');
    }

    public function debug() {
        $datestring = "%d/%m/%Y";
        $time = time();
        //$this->session->unset_userdata('USERS_LASTNAME');
        echo mdate($datestring, $time);
        print '<pre>';
        print_r($this->session->all_userdata());
        print '</pre>';
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */