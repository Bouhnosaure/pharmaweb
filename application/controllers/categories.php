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
        $topcategories = $this->categories_model->get_categories();
        $html = "";
        $index = 1;
        $item = 1;
        $html .=  '<ul id="menu-group-1" class="nav menu">';
        foreach ($topcategories as $topcategorie) {

            $subcategories = $this->categories_model->get_sub_categories($topcategorie->CATEGORIES_ID);

            $html .=  '<li class="item-1 deeper parent">';
            $item++;
            $html .=  '<a href="' . base_url() . 'products/cat/' . $topcategorie->CATEGORIES_ID . '">';
            if ($subcategories != NULL) {
                $html .=  '<span data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-' . $item . '" class="sign"><i class="icon-plus icon-white"></i></span>';
            }
            else{
                $html .=  '<span class="blacked"><i class="icon-play"></i></span>';
            }
            $html .=  '<span class="lbl">' . $topcategorie->CATEGORIES_LABEL . '</span>';
            $html .=  '</a>';


            if ($subcategories != NULL) {
                $html .=  '<ul class="children nav-child unstyled small collapse" id="sub-item-' . $item . '">';
                $item++;
                foreach ($subcategories as $subcategorie) {

                    $subsubcategories = $this->categories_model->get_sub_categories($subcategorie->CATEGORIES_ID);

                    $html .=  '<li class="item-2 deeper parent">';
                    $html .=  '<a href="' . base_url() . 'products/cat/' . $subcategorie->CATEGORIES_ID . '">';
                    if ($subsubcategories != NULL) {
                        $html .=  '<span data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-' . $item . '" class="sign"><i class="icon-plus icon-white"></i></span>';
                    }
                    else{
                        $html .=  '<span class="blacked"><i class="icon-play"></i></span>';
                    }
                    $html .=  '<span class="lbl">' . $this->trunk($subcategorie->CATEGORIES_LABEL) . '</span> ';
                    $html .=  '</a>';

                    if ($subsubcategories != NULL) {
                        $html .=  '<ul class="children nav-child unstyled small collapse" id="sub-item-' . $item . '">';
                        foreach ($subsubcategories as $subsubcategorie) {
                            $html .=  '<li class="item-' . $item . '">';
                            $html .=  '<a href="' . base_url() . 'products/cat/' . $subsubcategorie->CATEGORIES_ID . '">';
                            $html .=  '<span class="blacked"><i class="icon-play"></i></span>';
                            $html .=  '<span class="lbl">' . $this->trunk($subsubcategorie->CATEGORIES_LABEL) . '</span>';
                            $html .= '</a>';
                            $html .= '</li>';
                            $item++;
                        }
                        $html .=  '</ul>';
                    }
                    $html .=  '</li>';
                    $index++;
                }
                $html .=  '</ul>';
            }
            $html .=  '</li>';
        }
        $html .=  '</ul>';
        
        $data['html'] = $html;
        
        $this->load->view('layouts/html_view', $data);
        
        $this->output->cache(60);
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
