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
        if (isset($_POST['name']) 
                && isset($_POST['surname']) 
                && isset($_POST['mail']) 
                && isset($_POST['password']) 
                && isset($_POST['fixnumber'])
                && isset($_POST['mobilenumber']) 
                && isset($_POST['adress']) 
                && isset($_POST['adresscomp']) 
                && isset($_POST['cp']) 
                && isset($_POST['mutual'])
                && isset($_POST['secu'])
                && isset($_POST['gender'])
                && isset($_POST['naiss'])
                ) {
                $statut = $this->auth_model->create_user($_POST['name'],
                        $_POST['surname'],
                        $_POST['mail'],
                        $_POST['password'],
                        $_POST['fixnumber'],
                        $_POST['mobilenumber'],
                        $_POST['adress'],
                        $_POST['adresscomp'],
                        $_POST['cp'],
                        $_POST['mutual'],
                        $_POST['secu'],
                        $_POST['gender'],
                        $_POST['naiss']
                        );
                        var_dump($statut);
        }  else {
          $this->load->view('layouts/auth/register');  
        }
        
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
