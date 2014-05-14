<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of products_model
 *
 * @author Alex
 */
class Products_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function products_count() {
        return $this->db->count_all("PRODUCTS");
        oci_close($this->db->conn_id);
    }

    public function products_cat_count($id = null) {
        $this->db->where('CATEGORIES_ID', $id);
        return $this->db->count_all("PRODUCTS");
        oci_close($this->db->conn_id);
    }

    public function get_products_limit($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("PRODUCTS");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        oci_close($this->db->conn_id);
        return false;
    }

    public function get_products() {
        $query = $this->db->get("PRODUCTS");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        oci_close($this->db->conn_id);
        return false;
    }

    public function get_product_by_cat($limit, $start, $id = null) {
        $this->db->where('CATEGORIES_ID', $id);
        $this->db->limit($limit, $start);
        $query = $this->db->get("PRODUCTS");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        oci_close($this->db->conn_id);
        return false;
    }

    public function get_product($id = null) {
        $this->db->where('PRODUCTS_ID', $id);
        $query = $this->db->get("PRODUCTS");

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
