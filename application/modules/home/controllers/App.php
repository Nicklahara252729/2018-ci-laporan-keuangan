<?php if(!defined('BASEPATH')) exit('no file allowed');
class App extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library(array('ion_auth', 'form_validation','api'));
        $this->load->model('Process');
        $this->api->protection();
    }
    
    public function index(){
        $data['content'] = 'home/index';
        $this->template->tema($data);
        
    }
}