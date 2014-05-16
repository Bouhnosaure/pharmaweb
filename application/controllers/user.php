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
        echo TRUE + FALSE;
        //$this->load->view('layouts/auth/login');
    }

    public function logout() {

        $this->load->view('layouts/auth/login');
    }

    public function register() {
        $bool = NULL;

        $inorderfields = array('name', 'surname', 'mail', 'password', 'fixnumber', 'mobilenumber', 'adress', 'adresscomp', 'villeid', 'ville', 'mutualid', 'mutual', 'mutualcenterid', 'secu', 'gender', 'birth');
        $inordervalues = array();

        foreach ($inorderfields as $field) {
            $bool = $bool + isset($_POST[$field]);
            array_push($inordervalues, $_POST[$field]);
        }
        $user = array_combine($inorderfields, $inordervalues);
        var_dump($user);

        if ($bool >= 15) {
            $statut = $this->auth_model->create_user($user);
            var_dump($statut);
        } else {
            $this->load->view('layouts/auth/register');
        }

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
