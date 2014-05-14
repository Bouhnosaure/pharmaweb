<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of categories_model
 *
 * @author Alex
 */
class Categories_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_categories() {
        $this->db->where('CATEGORIES_PARENT', NULL);
        $query = $this->db->get("CATEGORIES");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        oci_close($this->db->conn_id);
        return false;
    }

    public function get_sub_categories($id) {
        $this->db->where('CATEGORIES_PARENT', $id);
        $query = $this->db->get("CATEGORIES");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        oci_close($this->db->conn_id);
        return false;
    }

}
