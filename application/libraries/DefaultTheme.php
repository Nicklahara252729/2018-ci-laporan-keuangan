<?php
if(!defined('BASEPATH')) exit('no file allowed');
class DefaultTheme{
    protected $_ci;
     function __construct(){
        $this->_ci =&get_instance();
    }
    function DefDisplay($tanitheme, $data=null){
        $data['_config_content']=$this->_ci->load->view($tanitheme,$data,true);
        $this->_ci->load->view('/DefaultTemplate.php', $data);
    }
}