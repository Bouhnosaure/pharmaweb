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
        if (!isset($this->session)) {
            redirect('/user/login', 'refresh');
        }

        $this->load->view('layouts/auth/account');
    }

    public function login() {
        $mail = "";
        if ($this->input->post()) {
            $mail = $_POST['email'];
            $return = $this->auth_model->connect_user($_POST['email'], $_POST['password']);

            if ($return == 1) {
                $user = $this->auth_model->get_user($mail);
                $this->session->set_userdata($user[1]);
                redirect("home/index");
            } else {
                $this->session->set_flashdata('message', 'mauvais mot de passe ou mail');
                redirect("home/index");
            }
        }
        $this->load->view('layouts/auth/login');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect("home/index");
    }

    public function register() {
        if ($this->input->post()) {
            $bool = NULL;
            $inorderfields = array('name', 'surname', 'mail', 'password', 'fixnumber', 'mobilenumber', 'adress', 'adresscomp', 'villeid', 'ville', 'mutualid', 'mutual', 'mutualcenterid', 'secu', 'gender', 'birth');
            $inordervalues = array();

            foreach ($inorderfields as $field) {
                $bool = $bool + empty($_POST[$field]);
                array_push($inordervalues, $_POST[$field]);
            }
            $user = array_combine($inorderfields, $inordervalues);

            if ($bool < 1) {
                $statut = $this->auth_model->create_user($user);
                if ($statut == 1) {
                    $statut = "Succès";
                    $this->session->set_flashdata('message', $statut);
                    redirect("user/success");
                } else {
                    $this->session->set_flashdata('message', $statut . ' (code : ' . $bool . ').');
                    redirect("user/register");
                }
            } else {
                $statut = 'tout les champs ne sont pas remplis.' . ' (code : ' . $bool . ').';
                $this->session->set_flashdata('message', $statut);
                redirect("user/register");
            }
        }

        $this->load->view('layouts/auth/register');
    }

    public function reset() {

        $this->load->view('layouts/auth/resetpassword');
    }

    public function edit() {


        var_dump($return);
        $this->load->view('layouts/auth/edit');
    }

    public function exist() {

        return;
    }

    public function success() {

        $this->load->view('statics/success');
    }

}
