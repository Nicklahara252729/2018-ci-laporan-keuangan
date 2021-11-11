<?php
if(!defined('BASEPATH')) exit('no file allowed');
class LoginTheme{
    protected $_ci;
     function __construct(){
        $this->_ci =&get_instance();
    }
    function LoginDisplay($tanitheme, $data=null){
        $data['_config_content']=$this->_ci->load->view($tanitheme,$data,true);
        $this->_ci->load->view('/LoginTemplate.php', $data);
    }
}