<?php
if(!defined('BASEPATH')) exit('no file allowed');
class DefaultTheme{
    protected $_ci;
     function __construct(){
        $this->_ci =&get_instance();
    }
    function DefDisplay($tanitheme, $data=null){
        $data['_config_content']=$this->_ci->load->view($tanitheme,$data,true);
        $data['menu']=$this->_ci->load->view('admin/menu.php',$data,true);
        $data['topnav']=$this->_ci->load->view('admin/topnav.php',$data,true);
        $data['footer']=$this->_ci->load->view('admin/footer.php',$data,true);
        $this->_ci->load->view('/DefaultTemplate.php', $data);
    }
}