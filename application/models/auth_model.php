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

    public function get_user($mail) {
        
    }

    public function connect_user($mail, $password) {
        
    }

    public function create_user($name, $surname, $mail, $password, $fixnumber, $mobilenumber, $adress, $adresscomp, $cp, $mutual, $secu, $gender,$birth) {
        $role=1;
        $mutualid = 1;
        $villeid= 50;
        
        $stmt = OCIParse($this->db->conn_id, "SELECT PHARMAWEB.USERS_PACK.CREATE_USER(:PARAM1,:PARAM2,:PARAM3,:PARAM4,:PARAM5,:PARAM6,:PARAM7,:PARAM8,:PARAM9,:PARAM10,:PARAM11,:PARAM12,:PARAM13,:PARAM14,:PARAM15) AS mfrc FROM dual ");
        
        oci_bind_by_name($stmt, ':PARAM1', $role, 32);
        oci_bind_by_name($stmt, ':PARAM2', $mutualid, 32);
        oci_bind_by_name($stmt, ':PARAM3', $name, 32);
        oci_bind_by_name($stmt, ':PARAM4', $surname, 32);
        oci_bind_by_name($stmt, ':PARAM5', $password, 32);
        oci_bind_by_name($stmt, ':PARAM6', $secu, 32);
        oci_bind_by_name($stmt, ':PARAM7', $fixnumber, 32);
        oci_bind_by_name($stmt, ':PARAM8', $mobilenumber, 32);
        oci_bind_by_name($stmt, ':PARAM9', $mail, 32);
        oci_bind_by_name($stmt, ':PARAM10', $birth, 32);
        oci_bind_by_name($stmt, ':PARAM11', $gender, 32);
        oci_bind_by_name($stmt, ':PARAM12', $villeid, 32);
        oci_bind_by_name($stmt, ':PARAM13', $adress, 32);
        oci_bind_by_name($stmt, ':PARAM14', $adresscomp, 32);
        oci_bind_by_name($stmt, ':PARAM15', $role, 32);
        
        
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

    public function edit_user($array) {
        
    }

}
