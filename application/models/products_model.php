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
        $stmt = OCIParse($this->db->conn_id, "SELECT PHARMAWEB.PRODUCTS_PACK.GET_NUMBER_PRODUCT() AS mfrc FROM dual ");
        OCIExecute($stmt);
        $array = array();
        while (($row = oci_fetch_array($stmt, OCI_ASSOC))) {
            $rc = $row['MFRC'];
            $i = 1;
            OCIExecute($rc);
            while (($rc_row = oci_fetch_array($rc, OCI_ASSOC))) {
                $array[$i] = $rc_row;
                $i++;
            }
        }
        return $array[1]['COUNT(PRODUCTS_ID)'];
        oci_close($this->db->conn_id);
    }

    public function products_cat_count($id = 0) {
        $stmt = OCIParse($this->db->conn_id, "SELECT  PHARMAWEB.PRODUCTS_PACK.GET_NUMBER_PRODUCT_BY_CAT(:PARAM1) AS mfrc FROM dual ");
        oci_bind_by_name($stmt, ':PARAM1', $id, 32);
        OCIExecute($stmt);
        $array = array();
        while (($row = oci_fetch_array($stmt, OCI_ASSOC))) {
            $rc = $row['MFRC'];
            $i = 1;
            OCIExecute($rc);
            while (($rc_row = oci_fetch_array($rc, OCI_ASSOC))) {
                $array[$i] = $rc_row;
                $i++;
            }
        }
        return $array[1]['COUNT(PRODUCTS_ID)'];

        oci_close($this->db->conn_id);
    }

    public function get_products_limit($limit, $start) {
        $stmt = OCIParse($this->db->conn_id, "SELECT PHARMAWEB.PRODUCTS_PACK.GET_ALL_PRODUCT(:PARAM1,:PARAM2) AS mfrc FROM dual ");
        oci_bind_by_name($stmt, ':PARAM1', $limit, 32);
        oci_bind_by_name($stmt, ':PARAM2', $start, 32);
        OCIExecute($stmt);
        $array = array();
        while (($row = oci_fetch_array($stmt, OCI_ASSOC))) {
            $rc = $row['MFRC'];
            $i = 1;
            OCIExecute($rc);
            while (($rc_row = oci_fetch_array($rc, OCI_ASSOC))) {
                $array[$i] = $rc_row;
                $i++;
            }
        }

        return $array;
        oci_close($this->db->conn_id);
    }

    public function get_product_by_cat($limit, $start, $id = null) {
        $stmt = OCIParse($this->db->conn_id, "SELECT PHARMAWEB.PRODUCTS_PACK.GET_ALL_PRODUCT_BY_CATEGORIE(:PARAM1,:PARAM2,:PARAM3) AS mfrc FROM dual ");
        oci_bind_by_name($stmt, ':PARAM1', $id, 32);
        oci_bind_by_name($stmt, ':PARAM2', $limit, 32);
        oci_bind_by_name($stmt, ':PARAM3', $start, 32);
        OCIExecute($stmt);

        $array = array();
        while (($row = oci_fetch_array($stmt, OCI_ASSOC))) {
            $rc = $row['MFRC'];
            $i = 1;
            OCIExecute($rc);
            while (($rc_row = oci_fetch_array($rc, OCI_ASSOC))) {
                $array[$i] = $rc_row;
                $i++;
            }
        }
        return $array;
        oci_close($this->db->conn_id);
    }

    public function get_product($id = null) {
        $stmt = OCIParse($this->db->conn_id, "SELECT PHARMAWEB.PRODUCTS_PACK.GET_ONE_PRODUCT(:PARAM1) AS mfrc FROM dual ");
        oci_bind_by_name($stmt, ':PARAM1', $id, 32);
        OCIExecute($stmt);
        $array = array();
        while (($row = oci_fetch_array($stmt, OCI_ASSOC))) {
            $rc = $row['MFRC'];
            $i = 1;
            OCIExecute($rc);
            while (($rc_row = oci_fetch_array($rc, OCI_ASSOC))) {
                $array[$i] = $rc_row;
                $i++;
            }
        }
        return $array;
        oci_close($this->db->conn_id);
    }

    public function suggests() {

        if ($this->session->userdata('USERS_ID') == FALSE) {


            $return = array();

            $iterations = 5;

            while ($iterations > 0) {

                $id = rand(200, $this->products_count());

                array_push($return, $this->get_product($id));

                $iterations --;
            }

            return $return;

            oci_close($this->db->conn_id);
        } else {
            $return = array();
            $iduser = $this->session->userdata('USERS_ID');

            $stmt = OCIParse($this->db->conn_id, "SELECT PHARMAWEB.PRODUCTS_PACK.GET_SUGGESTIONS(:PARAM1) AS mfrc FROM dual ");
            oci_bind_by_name($stmt, ':PARAM1', $iduser, 32);
            OCIExecute($stmt);
            $array = array();
            while (($row = oci_fetch_array($stmt, OCI_ASSOC))) {
                $rc = $row['MFRC'];
                $i = 1;
                OCIExecute($rc);
                while (($rc_row = oci_fetch_array($rc, OCI_ASSOC))) {
                    $array[$i] = $rc_row;
                    array_push($return, $this->get_product($array[$i]['PRODUCTS_ID']));
                    $i++;
                }
            }
            return $return;
            oci_close($this->db->conn_id);
        }
    }

}
