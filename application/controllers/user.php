<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of Auth
 *
 * @author Alex
 */
class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('auth_model');
    }
    
    //account
    public function index() {
        //if(!$userislogged){redirect('/user/login', 'refresh');}
        
        $this->load->view('layouts/auth/account');
    }

    public function login() {
        
        $this->load->view('layouts/auth/login');
    }

    public function logout() {

        $this->load->view('layouts/auth/login');
    }

    public function register() {
        
        $this->load->view('layouts/auth/register');
    }

    public function reset() {

        $this->load->view('layouts/auth/resetpassword');
    }

    public function edit() {

        $this->load->view('layouts/auth/edit');
    }
    
    public function exist() {

        return;
    }
}
