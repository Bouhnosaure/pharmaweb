<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of cart
 *
 * @author Alex
 */
class Cart extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->load->view();
    }

    public function add($product) {
         /* $item =    array(
               'id'      => 'sku_123ABC',
               'qty'     => 1,
               'price'   => 99.99,
               'name'    => 'Monitor',
               'options' => array('Color' => 'Black')
            );
        */
        
        //insert item to cart
        
        $this->cart->insert($item);
        $this->load->view();
    }

    public function remove($product, $number) {

        $this->load->view();
    }

    public function delete() {
        $this->cart->destroy();
        $this->load->view();
    }

}
