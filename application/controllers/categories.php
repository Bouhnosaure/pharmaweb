<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of categories
 *
 * @author Alex
 */
class Categories extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->model('categories_model');
        $this->output->set_header('Content-Type: text/html; charset=utf-8');
        $topcategories = $this->categories_model->get_categories();
        $index = 1;
        $item = 1;
        echo '<ul id="menu-group-1" class="nav menu">';
        foreach ($topcategories as $topcategorie) {

            $subcategories = $this->categories_model->get_sub_categories($topcategorie->CATEGORIES_ID);

            echo '<li class="item-1 deeper parent">';
            $item++;
            echo '<a href="' . base_url() . 'products/cat/' . $topcategorie->CATEGORIES_ID . '">';
            if ($subcategories != NULL) {
                echo '<span data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-' . $item . '" class="sign"><i class="icon-plus icon-white"></i></span>';
            }
            echo '<span class="lbl">' . $topcategorie->CATEGORIES_LABEL . '</span>';
            echo '</a>';


            if ($subcategories != NULL) {
                echo '<ul class="children nav-child unstyled small collapse" id="sub-item-' . $item . '">';
                $item++;
                foreach ($subcategories as $subcategorie) {

                    $subsubcategories = $this->categories_model->get_sub_categories($subcategorie->CATEGORIES_ID);

                    echo '<li class="item-2 deeper parent">';
                    echo '<a href="' . base_url() . 'products/cat/' . $subcategorie->CATEGORIES_ID . '">';
                    if ($subsubcategories != NULL) {
                        echo '<span data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-' . $item . '" class="sign"><i class="icon-plus icon-white"></i></span>';
                    }
                    echo '<span class="lbl">' . $this->trunk($subcategorie->CATEGORIES_LABEL) . '</span> ';
                    echo '</a>';

                    if ($subsubcategories != NULL) {
                        echo '<ul class="children nav-child unstyled small collapse" id="sub-item-' . $item . '">';
                        foreach ($subsubcategories as $subsubcategorie) {
                            echo '<li class="item-' . $item . '">';
                            echo '<a href="' . base_url() . 'products/cat/' . $subsubcategorie->CATEGORIES_ID . '">';
                            echo '<span class="blacked"><i class="icon-play"></i></span>';
                            echo '<span class="lbl">' . $this->trunk($subsubcategorie->CATEGORIES_LABEL) . '</span>';
                            echo'</a>';
                            echo'</li>';
                            $item++;
                        }
                        echo '</ul>';
                    }
                    echo '</li>';
                    $index++;
                }
                echo '</ul>';
            }
            echo '</li>';
        }
        echo '</ul>';

        //$this->load->view('layouts/json_view', $data);
    }

    public function trunk($description) {
        //nombre de caractères à afficher
        $max_caracteres = 30;
        // Test si la longueur du texte dépasse la limite
        if (strlen($description) > $max_caracteres) {
            // Séléction du maximum de caractères
            $description = substr($description, 0, $max_caracteres);
            // Récupération de la position du dernier espace (afin déviter de tronquer un mot)
            $position_espace = strrpos($description, " ");
            $description = substr($description, 0, $position_espace);
            // Ajout des "..."
            $description = $description . "...";
        }
        return $description;
    }

    //put your code here
}
