<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct(){
        parent::__construct();
        
    }
	public function index()
	{
		$this->logintheme->LoginDisplay('index');
	}
    
    public function proses(){
        $user = $this->input->post('username');
        $pass = sha1($this->input->post('password'));
        $check = $this->db->get_where('adm_akses',['username'=>$user,'password'=>$pass]);
        $num = $check->num_rows();
        $getAkun = $check->row();
        if($num > 0){
            $this->session->set_userdata(array(
                            'status_login'=>TRUE,
                            'id'=>$getAkun->id_adm,
                            'nama' =>$getAkun->nama,
                            'username'=>$getAkun->username,
                            'password'=>$getAkun->password,
                            'level' =>$getAkun->level,
                        ));
            redirect('home/perumahan');
        }else{
            $this->logintheme->LoginDisplay('errors/fail');
        }
    }
    
    
}
