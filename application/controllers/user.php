<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of Auth
 *
 * @author Alex
 */
class User extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->load->view();
    }

    public function login() {

        $this->load->view();
    }

    public function logout() {

        $this->load->view();
    }

    public function register() {

        $this->load->view();
    }

    public function verify($token) {

        $this->load->view();
    }

    public function reset($token) {

        $this->load->view();
    }

    public function edit($user) {

        $this->load->view();
    }

    public function search($user) {

        $this->load->view();
    }

}
