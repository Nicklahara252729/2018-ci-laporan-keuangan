<?php
if(!defined('BASEPATH')) exit('no file allowed');
class Home extends CI_Controller{
    public function __construct(){
        parent::__construct();
        check_session();
    }
    
    public function index(){
        $data['jurnal'] = $this->db->order_by('id_jurnal', 'DESC')
                                   ->get('jurnal');
        $this->defaulttheme->DefDisplay('admin/index',$data);
    }
    
    public function logout(){
        session_destroy();
        redirect('login');
    }
    
    public function deljurnal(){
        $uri = $this->uri->segment(3);
        $check = $this->db->delete('jurnal',['id_jurnal'=>$uri]);
        if($check){
            redirect('home/');
        }else{
            echo"gagal hapus";
        }
    }
    
    public function addjurnal(){
        $this->defaulttheme->DefDisplay('admin/formjurnal');
    }
    
    public function prosaddjurnal(){
        $tanggal = $this->input->post('tanggal');
        $uraian = $this->input->post('uraian');
        $jenis = $this->input->post('jenis');
        if($jenis=="PENERIMAAN"){
            $status = "MASUK"; 
        }else{
            $status = "KELUAR";
        }
        $saldo = $this->input->post('saldo');
        $keterangan = $this->input->post('keterangan');
        $check = $this->db->insert('jurnal',
                                   ['tanggal'=>$tanggal,
                                   'uraian'=>$uraian,
                                   'jenis'=>$jenis,
                                   'status'=>$status,
                                   'saldo'=>$saldo,
                                   'keterangan'=>$keterangan]);
        if($check){
            redirect('home/');
        }else{
            echo"gagal memasukkan";
        }
    }
    
    public function edtjurnal(){
        $uri = $this->uri->segment(3);
        $data['edtjurnal'] = $this->db->get_where('jurnal',['id_jurnal'=>$uri]);
        $this->defaulttheme->DefDisplay('admin/formjurnal',$data);
    }
    
    public function prosedtjurnal(){
        $uri = $this->uri->segment(3);
        $tanggal = $this->input->post('tanggal');
        $uraian = $this->input->post('uraian');
        $jenis = $this->input->post('jenis');
        if($jenis=="PENERIMAAN"){
            $status = "MASUK"; 
        }else{
            $status = "KELUAR";
        }
        $saldo = $this->input->post('saldo');
        $keterangan = $this->input->post('keterangan');
        $check = $this->db->where('id_jurnal',$uri)
                          ->update('jurnal',
                                   ['tanggal'=>$tanggal,
                                   'uraian'=>$uraian,
                                   'jenis'=>$jenis,
                                   'status'=>$status,
                                   'saldo'=>$saldo,
                                   'keterangan'=>$keterangan]);
        if($check){
            redirect('home/');
        }else{
            echo"gagal memasukkan";
        }
    }
}