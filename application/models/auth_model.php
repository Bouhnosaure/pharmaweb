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

    public function create_user($user) {
        $role_id = 1;
        $valid = 1;
        $activated = 1;

        $stmt = OCIParse($this->db->conn_id, "begin :ret  := PHARMAWEB.USERS_PACK.CREATE_USER(:PARAM1,:PARAM2,:PARAM3,:PARAM4,:PARAM5,:PARAM6,:PARAM7,:PARAM8,:PARAM9,:PARAM10,:PARAM11,:PARAM12,:PARAM13,:PARAM14,:PARAM15,:PARAM16); END; ");

        oci_bind_by_name($stmt, ':PARAM1', $role_id, 200);
        oci_bind_by_name($stmt, ':PARAM2', $user['mutualcenterid'], 200);
        oci_bind_by_name($stmt, ':PARAM3', $user['name'], 200);
        oci_bind_by_name($stmt, ':PARAM4', $user['surname'], 200);
        oci_bind_by_name($stmt, ':PARAM5', $user['password'], 200);
        oci_bind_by_name($stmt, ':PARAM6', $user['secu'], 200);
        oci_bind_by_name($stmt, ':PARAM7', $user['fixnumber'], 200);
        oci_bind_by_name($stmt, ':PARAM8', $user['mobilenumber'], 200);
        oci_bind_by_name($stmt, ':PARAM9', $user['mail'], 200);
        oci_bind_by_name($stmt, ':PARAM10', $user['birth'], 200);
        oci_bind_by_name($stmt, ':PARAM11', $valid, 200);
        oci_bind_by_name($stmt, ':PARAM12', $activated, 200);
        oci_bind_by_name($stmt, ':PARAM13', $user['gender'], 200);
        oci_bind_by_name($stmt, ':PARAM14', $user['villeid'], 200);
        oci_bind_by_name($stmt, ':PARAM15', $user['adress'], 200);
        oci_bind_by_name($stmt, ':PARAM16', $user['adresscomp'], 200);
        oci_bind_by_name($stmt, ':ret', $r, 200);

        $result = OCIExecute($stmt);
        return $r;
        oci_close($this->db->conn_id);
    }

    public function edit_user($array) {
        
    }

}
