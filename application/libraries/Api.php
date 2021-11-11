<?php
if(!defined('BASEPATH')) exit('no file allowed');
class Api extends MY_Controller{
    protected $CI;
     function __construct(){
        $this->CI =&get_instance();
    }
    function protection(){
        if(!$this->ion_auth->logged_in()){
			redirect('auth/login','refresh');
		}
    }
}