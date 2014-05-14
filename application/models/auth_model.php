<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of auth_model
 *
 * @author Alex
 */
class Auth_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function testoracle() {
        //$query = $this->db->call_function('CONNECTION("test","root")');
        //$query = $this->db->query('call CONNECTION("test","root")');
        $id = "toto";
        $name = "root";
        $empty = "";

        $stmt = oci_parse($this->db->conn_id, "begin PHARMAWEB.CONNECTION(:PARAM1, :PARAM2 , :PARAM3); end;");
        oci_bind_by_name($stmt, ':PARAM1', $id, 32);
        oci_bind_by_name($stmt, ':PARAM2', $name, 32);
        oci_bind_by_name($stmt, ':PARAM3', $empty, 32);

        $query = ociexecute($stmt);
        oci_close($this->db->conn_id);
        return $query;
    }

}
