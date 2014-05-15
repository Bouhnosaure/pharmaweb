<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of autocomplete_model
 *
 * @author Alex
 */
class Autocomplete_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_mutuals($pattern) {
        $stmt = OCIParse($this->db->conn_id, "SELECT  PHARMAWEB.PRODUCTS_PACK.GET_NUMBER_PRODUCT_BY_CAT(:PARAM1) AS mfrc FROM dual ");
        oci_bind_by_name($stmt, ':PARAM1', $pattern, 32);
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
        return $this->tojson($array);
        oci_close($this->db->conn_id);
    }

    public function get_medics($pattern) {
        $stmt = OCIParse($this->db->conn_id, "SELECT  PHARMAWEB.PRODUCTS_PACK.GET_PRODUCT_BY_SEARCH(:PARAM1) AS mfrc FROM dual ");
        oci_bind_by_name($stmt, ':PARAM1', $pattern, 32);
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
        return $this->tojson($array,'PRODUCTS_LABEL');
        oci_close($this->db->conn_id);
    }

    public function get_cities($pattern) {
        $stmt = OCIParse($this->db->conn_id, "SELECT  PHARMAWEB.LOCATION_PACK.GET_ALL_CITY_BY_SEARCH(:PARAM1) AS mfrc FROM dual ");
        oci_bind_by_name($stmt, ':PARAM1', $pattern, 32);
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
        return $this->tojson($array,'CITIES_NAME');
        oci_close($this->db->conn_id);
    }

    public function tojson($array,$column) {
        $counter = 1;
        $json = '[';
        foreach ($array as $item) {
            if ($counter!=1) {
                $json .= ',';
            } else {
                $first = false;
            }
            $json .= '{"value":"' . $item[$column] . '"}';
            $counter++;
        }
        $json .= ']';
        return $json;
    }

}
