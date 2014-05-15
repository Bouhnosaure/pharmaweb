<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of products
 *
 * @author Alex
 */
class Products extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($page = 1) {
        $this->load->library("pagination");
        $this->load->model('products_model');
        $data['title'] = "Tout les produits";

        $config['base_url'] = base_url() . 'products/';
        $config['total_rows'] = $this->products_model->products_count();
        $config['per_page'] = 9;
        $config['uri_segment'] = 2;

        $this->pagination->initialize($config);
        $data["products"] = $this->products_model->get_products_limit($page,$page+$config["per_page"]-1);
        $data['links'] = $this->pagination->create_links();

        $this->load->view('layouts/products/all', $data);
    }

    public function cat($cat = null, $page = 1) {
        $this->load->library("pagination");
        $this->load->model('products_model');
        $data['title'] = "Produits par catégorie";

        $config['base_url'] = base_url() . 'products/cat/' . $cat . '/';
        $config['total_rows'] = $this->products_model->products_cat_count($cat);
        $config['per_page'] = 8;
        $config['uri_segment'] = 4;

        $this->pagination->initialize($config);
        $data["products"] = $this->products_model->get_product_by_cat($config["per_page"], $page, $cat);
        $data['links'] = $this->pagination->create_links();

        $this->load->view('layouts/products/all', $data);
    }

    public function detail($id) {
        $this->load->model('products_model');
        $data['title'] = "Détail d'un produit'";
        $array = $this->products_model->get_product($id);
        $data['product'] = $array[1];
        $this->load->view('layouts/products/detail', $data);
    }

    public function create() {

        $this->load->view();
    }

    public function edit() {

        $this->load->view();
    }

    public function delete() {

        $this->load->view();
    }

}
