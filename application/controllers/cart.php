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
        $from = array(",", ";", ".", "/", "-");
        $to = array("", "", "", " ", " ");
        if (isset($_POST['id'])) {
            $data = array(
                'id' => $_POST['id'],
                'qty' => $_POST['qty'],
                'price' => $_POST['price'],
                'name' => ascii_to_entities($this->wd_remove_accents(str_replace($from, $to, $_POST['name'])))
            );
            $this->cart->insert($data);
            echo 'Le produit a bien été ajouté au panier';
        } else {
            $this->load->view('statics/404');
        }
    }

    public function update() {
        if (isset($_POST['rowid'])) {
            $data = array(
                'rowid' => $_POST['rowid'],
                'qty' => $_POST['qty']
            );
            $this->cart->update($data);
            $this->load->view('statics/wait');
            redirect('/cart', 'refresh');
        } else {
            $this->load->view('statics/404');
        }
    }

    public function destroy() {
        $this->cart->destroy();
        redirect('/cart', 'refresh');
    }

    public function wd_remove_accents($str, $charset = 'utf-8') {
        $str = htmlentities($str, ENT_NOQUOTES, $charset);

        $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
        $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
        $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères

        return $str;
    }

    public function getcart() {
        $cart = $this->cart->contents();
        echo json_encode($cart);
    }

    public function gettotal() {
        echo json_encode($this->cart->total());
    }

}
