<?php
if(!defined('BASEPATH')) exit('no file allowed');
class DefaultTheme{
    protected $CI;
     function __construct(){
        $this->CI =&get_instance();
    }
    function DefaultDisplay($theme, $data=null){
        $data['_config_content']=$this->CI->load->view($theme,$data,true);
        $this->CI->load->view('/DefaultTemplate.php', $data);
    }
}