<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Process extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    
    public function adding($table){
        $data = $this->db->get($table);
        return $data;
    }
}