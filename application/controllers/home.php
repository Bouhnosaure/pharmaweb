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
    
    public function notfound(){
        $this->load->view('statics/404');
    }
    public function debug(){
        var_dump($this->session->all_userdata());
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */