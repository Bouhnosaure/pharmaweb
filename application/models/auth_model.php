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

    public function create_user($name, $surname, $mail, $password, $fixnumber, $mobilenumber, $adress, $adresscomp, $cp, $mutual, $secu, $gender, $birth) {


        $role_id = 1;
        $mutualid = 1;
        $valid = 1;
        $activated = 1;
        $city_ID = 23;

        $stmt = OCIParse($this->db->conn_id, "begin :ret  := PHARMAWEB.USERS_PACK.CREATE_USER(:PARAM1,:PARAM2,:PARAM3,:PARAM4,:PARAM5,:PARAM6,:PARAM7,:PARAM8,:PARAM9,:PARAM10,:PARAM11,:PARAM12,:PARAM13,:PARAM14,:PARAM15); END; ");

        oci_bind_by_name($stmt, ':PARAM1', $role_id, 32);
        oci_bind_by_name($stmt, ':PARAM2', $mutualid, 32);
        oci_bind_by_name($stmt, ':PARAM3', $name, 32);
        oci_bind_by_name($stmt, ':PARAM4', $surname, 32);
        oci_bind_by_name($stmt, ':PARAM5', $password, 32);
        oci_bind_by_name($stmt, ':PARAM6', $secu, 32);
        oci_bind_by_name($stmt, ':PARAM7', $fixnumber, 32);
        oci_bind_by_name($stmt, ':PARAM8', $mobilenumber, 32);
        oci_bind_by_name($stmt, ':PARAM9', $mail, 32);
        oci_bind_by_name($stmt, ':PARAM10', $valid, 32);
        oci_bind_by_name($stmt, ':PARAM11', $activated, 32);
        oci_bind_by_name($stmt, ':PARAM12', $gender, 32);
        oci_bind_by_name($stmt, ':PARAM13', $city_ID, 32);
        oci_bind_by_name($stmt, ':PARAM14', $adress, 32);
        oci_bind_by_name($stmt, ':PARAM15', $adresscomp, 32);
        oci_bind_by_name($stmt, ':ret', $r, 200);

        $result = OCIExecute($stmt);
        var_dump($result);
        var_dump($r);

        $array = null;
        return $array;
        oci_close($this->db->conn_id);
    }

    public function edit_user($array) {
        
    }

}
