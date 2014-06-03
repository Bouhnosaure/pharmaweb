<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of order_model
 *
 * @author Alex
 */
class Order_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function create_order($order) {

        $prescription = null;

        if (isset($order['prescription'])) {
            //
            $prescription = $order['prescription'];
        } else {
            $prescription['id'] = NULL;
            $prescription['create'] = 0;
            $prescription['date'] = NULL;
            $prescription['content'] = NULL;
            $prescription['totalnumber'] = NULL;
            $prescription['currentnumber'] = NULL;
            $prescription['doctor'] = NULL;
            $prescription['phonedoctor'] = NULL;
            $prescription['img'] = NULL;
            $prescription['imgrelative'] = NULL;
        }

        $customer = $order['customer'];
        $user = $order['user'];
        $cart = $order['cart'];
        $total = $order['total'];
        //initial statut
        $statut = 1;
        //datetime dd/mm/yyyy
        $datestring = "%d/%m/%Y";
        $time = time();
        $datetime = mdate($datestring, $time);
        $duedate = NULL;

        //returnlog
        //$returnlog = array();

        $stmt = OCIParse($this->db->conn_id, "begin :ret := PHARMAWEB.COMMANDES_PACK.CREATE_COMMAND(:PARAM1,:PARAM2,:PARAM3,:PARAM4,:PARAM5,:PARAM6,:PARAM7,:PARAM9,:PARAM10,:PARAM11,:PARAM12,:PARAM13,:PARAM14,:PARAM15); END; ");

        oci_bind_by_name($stmt, ':PARAM1', $prescription['create'], 200);
        oci_bind_by_name($stmt, ':PARAM2', $prescription['date'], 200);
        oci_bind_by_name($stmt, ':PARAM3', $prescription['content'], 200);
        oci_bind_by_name($stmt, ':PARAM4', $prescription['totalnumber'], 200);
        oci_bind_by_name($stmt, ':PARAM5', $prescription['currentnumber'], 200);
        oci_bind_by_name($stmt, ':PARAM6', $prescription['doctor'], 200);
        oci_bind_by_name($stmt, ':PARAM7', $prescription['phonedoctor'], 200);
        //oci_bind_by_name($stmt, ':PARAM8', $prescription['img'], 200);
        oci_bind_by_name($stmt, ':PARAM9', $prescription['imgrelative'], 200);
        oci_bind_by_name($stmt, ':PARAM10', $user['USERS_ID'], 200);
        oci_bind_by_name($stmt, ':PARAM11', $prescription['id'], 200);
        oci_bind_by_name($stmt, ':PARAM12', $statut, 200);
        oci_bind_by_name($stmt, ':PARAM13', $datetime, 200);
        oci_bind_by_name($stmt, ':PARAM14', $duedate, 200);
        oci_bind_by_name($stmt, ':PARAM15', $total, 200);
        oci_bind_by_name($stmt, ':ret', $r, 200);

        $billstatut = OCIExecute($stmt);
        $billid = $r;
        $this->session->set_userdata(array("orderid" => $r));
        //$returnlog['bill'] = $r;


        foreach ($cart as $item) {
            $stmt = OCIParse($this->db->conn_id, "begin :ret := PHARMAWEB.COMMANDES_PACK.CREATE_ORDERS_LINES(:PARAM1,:PARAM2,:PARAM3,:PARAM4,:PARAM5); END; ");
            oci_bind_by_name($stmt, ':PARAM1', $billid, 32);
            oci_bind_by_name($stmt, ':PARAM2', $item['id'], 32);
            oci_bind_by_name($stmt, ':PARAM3', $item['qty'], 200);
            oci_bind_by_name($stmt, ':PARAM4', $item['name'], 200);
            oci_bind_by_name($stmt, ':PARAM5', $item['price'], 200);
            oci_bind_by_name($stmt, ':ret', $r, 200);
            $result = OCIExecute($stmt);
            //array_push($returnlog, $r);
            //echo $item['id'] . ' ' . $item['name'] . ' ' . $item['price'] . ' ' . $item['qty'] . ' ' . $item['subtotal'] . '<br>';
        }

        //return $returnlog;

        oci_close($this->db->conn_id);
    }

    public function get_orders_by_user($id) {

        $stmt = OCIParse($this->db->conn_id, "SELECT PHARMAWEB.COMMANDES_PACK.GET_ALL_COMMANDES_BY_USER(:PARAM1) AS mfrc FROM dual ");
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

    public function get_order_by_user($id) {

        $stmt = OCIParse($this->db->conn_id, "SELECT PHARMAWEB.COMMANDES_PACK.GET_ONE_COMMAND(:PARAM1) AS mfrc FROM dual ");
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

    public function abort_order($id) {
        $this->db->where('BILLS_ID', $id);
        $this->db->update('BILLS', array('STATUTS_ID' => '7'));
        oci_close($this->db->conn_id);
    }

    public function question($array) {
        if ($this->session->userdata('USERS_ID') == FALSE) {
            
        } else {
            try {
                $this->db->trans_start();
                $stmt = OCIParse($this->db->conn_id, "INSERT INTO QUESTIONS (BILLS_ID, QUESTIONS_SUBJECT, QUESTION_CONTENT) VALUES ('" . $array['BILLS_ID'] . "','" . $array['QUESTIONS_SUBJECT'] . "','" . $array['QUESTIONS_CONTENT'] . "')");
                OCIExecute($stmt);
                //$this->db->query("INSERT INTO QUESTIONS (BILLS_ID, QUESTIONS_SUBJECT, QUESTION_CONTENT) VALUES ('" . $array['BILLS_ID'] . "','" . $array['QUESTIONS_SUBJECT'] . "','" . $array['QUESTIONS_CONTENT'] . "');");
                $this->db->trans_commit();
            } catch (Exception $ex) {
                $this->db->trans_rollback();
                echo "Error:" . $ex;
                die();
            }
            oci_close($this->db->conn_id);
        }
    }

    public function get_questions_by_user($id) {
        $this->db->select('BILLS_ID');
        $this->db->where('USERS_ID', $id);
        $results = $this->db->get('BILLS');

        $array = array();
        foreach ($results->result() as $result) {
            $this->db->where('BILLS_ID', $result->BILLS_ID);
            $questions = $this->db->get('QUESTIONS');
            
            if ($questions->result() != null) {
                array_push($array, $questions->result());
            }
        }
        return $array;
        oci_close($this->db->conn_id);
    }

}
