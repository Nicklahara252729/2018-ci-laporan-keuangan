<?php if(!defined('BASEPATH')) exit ('no file allowed');
class MY_Controller extends MX_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->module('Template');
    }
}