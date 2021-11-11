<?php if(!defined('BASEPATH')) exit ('no file allowed');
class Error extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
        $this->load->view('errors/404');
    }
}