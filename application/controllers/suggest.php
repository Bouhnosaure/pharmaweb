<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of suggest
 *
 * @author Alex
 */
class Suggest extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->model('products_model');
        echo json_encode($this->products_model->suggests());
    }

}
