<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of upload
 *
 * @author Alex
 */
class Upload extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('layouts/upload');
    }

    public function file() {

        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . '/pharmaweb/' . 'application/uploads/';
            $targetFile = $targetPath . $_FILES['file']['name'];
            move_uploaded_file($tempFile, $targetFile);
        }
    }

    public function image($name) {
        $targetPath = $_SERVER['DOCUMENT_ROOT'] . '/pharmaweb/' . 'application/uploads/';
        $contents =null;
        
        // to blob => $content
        if ($fp = @fopen($targetPath . $name, "r")) {
            // Read until the end-of-file marker.
            while (!feof($fp))
                $contents .= fgetc($fp);
            // Close an open file handle.
            fclose($fp);
        }
        
        
        
        //to image
        
        echo $contents;
        header("Content-type: image/jpg");
    }

}
