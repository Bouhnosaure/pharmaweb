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
        $data['cart'] = $this->cart->contents();
        $this->load->view('layouts/cart/view', $data);
    }

    public function add() {
        $from = array(",",";",".");
        $to = array("","","");
        if (isset($_POST['id'])) {
            $data = array(
                'id' => $_POST['id'],
                'qty' => $_POST['qty'],
                'price' => $_POST['price'],
                'name' => ascii_to_entities($this->wd_remove_accents(str_replace($from, $to, $_POST['name'])))
            );
            var_dump($data);
            $this->cart->insert($data);
        } else {
            $this->load->view('statics/404');
        }
    }

    public function update() {
        $this->cart->update($data);
    }

    public function remove($product, $number) {
        
    }

    public function delete() {
        $this->cart->destroy();
    }
    public function wd_remove_accents($str, $charset='utf-8')
{
    $str = htmlentities($str, ENT_NOQUOTES, $charset);
    
    $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
    $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
    $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères
    
    return $str;
}

}
