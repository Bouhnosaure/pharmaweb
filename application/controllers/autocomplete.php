<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of autocomplete
 *
 * @author Alex
 */
class Autocomplete extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('autocomplete_model');
        $this->load->helper('inflector');
    }

    public function mutuals() {
        if (isset($_GET['term'])) {
            echo $this->autocomplete_model->get_mutuals(humanize($_GET['term']));
        }
    }

    public function mutualscenters() {
        if (isset($_GET['term'])) {
            echo $this->autocomplete_model->get_mutuals_centers(humanize($_GET['term']));
        }
    }

    public function medics() {
        if (isset($_GET['term'])) {
            echo $this->autocomplete_model->get_medics(humanize($_GET['term']));
        }
    }

    public function cities() {
        if (isset($_GET['term'])) {
            echo $this->autocomplete_model->get_cities(humanize($_GET['term']));
        }
    }

    //put your code here
}
