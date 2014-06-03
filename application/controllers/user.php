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
        if ($this->session->userdata('USERS_ID') == FALSE) {
            redirect('/user/login', 'refresh');
        }
        $this->load->model('order_model');
        $data['commands'] = $this->order_model->get_orders_by_user($this->session->userdata('USERS_ID'));

        $this->load->view('layouts/auth/account', $data);
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
        if ($this->input->post()) {

            $this->auth_model->edit_user($this->input->post());

            foreach ($this->input->post() as $key => $value) {
                $this->session->unset_userdata($key);
            }
            $this->session->set_userdata($this->input->post());
            redirect("user/edit");
        } else {
            $data['user'] = $this->auth_model->get_user($this->session->userdata('USERS_MAIL'));
            $this->load->view('layouts/auth/edit', $data);
        }
    }

    public function exist() {

        return;
    }

    public function success() {

        $this->load->view('statics/success');
    }

    public function orderdetail($id) {
        if ($this->session->userdata('USERS_ID') == FALSE) {
            redirect('/user/login', 'refresh');
        }
        $this->load->model('order_model');
        $data['commands'] = $this->order_model->get_order_by_user($id);
        //var_dump($data);
        $this->load->view('layouts/cart/order', $data);
    }

    public function abort($id) {
        if ($this->session->userdata('USERS_ID') == FALSE) {
            redirect('/user/login', 'refresh');
        }
        $this->load->model('order_model');
        $this->order_model->abort_order($id);
        redirect("user");
    }

    public function question($id) {
        if ($this->session->userdata('USERS_ID') == FALSE) {
            redirect('/user/login', 'refresh');
        }
        $data['id'] = $id;
        if ($this->input->post()) {
            $this->load->model('order_model');
            $this->order_model->question($this->input->post());
            redirect("user");
        } else {
            $this->load->view('layouts/order/question', $data);
        }
    }

    public function view_questions() {
        if ($this->session->userdata('USERS_ID') == FALSE) {
            redirect('/user/login', 'refresh');
        }

        $this->load->model('order_model');
        $data['questions'] = $this->order_model->get_questions_by_user($this->session->userdata('USERS_ID'));
        
        $this->load->view('layouts/order/view_question', $data);
    }

}
