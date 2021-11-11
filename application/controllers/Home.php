<?php
if(!defined('BASEPATH')) exit('no file allowed');
class Home extends CI_Controller{
    public function __construct(){
        parent::__construct();
        check_session();
        qazwsxedc();
    }
    public function tes(){
        
        $data = array(
            "dataku" => array(
                "nama" => "Petani Kode",
                "url" => "http://petanikode.com"
            )
        );

        //$this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-petanikode.pdf";
        $this->pdf->load_view('trash/pdf', $data);
        //$this->stream('trash/pdf',$data);
    }
    
    public function index(){
        $data['monitor'] = $this->db->query("select * from monitoringdp join cicilan_dp on(cicilan_dp.id_monitoring = monitoringdp.id_monitoring)  order by monitoringdp.id_monitoring desc ");
        $data['jurnal'] = $this->db->join('kategori','kategori.id_kategori = jurnal.id_kategori')
                                   ->order_by('id_jurnal', 'DESC')
                                   ->get('jurnal');
        $data['buku'] = $this->db->query("select *,sum(jurnal.saldo) as total from jurnal join kategori on(jurnal.id_kategori = kategori.id_kategori) group by kategori.kategori");
        $data['rugilaba'] = $this->db->query("select * from rugilaba rugilaba order by id_rugilaba desc");
        $data['cflow'] = $this->db->get('cashflow');
        
        $data['pemasukkan'] = $this->db->query("select sum(saldo) as totmasuk FROM jurnal where status='MASUK'");
        $data['pengeluaran'] = $this->db->query("select sum(saldo) as totkeluar FROM jurnal where status='KELUAR'");
        $data['getin'] = $this->db->query("select sum(jumlah) as totmasuk FROM rugilaba where jenis='PENERIMAAN'");
        $data['getout'] = $this->db->query("select sum(jumlah) as totkeluar FROM rugilaba where jenis='PENGELUARAN'");
        $this->defaulttheme->DefDisplay('admin/index',$data);
    }
    
    
    public function jurnal(){
        $uri = $this->uri->segment(3);
        
        if(isset($uri)){
            
            $data['title'] = $this->db->get_where('perumahan',['id_perumahan'=>$uri])->row();
        }
        $data['jurnal'] = $this->db->order_by('id_jurnal', 'DESC')
                                   ->get_where('jurnal',['id_perumahan'=>$uri]);
        $data['getin'] = $this->db->query("select sum(saldo) as totmasuk FROM jurnal where status='MASUK' and id_perumahan='$uri'");
        $data['getout'] = $this->db->query("select sum(saldo) as totkeluar FROM jurnal where status='KELUAR' and id_perumahan='$uri'");
        $data['per'] = $this->db->order_by('id_perumahan','DESC')
                                ->get('perumahan');
        $this->defaulttheme->DefDisplay('admin/jurnal',$data);
    }
    
    public function viewjurnal(){
        $uri = $this->uri->segment(3);
        $a = $this->db->order_by('id_jurnal', 'DESC')
                                   ->get_where('jurnal',['id_jurnal'=>$uri])->row();
        $data['kategori']  = $this->db->get_where('kategori',['id_kategori'=>$a->id_kategori]);
        $data['rumah'] = $this->db->get_where('perumahan',['id_perumahan'=>$a->id_perumahan]);
        $data['jurnal'] = $this->db->order_by('id_jurnal', 'DESC')
                                   ->get_where('jurnal',['id_jurnal'=>$uri]);
        $this->defaulttheme->DefDisplay('admin/jurnalview',$data);
    }
    
    public function logout(){
        session_destroy();
        redirect('login');
    }
    
    public function deljurnal(){
        $uri = $this->uri->segment(3);
        $k = $this->uri->segment(4);
        $check = $this->db->delete('jurnal',['id_jurnal'=>$uri]);
        if($check){
            $checks = $this->db->delete('cashflow',['id_jurnal'=>$uri]);
            $checkss = $this->db->delete('rugilaba',['id_jurnal'=>$uri]);
            redirect('home/jurnal/'.$k);
        }else{
            echo"gagal hapus";
        }
    }
    
    public function addjurnal(){
        $data['katgori'] = $this->db->order_by('id_kategori','DESC')
                                    ->get('kategori');
        $this->defaulttheme->DefDisplay('admin/formjurnal',$data);
    }
    
    public function prosaddjurnal(){
         $tanggal = $this->input->post('tanggal');
         $tgl = substr($tanggal,-2);
        $bln = substr($tanggal,5,2);
        $thn = substr($tanggal,0,4);
        $k = $this->input->post('key');
        $uraian = $this->input->post('uraian');
        $jenis = $this->input->post('jenis');
        $kategori = $this->input->post('kategori');
        if(isset($kategori)){
            $kat = $kategori;
        }else{
            $kat = 0;
        }
        if($jenis=="PENERIMAAN"){
            $status = "MASUK"; 
        }else{
            $status = "KELUAR";
        }
        $sald = str_replace(".","",$this->input->post('saldo'));
        $saldo = str_replace("Rp","",$sald);
        $keterangan = $this->input->post('keterangan');
        $check = $this->db->insert('jurnal',
                                   ['tanggal'=>$tgl,
                                    'bulan'=>$bln,
                                    'tahun'=>$thn,
                                   'uraian'=>$uraian,
                                   'jenis'=>$jenis,
                                   'status'=>$status,
                                   'saldo'=>$saldo,
                                   'keterangan'=>$keterangan,
                                   'id_kategori'=>$kat,
                                   'id_perumahan'=>$k]);                                   
        if($check){
            $tak = $this->db->order_by('id_jurnal','DESC')
                            ->get_where('jurnal')->row();
            $d = $tak->id_jurnal;
            $checks = $this->db->insert('cashflow',
                                   ['id_jurnal'=>$d,
                                    'tanggal'=>$tgl,
                                    'bulan'=>$bln,
                                    'tahun'=>$thn,
                                    'saldo'=>$saldo,
                                   'status'=>$status,
                                   'id_kategori'=>$kat,
                                   'id_perumahan'=>$k,
                                   'uraian'=>$uraian,]);
            $checkss = $this->db->insert('rugilaba',
                                   ['id_jurnal'=>$d,
                                   'uraian'=>$uraian,
                                   'jenis'=>$jenis,
                                   'jumlah'=>$saldo,
                                   'id_perumahan'=>$k,
                                   ]);
            redirect('home/jurnal/'.$k);
        }else{
            echo"gagal memasukkan";
        }
    }
    
    public function edtjurnal(){
        $uri = $this->uri->segment(3);
        $data['katgori'] = $this->db->order_by('id_kategori','DESC')
                                    ->get('kategori');
        $data['edtjurnal'] = $this->db->get_where('jurnal',['id_jurnal'=>$uri]);
        $this->defaulttheme->DefDisplay('admin/formjurnal',$data);
    }
    
    public function prosedtjurnal(){
        $uri = $this->uri->segment(3);
        $k = $this->input->post('key');
        $id = $this->input->post('id');
        $tanggal = $this->input->post('tanggal');
        $tgl = substr($tanggal,-2);
        $bln = substr($tanggal,5,2);
        $thn = substr($tanggal,0,4);
        $uraian = $this->input->post('uraian');
        //$jenis = $this->input->post('jenis');
        $kategori = $this->input->post('kategori');
        if($jenis=="PENERIMAAN"){
            $status = "MASUK"; 
        }else{
            $status = "KELUAR";
        }
        $sald = str_replace(".","",$this->input->post('saldo'));
        $saldo = str_replace("Rp","",$sald);
        $keterangan = $this->input->post('keterangan');
        $check = $this->db->where('id_jurnal',$id)
                          ->update('jurnal',
                                   ['tanggal'=>$tgl,
                                    'bulan'=>$bln,
                                    'tahun'=>$thn,
                                   'uraian'=>$uraian,
                                   //'jenis'=>$jenis,
                                   //'status'=>$status,
                                   'saldo'=>$saldo,
                                   'keterangan'=>$keterangan,
                                   'id_kategori'=>$kategori
                                   ]);
        if($check){
            $checks = $this->db->where('id_jurnal',$id)
                                ->update('cashflow',
                                   [
                                    'tanggal'=>$tgl,
                                    'bulan'=>$bln,
                                    'tahun'=>$thn,
                                    'saldo'=>$saldo,
                                   //'status'=>$status,
                                   'id_kategori'=>$kategori,
                                   'id_perumahan'=>$k,
                                   'uraian'=>$uraian,]);
            $checkss = $this->db->where('id_jurnal',$id)
                                ->update('rugilaba',
                                   [
                                   'uraian'=>$uraian,
                                   
                                   'jumlah'=>$saldo,
                                   'id_perumahan'=>$k,
                                   ]);
            redirect('home/jurnal/'.$k);
        }else{
            echo"gagal memasukkan";
        }
    }
    
    public function bukubesar(){
        $uri = $this->uri->segment(3);
        if(isset($uri)){
            $data['title'] = $this->db->get_where('perumahan',['id_perumahan'=>$uri])->row();
        }
         
        
        $data['jurnal'] = $this->db->query("select *,sum(jurnal.saldo) as total from jurnal join kategori on(jurnal.id_kategori = kategori.id_kategori) where jurnal.id_perumahan='$uri' and status='KELUAR' group by kategori.kategori");
        $data['pemasukan'] = $this->db->query("select *,sum(jurnal.saldo) as total from jurnal  where jurnal.id_perumahan='$uri' and status='MASUK' group by uraian");
        $data['getin'] = $this->db->query("select sum(saldo) as totmasuk FROM jurnal where status='MASUK' and id_perumahan='$uri'");
        $data['getout'] = $this->db->query("select sum(saldo) as totkeluar FROM jurnal where status='KELUAR' and id_perumahan='$uri'");
        $data['per'] = $this->db->order_by('id_perumahan','DESC')
                                ->get('perumahan');
        $this->defaulttheme->DefDisplay('admin/bukubesar',$data);
    }
    
    public function rugilaba(){
        $uri = $this->uri->segment(3);
        if(isset($uri)){
            $data['title'] = $this->db->get_where('perumahan',['id_perumahan'=>$uri])->row();
        $data['rugilaba'] = $this->db->query("select * from rugilaba where id_perumahan='$uri' order by id_rugilaba desc");
        //$data['pengeluaran'] = $this->db->query("select * from rugilaba rugilaba where jenis='PENGELUARAN'");
        $data['tcicil'] = $this->db->query("select sum(saldo) as totalcicil from cicilan_dp where id_perumahan='$uri'")->row();
        $data['getin'] = $this->db->query("select sum(jumlah) as totmasuk FROM rugilaba where jenis='PENERIMAAN' and id_perumahan='$uri'");
        $data['getout'] = $this->db->query("select sum(jumlah) as totkeluar FROM rugilaba where jenis='PENGELUARAN' and id_perumahan=$uri");
        /*$data['csatu'] = $this->db->query("select sum(cicilan_satu) as totalcsatu from cicilan_dp where id_perumahan='$uri'");
        $data['cdua'] = $this->db->query("select sum(cicilan_dua) as totalcdua from cicilan_dp where id_perumahan='$uri'");
        $data['ctiga'] = $this->db->query("select sum(cicilan_tiga) as totalctiga from cicilan_dp where id_perumahan='$uri'");
        $data['cempat'] = $this->db->query("select sum(cicilan_empat) as totalcempat from cicilan_dp where id_perumahan='$uri'");*/
        $data['harjual'] = $this->db->query("select sum(harga_jual) as totaljual from monitoringdp where id_perumahan='$uri'");
        $data['bookfee'] = $this->db->query("select sum(booking_fee) as totalbook from monitoringdp where id_perumahan='$uri'");
        $data['keluar'] = $this->db->query("select sum(saldo) as totkeluar FROM jurnal where status='KELUAR' and id_perumahan='$uri'");
        $data['not'] = $this->db->query("select sum(harga_jual) as thj from unit where id_perumahan='$uri' and status='BELUM TERJUAL'")->row();
        $data['per'] = $this->db->order_by('id_perumahan','DESC')
                                ->get('perumahan');
        
        }else{
            $data['rugilaba'] = $this->db->query("select * from rugilaba  order by id_rugilaba desc");
        //$data['pengeluaran'] = $this->db->query("select * from rugilaba rugilaba where jenis='PENGELUARAN'");
        $data['tcicil'] = $this->db->query("select sum(saldo) as totalcicil from cicilan_dp ")->row();
        $data['getin'] = $this->db->query("select sum(jumlah) as totmasuk FROM rugilaba where jenis='PENERIMAAN'");
        $data['getout'] = $this->db->query("select sum(jumlah) as totkeluar FROM rugilaba where jenis='PENGELUARAN'");
        /*$data['csatu'] = $this->db->query("select sum(cicilan_satu) as totalcsatu from cicilan_dp");
        $data['cdua'] = $this->db->query("select sum(cicilan_dua) as totalcdua from cicilan_dp");
        $data['ctiga'] = $this->db->query("select sum(cicilan_tiga) as totalctiga from cicilan_dp");
        $data['cempat'] = $this->db->query("select sum(cicilan_empat) as totalcempat from cicilan_dp");*/
        $data['harjual'] = $this->db->query("select sum(harga_jual) as totaljual from monitoringdp");
        $data['bookfee'] = $this->db->query("select sum(booking_fee) as totalbook from monitoringdp");
        $data['keluar'] = $this->db->query("select sum(saldo) as totkeluar FROM jurnal where status='KELUAR'");
        $data['not'] = $this->db->query("select sum(harga_jual) as thj from unit where id_perumahan='$uri' and status='BELUM TERJUAL'")->row();
        $data['per'] = $this->db->order_by('id_perumahan','DESC')
                                ->get('perumahan');
        }
        $this->defaulttheme->DefDisplay('admin/rugilaba',$data);
    }
     public function addlabarugi(){
        $data['katgori'] = $this->db->order_by('id_kategori','DESC')
                                    ->get('kategori');
        $this->defaulttheme->DefDisplay('admin/formlabarugi',$data);
    }
    public function prosaddlabarugi(){
        $uraian = $this->input->post('uraian');
        $jenis = $this->input->post('jenis');
        $rm = $this->input->post('perumahan');
        $sald = str_replace(".","",$this->input->post('saldo'));
        $saldo = str_replace("Rp","",$sald);
        if($jenis=="PENERIMAAN"){
            $status = "MASUK"; 
        }else{
            $status = "KELUAR";
        }
        $check = $this->db->insert('rugilaba',
                                   [
                                   'uraian'=>$uraian,
                                   'jenis'=>$jenis,
                                   'jumlah'=>$saldo,
                                   'id_perumahan'=>$rm
                                   ]);
        if($check){
            redirect('home/rugilaba/'.$rm);
        }else{
            echo"gagal memasukkan";
        }
    }
    
    public function edtlabarugi(){
        $uri = $this->uri->segment(3);
        $data['edtlabarugi'] = $this->db->get_where('rugilaba',['id_rugilaba'=>$uri]);
        $this->defaulttheme->DefDisplay('admin/formlabarugi',$data);
    }
    
    public function prosedtlabarugi(){
        $uri = $this->uri->segment(3);
        $id = $this->input->post('id');
        $rm = $this->input->post('perumahan');
        $uraian = $this->input->post('uraian');
        $jenis = $this->input->post('jenis');
        $sald = str_replace(".","",$this->input->post('saldo'));
        $saldo = str_replace("Rp","",$sald);
        $check = $this->db->where('id_rugilaba',$id)
                          ->update('rugilaba',
                                   [
                                   'uraian'=>$uraian,
                                   'jenis'=>$jenis,
                                   'jumlah'=>$saldo,
                                   ]);
        if($check){
            redirect('home/rugilaba/'.$rm);
        }else{
            echo"gagal memasukkan";
        }
    }
    
    public function dellabarugi(){
        $uri = $this->uri->segment(3);
        $uri2 = $this->uri->segment(4);
        $check = $this->db->delete('rugilaba',['id_rugilaba'=>$uri]);
        if($check){
            redirect('home/rugilaba/'.$uri2);
        }else{
            echo"gagal hapus";
        }
    }
    
     public function cash(){
         $uri = $this->uri->segment(3);
         $uri2 = $this->uri->segment(4);
         $uri3 = $this->uri->segment(5);
          if(isset($uri)){
              $data['title'] = $this->db->get_where('perumahan',['id_perumahan'=>$uri])->row();
            if(isset($uri2)){
                $data['cashkeluar'] = $this->db->query("select *
            from cashflow join kategori on(cashflow.id_kategori=kategori.id_kategori) where cashflow.id_perumahan='$uri' and cashflow.status='KELUAR'  and cashflow.tahun='$uri2' "); //group by kategori.kategori
                
                $data['cashmasuk'] = $this->db->query("select *
            from cashflow  where id_perumahan='$uri' and status='MASUK'  and tahun='$uri2' "); //group by uraian
                
                 $data['sjan'] = $this->db->query("select sum(saldo) as smj from cashflow where bulan=01 and status='KELUAR'and tahun='$uri2' and id_perumahan='$uri'")->row();
              $data['sfeb'] = $this->db->query("select sum(saldo) as smf from cashflow where bulan=02 and status='KELUAR'and tahun='$uri2' and id_perumahan='$uri'")->row();
              $data['smar'] = $this->db->query("select sum(saldo) as smm from cashflow where bulan=03 and status='KELUAR'and tahun='$uri2' and id_perumahan='$uri'")->row();
              $data['sapr'] = $this->db->query("select sum(saldo) as sma from cashflow where bulan=04 and status='KELUAR'and tahun='$uri2' and id_perumahan='$uri'")->row();
              $data['smei'] = $this->db->query("select sum(saldo) as sme from cashflow where bulan=05 and status='KELUAR'and tahun='$uri2' and id_perumahan='$uri'")->row();
              $data['sjun'] = $this->db->query("select sum(saldo) as smju from cashflow where bulan=06 and status='KELUAR'and tahun='$uri2' and id_perumahan='$uri'")->row();
              $data['sjul'] = $this->db->query("select sum(saldo) as smjl from cashflow where bulan=07 and status='KELUAR'and tahun='$uri2' and id_perumahan='$uri'")->row();
              $data['saug'] = $this->db->query("select sum(saldo) as smau from cashflow where bulan=08 and status='KELUAR'and tahun='$uri2' and id_perumahan='$uri'")->row();
              $data['ssep'] = $this->db->query("select sum(saldo) as smse from cashflow where bulan=09 and status='KELUAR'and tahun='$uri2' and id_perumahan='$uri'")->row();
              $data['sokt'] = $this->db->query("select sum(saldo) as smok from cashflow where bulan=10 and status='KELUAR'and tahun='$uri2' and id_perumahan='$uri'")->row();
              $data['snov'] = $this->db->query("select sum(saldo) as smn from cashflow where bulan=11 and status='KELUAR'and tahun='$uri2' and id_perumahan='$uri'")->row();
              $data['sdes'] = $this->db->query("select sum(saldo) as smd from cashflow where bulan=12 and status='KELUAR'and tahun='$uri2' and id_perumahan='$uri'")->row();
              
              $data['mjan'] = $this->db->query("select sum(saldo) as smj from cashflow where bulan=01 and status='MASUK'and tahun='$uri2' and id_perumahan='$uri'")->row();
              $data['mfeb'] = $this->db->query("select sum(saldo) as smf from cashflow where bulan=02 and status='MASUK'and tahun='$uri2' and id_perumahan='$uri'")->row();
              $data['mmar'] = $this->db->query("select sum(saldo) as smm from cashflow where bulan=03 and status='MASUK'and tahun='$uri2' and id_perumahan='$uri'")->row();
              $data['mapr'] = $this->db->query("select sum(saldo) as sma from cashflow where bulan=04 and status='MASUK'and tahun='$uri2' and id_perumahan='$uri'")->row();
              $data['mmei'] = $this->db->query("select sum(saldo) as sme from cashflow where bulan=05 and status='MASUK' and tahun='$uri2'and id_perumahan='$uri'")->row();
              $data['mjun'] = $this->db->query("select sum(saldo) as smju from cashflow where bulan=06 and status='MASUK'and tahun='$uri2' and id_perumahan='$uri'")->row();
              $data['mjul'] = $this->db->query("select sum(saldo) as smjl from cashflow where bulan=07 and status='MASUK'and tahun='$uri2' and id_perumahan='$uri'")->row();
              $data['maug'] = $this->db->query("select sum(saldo) as smau from cashflow where bulan=08 and status='MASUK'and tahun='$uri2' and id_perumahan='$uri'")->row();
              $data['msep'] = $this->db->query("select sum(saldo) as smse from cashflow where bulan=09 and status='MASUK'and tahun='$uri2' and id_perumahan='$uri'")->row();
              $data['mokt'] = $this->db->query("select sum(saldo) as smok from cashflow where bulan=10 and status='MASUK'and tahun='$uri2' and id_perumahan='$uri'")->row();
              $data['mnov'] = $this->db->query("select sum(saldo) as smn from cashflow where bulan=11 and status='MASUK'and tahun='$uri2' and id_perumahan='$uri'")->row();
              $data['mdes'] = $this->db->query("select sum(saldo) as smd from cashflow where bulan=12 and status='MASUK' and tahun='$uri2' and id_perumahan='$uri'")->row();
            }else{
            
            $data['cashkeluar'] = $this->db->query("select *
            from cashflow join kategori on(cashflow.id_kategori=kategori.id_kategori) where cashflow.id_perumahan='$uri' and status='KELUAR'"); // group by kategori.kategori
            
              
            $data['cashmasuk'] = $this->db->query("select *
            from cashflow  where id_perumahan='$uri' and status='MASUK' "); //group by uraian

            $data['cashmasukcicilan'] = $this->db->query("select *
            from cicilan_dp  where id_perumahan='$uri' group by unit");
            
              
              $data['sjan'] = $this->db->query("select sum(saldo) as smj from cashflow where bulan=01 and status='KELUAR' and id_perumahan='$uri'")->row();
              $data['sfeb'] = $this->db->query("select sum(saldo) as smf from cashflow where bulan=02 and status='KELUAR' and id_perumahan='$uri'")->row();
              $data['smar'] = $this->db->query("select sum(saldo) as smm from cashflow where bulan=03 and status='KELUAR' and id_perumahan='$uri'")->row();
              $data['sapr'] = $this->db->query("select sum(saldo) as sma from cashflow where bulan=04 and status='KELUAR' and id_perumahan='$uri'")->row();
              $data['smei'] = $this->db->query("select sum(saldo) as sme from cashflow where bulan=05 and status='KELUAR' and id_perumahan='$uri'")->row();
              $data['sjun'] = $this->db->query("select sum(saldo) as smju from cashflow where bulan=06 and status='KELUAR' and id_perumahan='$uri'")->row();
              $data['sjul'] = $this->db->query("select sum(saldo) as smjl from cashflow where bulan=07 and status='KELUAR' and id_perumahan='$uri'")->row();
              $data['saug'] = $this->db->query("select sum(saldo) as smau from cashflow where bulan=08 and status='KELUAR' and id_perumahan='$uri'")->row();
              $data['ssep'] = $this->db->query("select sum(saldo) as smse from cashflow where bulan=09 and status='KELUAR' and id_perumahan='$uri'")->row();
              $data['sokt'] = $this->db->query("select sum(saldo) as smok from cashflow where bulan=10 and status='KELUAR' and id_perumahan='$uri'")->row();
              $data['snov'] = $this->db->query("select sum(saldo) as smn from cashflow where bulan=11 and status='KELUAR' and id_perumahan='$uri'")->row();
              $data['sdes'] = $this->db->query("select sum(saldo) as smd from cashflow where bulan=12 and status='KELUAR' and id_perumahan='$uri'")->row();
              
              $data['mjan'] = $this->db->query("select sum(saldo) as smj from cashflow where bulan=01 and status='MASUK' and id_perumahan='$uri'")->row();
              $data['mfeb'] = $this->db->query("select sum(saldo) as smf from cashflow where bulan=02 and status='MASUK' and id_perumahan='$uri'")->row();
              $data['mmar'] = $this->db->query("select sum(saldo) as smm from cashflow where bulan=03 and status='MASUK' and id_perumahan='$uri'")->row();
              $data['mapr'] = $this->db->query("select sum(saldo) as sma from cashflow where bulan=04 and status='MASUK' and id_perumahan='$uri'")->row();
              $data['mmei'] = $this->db->query("select sum(saldo) as sme from cashflow where bulan=05 and status='MASUK' and id_perumahan='$uri'")->row();
              $data['mjun'] = $this->db->query("select sum(saldo) as smju from cashflow where bulan=06 and status='MASUK' and id_perumahan='$uri'")->row();
              $data['mjul'] = $this->db->query("select sum(saldo) as smjl from cashflow where bulan=07 and status='MASUK' and id_perumahan='$uri'")->row();
              $data['maug'] = $this->db->query("select sum(saldo) as smau from cashflow where bulan=08 and status='MASUK' and id_perumahan='$uri'")->row();
              $data['msep'] = $this->db->query("select sum(saldo) as smse from cashflow where bulan=09 and status='MASUK' and id_perumahan='$uri'")->row();
              $data['mokt'] = $this->db->query("select sum(saldo) as smok from cashflow where bulan=10 and status='MASUK' and id_perumahan='$uri'")->row();
              $data['mnov'] = $this->db->query("select sum(saldo) as smn from cashflow where bulan=11 and status='MASUK' and id_perumahan='$uri'")->row();
              $data['mdes'] = $this->db->query("select sum(saldo) as smd from cashflow where bulan=12 and status='MASUK' and id_perumahan='$uri'")->row();
            }
          }else{
                  
          }
        
         $data['per'] = $this->db->order_by('id_perumahan','DESC')
                                ->get('perumahan');
        $this->defaulttheme->DefDisplay('admin/chasflow',$data);
    }
    
    public function proscashflow(){
           $thn = $this->input->post('thn');
            $bln = $this->input->post('bln');
            $uri = $this->input->post('k');
        redirect('home/cash/'.$uri."/".$thn."/".$bln);
        
    }
     public function addcashflow(){
        $data['katgori'] = $this->db->order_by('id_kategori','DESC')
                                    ->get('kategori');
        $this->defaulttheme->DefDisplay('admin/formcashflow',$data);
    }
    public function prosaddcashflow(){
        $uraian = $this->input->post('uraian');
        $saldo = $this->input->post('saldo');
        $check = $this->db->insert('cashflow',
                                   [
                                   'uraian'=>$uraian,
                                   'jumlah'=>$saldo
                                   ]);
        if($check){
            redirect('home/cash');
        }else{
            echo"gagal memasukkan";
        }
    }
    
    public function edtcashflow(){
        $uri = $this->uri->segment(3);
        $data['edtcashflow'] = $this->db->get_where('cashflow',['id_cashflow'=>$uri]);
        $this->defaulttheme->DefDisplay('admin/formcashflow',$data);
    }
    
    public function prosedtcashflow(){
        $id = $this->input->post('id');
        $uraian = $this->input->post('uraian');
        $saldo = $this->input->post('saldo');
         $check = $this->db->where('id_cashflow',$id)
                            ->update('cashflow',[
                                   'uraian'=>$uraian,
                                   'jumlah'=>$saldo
                                   ]);
        if($check){
            redirect('home/cash');
        }else{
            echo"gagal memasukkan";
        }
    }
    
    public function delcashflow(){
        $uri = $this->uri->segment(3);
        $check = $this->db->delete('cashflow',['id_cashflow'=>$uri]);
        if($check){
            redirect('home/cash');
        }else{
            echo"gagal hapus";
        }
    }
    
    public function monitoring(){
        $uri = $this->uri->segment(3);
         
        if(isset($uri)){
            $data['title'] = $this->db->get_where('perumahan',['id_perumahan'=>$uri])->row();
            //$data['monitor'] = $this->db->query("select *,
            //ifnull((SELECT cicilan_dp.cicilan_satu from cicilan_dp WHERE cicilan_dp.id_monitoring=monitoringdp.id_monitoring),0) as nilai,
            //ifnull((SELECT cicilan_dp.cicilan_dua from cicilan_dp WHERE cicilan_dp.id_monitoring=monitoringdp.id_monitoring),0) as nilai_dua,
            //ifnull((SELECT cicilan_dp.cicilan_tiga from cicilan_dp WHERE cicilan_dp.id_monitoring=monitoringdp.id_monitoring),0) as nilai_tiga,
            //ifnull((SELECT cicilan_dp.cicilan_empat from cicilan_dp WHERE cicilan_dp.id_monitoring=monitoringdp.id_monitoring),0) as nilai_empat
            //FROM  monitoringdp where monitoringdp.id_perumahan='$uri' order by monitoringdp.id_monitoring desc");   
            $data['monitor'] = $this->db->query("select *,
            ifnull((SELECT sum(saldo) from cicilan_dp WHERE cicilan_dp.id_monitoring=monitoringdp.id_monitoring),0) as nilai
             FROM  monitoringdp order by monitoringdp.id_monitoring desc");  
            
            $data['harjual'] = $this->db->query("select sum(harga_jual) as totaljual from monitoringdp where id_perumahan='$uri'");
            $data['bookfee'] = $this->db->query("select sum(booking_fee) as totalbook from monitoringdp where id_perumahan='$uri'");
            $data['tcicil'] = $this->db->query("select sum(saldo) as totalcicil from cicilan_dp where id_perumahan='$uri'")->row();
            //$data['csatu'] = $this->db->query("select sum(cicilan_satu) as totalcsatu from cicilan_dp where id_perumahan='$uri'");
            //$data['cdua'] = $this->db->query("select sum(cicilan_dua) as totalcdua from cicilan_dp where id_perumahan='$uri'");
            //$data['ctiga'] = $this->db->query("select sum(cicilan_tiga) as totalctiga from cicilan_dp where id_perumahan='$uri'");
            //$data['cempat'] = $this->db->query("select sum(cicilan_empat) as totalcempat from cicilan_dp where id_perumahan='$uri'");
            
            $data['not'] = $this->db->query("select sum(harga_jual) as thj from unit where id_perumahan='$uri' and status='BELUM TERJUAL'")->row();
            $data['blm'] = $this->db->get_where('unit',['id_perumahan'=>$uri,'status'=>'BELUM TERJUAL']);
        }else{
            /*$data['monitor'] = $this->db->query("select *,
            ifnull((SELECT cicilan_dp.cicilan_satu from cicilan_dp WHERE cicilan_dp.id_monitoring=monitoringdp.id_monitoring),0) as nilai,
            ifnull((SELECT cicilan_dp.cicilan_dua from cicilan_dp WHERE cicilan_dp.id_monitoring=monitoringdp.id_monitoring),0) as nilai_dua,
            ifnull((SELECT cicilan_dp.cicilan_tiga from cicilan_dp WHERE cicilan_dp.id_monitoring=monitoringdp.id_monitoring),0) as nilai_tiga,
            ifnull((SELECT cicilan_dp.cicilan_empat from cicilan_dp WHERE cicilan_dp.id_monitoring=monitoringdp.id_monitoring),0) as nilai_empat
            FROM  monitoringdp order by monitoringdp.id_monitoring desc");    */
            $data['monitor'] = $this->db->query("select *,
            ifnull((SELECT sum(saldo) from cicilan_dp WHERE cicilan_dp.id_monitoring=monitoringdp.id_monitoring),0) as nilai
             FROM  monitoringdp order by monitoringdp.id_monitoring desc");  
            $data['harjual'] = $this->db->query("select sum(harga_jual) as totaljual from monitoringdp");
            $data['bookfee'] = $this->db->query("select sum(booking_fee) as totalbook from monitoringdp");
            $data['tcicil'] = $this->db->query("select sum(saldo) as totalcicil from cicilan_dp ")->row();
            //$data['csatu'] = $this->db->query("select sum(cicilan_satu) as totalcsatu from cicilan_dp");
            //$data['cdua'] = $this->db->query("select sum(cicilan_dua) as totalcdua from cicilan_dp");
            //$data['ctiga'] = $this->db->query("select sum(cicilan_tiga) as totalctiga from cicilan_dp");
            //$data['cempat'] = $this->db->query("select sum(cicilan_empat) as totalcempat from cicilan_dp");
            $data['not'] = $this->db->query("select sum(harga_jual) as thj from unit where status='BELUM TERJUAL'");
        }
        
        
        $data['per'] = $this->db->order_by('id_perumahan','DESC')
                                ->get('perumahan');
        $this->defaulttheme->DefDisplay('admin/monitoring',$data);
    }
    
    public function tambahcicilan(){
        $a = $this->uri->segment(5);
        $data['tak'] = $this->db->get_where('unit',['id_unit'=>$a])->row();
        $data['katgori'] = $this->db->order_by('id_kategori','DESC')
                                    ->get('kategori');
        $this->defaulttheme->DefDisplay('admin/tambahcicilan',$data);
    }
    public function editcicilan(){
        $uri = $this->uri->segment(3);
        $uri2 = $this->uri->segment(4);
        $uri3 = $this->uri->segment(5);
        $data['dapat'] = $this->db->get_where('cicilan_dp',['id_monitoring'=>$uri])->row();
        $data['katgori'] = $this->db->order_by('id_kategori','DESC')
                                    ->get('kategori');
        $this->defaulttheme->DefDisplay('admin/tambahcicilan',$data);
    }
    
    public function prosedtcicilan(){
        $uri = $this->uri->segment(3);
        $uri2 = $this->uri->segment(4);
        $uri3 = $this->uri->segment(5);
         $id = $this->input->post('id');
        $cicilan = $this->input->post('cicilan');
        $knc = $this->input->post('key');
        $sald = str_replace(".","",$this->input->post('saldo'));
        $saldo = str_replace("Rp","",$sald);
            $inCheck = $this->db->where('id_monitoring',$id)
                            ->update('cicilan_dp',[$cicilan => $saldo]);    
        if($inCheck){
            redirect('home/monitoring/'.$knc);
        }else{
            echo"fail";
        }
    }
    
    public function prosaddcicilan(){
        $id = $this->input->post('id');
        $cicilan = $this->input->post('cicilan');
        $knc = $this->input->post('key');
        $tipe ="Penerimaan DP Konsumen Unit ".$this->input->post('tipe');
        $sald = str_replace(".","",$this->input->post('saldo'));
        $saldo = str_replace("Rp","",$sald);
        $tgl = Date('d');
        $bln = Date('m');
        $thn = Date('Y');
        $stat = $this->db->get_where('cicilan_dp',['id_monitoring'=>$id])->num_rows();
        /*if($stat > 0){
            $inCheck = $this->db->where('id_monitoring',$id)
                            ->update('cicilan_dp',[$cicilan => $saldo,'id_perumahan'=>$knc]);    
        }else{*/
            $inCheck = $this->db->insert('cicilan_dp',['id_monitoring'=>$id,'saldo'=>$saldo,'id_perumahan'=>$knc,
            'tanggal'=>$tgl,'bulan'=>$bln,'tahun'=>$thn]);
        //}
        
        if($inCheck){
            $checks = $this->db->insert('cashflow',
                                   ['id_jurnal'=>0,
                                    'tanggal'=>$tgl,
                                    'bulan'=>$bln,
                                    'tahun'=>$thn,
                                    'saldo'=>$saldo,
                                   'status'=>'MASUK',
                                   'id_kategori'=>0,
                                   'id_perumahan'=>$knc,
                                   'uraian'=>$tipe,]);
            redirect('home/monitoring/'.$knc);
        }else{
            echo"fail";
        }
    }
    
    public function monitorview(){
        $uri = $this->uri->segment(3);
        /*$data['monitor'] = $this->db->query("select *,
            ifnull((SELECT cicilan_dp.cicilan_satu from cicilan_dp WHERE cicilan_dp.id_monitoring=monitoringdp.id_monitoring),0) as nilai,
            ifnull((SELECT cicilan_dp.cicilan_dua from cicilan_dp WHERE cicilan_dp.id_monitoring=monitoringdp.id_monitoring),0) as nilai_dua,
            ifnull((SELECT cicilan_dp.cicilan_tiga from cicilan_dp WHERE cicilan_dp.id_monitoring=monitoringdp.id_monitoring),0) as nilai_tiga,
            ifnull((SELECT cicilan_dp.cicilan_empat from cicilan_dp WHERE cicilan_dp.id_monitoring=monitoringdp.id_monitoring),0) as nilai_empat 
            FROM  monitoringdp join perumahan on (perumahan.id_perumahan=monitoringdp.id_perumahan ) where monitoringdp.id_monitoring='$uri'");*/
        $data['monitor'] = $this->db->query("select *
            FROM  monitoringdp join perumahan on (perumahan.id_perumahan=monitoringdp.id_perumahan ) where monitoringdp.id_monitoring='$uri'");
        $gt = $this->db->get_where('monitoringdp',['id_monitoring'=>$uri])->row();
        $data['cicilan'] = $this->db->get_where('cicilan_dp',['id_monitoring'=>$uri]);
        $data['tcicil'] = $this->db->query("select sum(saldo) as totc from cicilan_dp where id_monitoring='$uri'")->row();
        $idkav = $gt->id_unit;
        $data['unt'] = $this->db->get_where('unit',['id_unit'=>$idkav])->row();
        $this->defaulttheme->DefDisplay('admin/monitorview',$data);
    }
    
    
    public function delmonitor(){
        $uri = $this->uri->segment(3);
        $k = $this->uri->segment(4);
        
        $gt = $this->db->get_where('monitoringdp',['id_monitoring'=>$uri])->row();
        $idkav = $gt->id_unit;
        $inCheck = $this->db->delete('monitoringdp',['id_monitoring'=>$uri]);
        $inChecksc = $this->db->delete('cicilan_dp',['id_monitoring'=>$uri]);
        $upt = $this->db->where('id_unit',$idkav)
                       ->update('unit',['status'=>'BELUM TERJUAL']);
        if($inCheck && inChecksc){
          redirect('home/monitoring/'.$k);
        }
    }
    
    public function addmonitor(){
        $uri = $this->uri->segment(3);
        $data['per'] = $this->db->order_by('id_perumahan','DESC')
                                ->get('perumahan');
        $data['namarm'] = $this->db->get_where('perumahan',['id_perumahan'=>$uri])->row();
        $data['tipenokav'] = $this->db->get_where('unit',['id_perumahan'=>$uri,'status'=>'BELUM TERJUAL']);
        $this->defaulttheme->DefDisplay('admin/formmonitor',$data);
    }
    
    public function prosaddmonitor(){
        $nama = $this->input->post('nama');
        //$nokav = $this->input->post('nokav');
        $tipe = $this->input->post('tipe');
        $rencana = $this->input->post('rencana');
        $key = $this->input->post('key');
        
        $hsald = str_replace(".","",$this->input->post('hargajual'));
        $hargajual = str_replace("Rp","",$hsald);
        
        $bsald = str_replace(".","",$this->input->post('booking'));
        $booking = str_replace("Rp","",$bsald);
        
        $tgl = $this->input->post('tgl');
        $akad = $this->input->post('akad');
        $pajak = $this->input->post('pajak');
        $pekerjaan = $this->input->post('pekerjaan');
        $penambahan = $this->input->post('penambahan');
        $nohp = $this->input->post('nohp');
        $idperumahan = $this->input->post('perumahan');
        $keterangan = $this->input->post('keterangan');
        $namamarketing = $this->input->post('namamarketing');
        
        $gt = $this->db->get_where('unit',['id_unit'=>$tipe])->row();
        $hj = $gt->harga_jual;
        
        $inCheck = $this->db->insert('monitoringdp',
                                    ['nama'=>$nama,
                                    'id_unit'=>$tipe,
                                    'rencana'=>$rencana,
                                    'harga_jual'=>$hj,
                                    'booking_fee'=>$booking,
                                    'tanggal_booking'=>$tgl,
                                    'biaya_akad'=>$akad,
                                    'pajak_penjualan'=>$pajak,
                                    'pekerjaan'=>$pekerjaan,
                                    'penambahan_bangunan'=>$penambahan,
                                    'no_hp'=>$nohp,
                                    'keterangan'=>$keterangan,
                                    'nama_marketing'=>$namamarketing,
                                    'id_perumahan'=>$idperumahan]);
        if($inCheck){
            $get = $this->db->order_by('id_monitoring','DESC')
                            ->get('monitoringdp');
            $hasil = $get->row();
            $id = $hasil->id_monitoring;
            $check = $this->db->insert('cicilan_dp',['id_monitoring'=>$id]);
            $u = $this->db->where('id_unit',$tipe)
                          ->update('unit',['status'=>'TERJUAL']);
            if($check){
                redirect('home/monitoring/'.$key);    
            }else{
                echo"gagal masukkan data";
            }
            
        }else{
            echo"fail";
        }
    }
    
     public function edtmonitor(){
         $uri = $this->uri->segment(3);
         $data['namarm'] = $this->db->get_where('perumahan',['id_perumahan'=>$uri])->row();
        
         $data['per'] = $this->db->order_by('id_perumahan','DESC')
                                ->get('perumahan');
         $data['mot'] = $this->db->get_where('monitoringdp',['id_monitoring'=>$this->uri->segment(3)]);
         $data['tipenokav'] = $this->db->get_where('unit',['id_perumahan'=>$this->uri->segment(4)]);
        $this->defaulttheme->DefDisplay('admin/formmonitor',$data);
    }
    
    public function prosedtmonitor(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        //$nokav = $this->input->post('nokav');
        $tipe = $this->input->post('tipe');
        $rencana = $this->input->post('rencana');
        $k = $this->input->post('key');
        
        $hsald = str_replace(".","",$this->input->post('hargajual'));
        $hargajual = str_replace("Rp","",$hsald);
        
        $bsald = str_replace(".","",$this->input->post('booking'));
        $booking = str_replace("Rp","",$bsald);
        
        $tgl = $this->input->post('tgl');
        $akad = $this->input->post('akad');
        $pajak = $this->input->post('pajak');
        $pekerjaan = $this->input->post('pekerjaan');
        $penambahan = $this->input->post('penambahan');
        $nohp = $this->input->post('nohp');
        $idperumahan = $this->input->post('perumahan');
        $keterangan = $this->input->post('keterangan');
        $namamarketing = $this->input->post('namamarketing');
        
        $take = $this->db->get_where("monitoringdp",['id_monitoring'=>$id])->row();
        $a1 = $take->id_unit;
        $ch = $this->db->where('id_unit',$a1)
                       ->update('unit',['status'=>'BELUM TERJUAL']);
        
        $gt = $this->db->get_where('unit',['id_unit'=>$tipe])->row();
        $hj = $gt->harga_jual;
        $inCheck = $this->db->where('id_monitoring',$id)
                            ->update('monitoringdp',
                                    ['nama'=>$nama,
                                    'id_unit'=>$tipe,
                                    'rencana'=>$rencana,
                                    'harga_jual'=>$hj,
                                    'booking_fee'=>$booking,
                                    'tanggal_booking'=>$tgl,
                                    'biaya_akad'=>$akad,
                                    'pajak_penjualan'=>$pajak,
                                    'pekerjaan'=>$pekerjaan,
                                    'penambahan_bangunan'=>$penambahan,
                                    'no_hp'=>$nohp,
                                    'keterangan'=>$keterangan,
                                    'nama_marketing'=>$namamarketing,
                                    'id_perumahan'=>$idperumahan]);
        
        $ubh = $this->db->where('id_unit',$tipe)
                       ->update('unit',['status'=>'TERJUAL']);
        
         if($inCheck){
                redirect('home/monitoring/'.$k);     
        }else{
            echo"fail";
        }
    }
    
    public function kategori(){
         $data['kategori'] = $this->db->query("select * from kategori where kategori!='' order by id_kategori desc");
        $this->defaulttheme->DefDisplay('admin/kategori',$data);
    }
    
    public function addkategori(){
        $this->defaulttheme->DefDisplay('admin/formkategori');
    }
    public function edtkategori(){
        $uri = $this->uri->segment(3);
        $data['edit'] = $this->db->get_where('kategori',['id_kategori'=>$uri]);
        $this->defaulttheme->DefDisplay('admin/formkategori',$data);
    }
    
    public function prosesaddkategori(){
        $nama = $this->input->post('kategori');
        $inCheck = $this->db->insert('kategori',['kategori'=>$nama]);
        if($inCheck){
            redirect('home/kategori');
        }
    }
    
    public function prosesedtkategori(){
        $nama = $this->input->post('kategori');
        $id = $this->input->post('id');
        $inCheck = $this->db->where('id_kategori',$id)
                            ->update('kategori',['kategori'=>$nama]);
        if($inCheck){
            redirect('home/kategori');
        }
    }
    
    public function delkategori(){
        $uri = $this->uri->segment(3);
        $inCheck = $this->db->delete('kategori',['id_kategori'=>$uri]);
        if($inCheck){
            redirect('home/kategori');
        }
    }
    
    public function perumahan(){
         $data['perumahan'] = $this->db->order_by('id_perumahan','DESC')
                                       ->get('perumahan');
        $this->defaulttheme->DefDisplay('admin/perumahan',$data);
    }
    
    public function delperumahan(){
        $uri = $this->uri->segment(3);
        $inCheck = $this->db->delete('perumahan',['id_perumahan'=>$uri]);
        if($inCheck){
            redirect('home/perumahan');
        }
    }
    
    public function addperumahan(){
        $this->defaulttheme->DefDisplay('admin/formperumahan');
    }
    
    public function edtperumahan(){
        $uri = $this->uri->segment(3);
        $data['edit'] = $this->db->get_where('perumahan',['id_perumahan'=>$uri]);
        $this->defaulttheme->DefDisplay('admin/formperumahan',$data);
    }
    
    public function prosesaddperumahan(){
        $nama = $this->input->post('nama');
        $tgl = $this->input->post('tgl');
        $alamat = $this->input->post('alamat');
        $inCheck = $this->db->insert('perumahan',[
            'nama_perumahan'=>$nama,
            'tanggal'=>$tgl,
            'alamat'=>$alamat,
        ]);
        if($inCheck){
            redirect('home/perumahan');
        }
    }
    
    public function viewperumahan(){
        $uri = $this->uri->segment(3);
        $data['rumah'] = $this->db->get_where('perumahan',['id_perumahan'=>$uri]);
        $data['unit'] = $this->db->get_where('unit',['id_perumahan'=>$uri]);
        $data['jumlah'] = $this->db->get_where('unit',['id_perumahan'=>$uri])->num_rows();
        $data['terjual'] = $this->db->get_where('unit',['id_perumahan'=>$uri,'status'=>'TERJUAL'])->num_rows();
        $data['sisa'] = $this->db->get_where('unit',['id_perumahan'=>$uri,'status'=>'BELUM TERJUAL'])->num_rows();
        $this->defaulttheme->DefDisplay('admin/unit',$data);
    }
    
    public function prosesedtperumahan(){
        $nama = $this->input->post('nama');
        $id = $this->input->post('id');
        $tgl = $this->input->post('tgl');
        $alamat = $this->input->post('alamat');
        $inCheck = $this->db->where('id_perumahan',$id)
                            ->update('perumahan',['nama_perumahan'=>$nama,
            'tanggal'=>$tgl,
            'alamat'=>$alamat,]);
        if($inCheck){
            redirect('home/perumahan');
        }
    }
    
    public function addunit(){
        $this->defaulttheme->DefDisplay('admin/addunit');
    }
    
    public function prosesaddunit(){
        $rm = $this->input->post('rm');
        $tipe = $this->input->post('tipe');
        $kav = $this->input->post('kav');
        
        $sald = str_replace(".","",$this->input->post('harga'));
        $saldo = str_replace("Rp","",$sald);
        $inCheck = $this->db->insert('unit',['id_perumahan'=>$rm,'tipe'=>$tipe,'kav'=>$kav,'harga_jual'=>$saldo]);
        if($inCheck){
            redirect('/home/viewperumahan/'.$rm);
        }
    }
    
    public function prosesedtunit(){
        $id = $this->input->post('id');
        $rm = $this->input->post('rm');
        $tipe = $this->input->post('tipe');
        $kav = $this->input->post('kav');
        $sald = str_replace(".","",$this->input->post('harga'));
        $saldo = str_replace("Rp","",$sald);
        $inCheck = $this->db->where('id_unit',$id)
                            ->update('unit',['tipe'=>$tipe,'kav'=>$kav,'harga_jual'=>$saldo]);
        if($inCheck){
            redirect('/home/viewperumahan/'.$rm);
        }
    }
    
    public function edtunit(){
        $uri = $this->uri->segment(3);
         $data['edit'] = $this->db->get_where('unit',['id_unit'=>$uri]);
        $this->defaulttheme->DefDisplay('admin/addunit',$data);
    }
    
    public function delunit(){
        $uri = $this->uri->segment(3);
        $uri2 = $this->uri->segment(4);
        $incheck = $this->db->delete('unit',['id_unit'=>$uri]);
        if($incheck){
            redirect('home/viewperumahan/'.$uri2);
        }
    }
    
    public function changename(){
        $this->defaulttheme->DefDisplay('admin/changeuser');
    }
    public function uptname(){
        $user = $this->input->post('nama');
        $inUpt = $this->db->where('id_adm',$this->session->userdata('id'))
                          ->update('adm_akses',['nama'=>$user]);
        if($inUpt){
            redirect('home/logout');
        }
    }
    
    public function changuser(){
        $this->defaulttheme->DefDisplay('admin/changeuser');
    }
    public function uptusername(){
        $user = $this->input->post('username');
        $inUpt = $this->db->where('id_adm',$this->session->userdata('id'))
                          ->update('adm_akses',['username'=>$user]);
        if($inUpt){
            redirect('home/logout');
        }
    }
    
    public function changepass(){
        $this->defaulttheme->DefDisplay('admin/changeuser');
    }
    public function uptpass(){
        $user = sha1($this->input->post('password'));
        $inUpt = $this->db->where('id_adm',$this->session->userdata('id'))
                          ->update('adm_akses',['password'=>$user]);
        if($inUpt){
            redirect('home/logout');
        }
    }
    
    public function user(){
        $nick['data'] = $this->db->order_by('id_adm','desc')
            ->where_not_in('level','0')
            ->get('adm_akses');
        $this->defaulttheme->DefDisplay('admin/pengguna',$nick);
    }
    
    public function adduser(){
        $nama = $this->input->post('nama');
        $user = $this->input->post('username');
        $pass = sha1($this->input->post('password'));
        $level = $this->input->post('level');
        
        $perumahan = $this->input->post('perumahan');
        $jurnal = $this->input->post('jurnal');
        $bukubesar = $this->input->post('bukubesar');
        $rugilaba = $this->input->post('rugilaba');
        $cashflow = $this->input->post('cashflow');
        $monitoring = $this->input->post('monitoring');
        $kategori = $this->input->post('kategori');
        $tfoperasional = $this->input->post('tfoperasional');
        $tfowner = $this->input->post('tfowner');
        $investor = $this->input->post('investor');
        
        $inSave = $this->db->insert('adm_akses',['nama'=>$nama,'username'=>$user,'password'=>$pass,'level'=>$level,
                                                'perumahan'=>$perumahan,'jurnal'=>$jurnal,'bukubesar'=>$bukubesar,'rugilaba'=>$rugilaba,'cashflow'=>$cashflow,'monitoring'=>$monitoring,'kategori'=>$kategori,'tfoperasional'=>$tfoperasional,'tfowner'=>$tfowner,'investor'=>$investor]);
        if($inSave){
            redirect('home/user');
        }
    }
    
    public function edituser(){
        $nick['data'] = $this->db->order_by('id_adm','desc')
            ->where_not_in('level','0')
            ->get('adm_akses');
        $nick['editing'] = $this->db->get_where('adm_akses',['id_adm'=>$this->uri->segment(3)])->row();
        $this->defaulttheme->DefDisplay('admin/pengguna',$nick);      
    }
    
    public function uptuser(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $user = $this->input->post('username');
        $pass = sha1($this->input->post('password'));
        $level = $this->input->post('level');
        
        $perumahan = $this->input->post('perumahan');
        $jurnal = $this->input->post('jurnal');
        $bukubesar = $this->input->post('bukubesar');
        $rugilaba = $this->input->post('rugilaba');
        $cashflow = $this->input->post('cashflow');
        $monitoring = $this->input->post('monitoring');
        $kategori = $this->input->post('kategori');
        $tfoperasional = $this->input->post('tfoperasional');
        $tfowner = $this->input->post('tfowner');
        $investor = $this->input->post('investor');
        if($pass == ""){
            $inSave = $this->db->where('id_adm',$id)
                                ->update('adm_akses',['nama'=>$nama,'username'=>$user,'level'=>$level,'perumahan'=>$perumahan,'jurnal'=>$jurnal,'bukubesar'=>$bukubesar,'rugilaba'=>$rugilaba,'cashflow'=>$cashflow,'monitoring'=>$monitoring,'kategori'=>$kategori,'tfoperasional'=>$tfoperasional,'tfowner'=>$tfowner,'investor'=>$investor]);    
        }else{
            $inSave = $this->db->where('id_adm',$id)
                                ->update('adm_akses',['nama'=>$nama,'username'=>$user,'password'=>$pass,'level'=>$level,'perumahan'=>$perumahan,'jurnal'=>$jurnal,'bukubesar'=>$bukubesar,'rugilaba'=>$rugilaba,'cashflow'=>$cashflow,'monitoring'=>$monitoring,'kategori'=>$kategori,'tfoperasional'=>$tfopersional,'tfowner'=>$tfowner,'investor'=>$investor]);
        }
        if($inSave){
            redirect('home/user');
        }
    }
    
    public function deluser(){
        $id = $this->uri->segment(3);
        $inDel = $this->db->delete('adm_akses',['id_adm'=>$id]);
        if($inDel){
            redirect('home/user');
        }
    }
    
    public function tfoprasional(){
        $uri = $this->uri->segment(3);
        $data['per'] = $this->db->order_by('id_perumahan','DESC')
                                ->get('perumahan');
        if(isset($uri)){
            $data['title'] = $this->db->get_where('perumahan',['id_perumahan'=>$uri])->row();
            $data['view'] = $this->db->order_by('id_ftoprasional','DESC')->get_where('tfoprasional',['id_perumahan'=>$uri])->result();
        }
        $this->defaulttheme->DefDisplay('admin/ftoprasional',$data);
    }
    
    public function adddanaop(){
        $uri = $this->uri->segment(3);
        $this->defaulttheme->DefDisplay('admin/formoprasional',$data);
    }
    
    public function savedanaop(){
        $key = $this->input->post('key');
        $nama = $this->input->post('nama');
        $sald = str_replace(".","",$this->input->post('saldo'));
        $saldo = str_replace("Rp","",$sald);
        $tgl = $this->input->post('tgl');
        $keterangan = $this->input->post('keterangan');
        $inSave = $this->db->insert('tfoprasional',['nama'=>$nama,'jumlah'=>$saldo,'tgl'=>$tgl,'keterangan'=>$keterangan,'id_perumahan'=>$key]);
        if($inSave){
            redirect('home/tfoprasional/'.$key);
        }
    }
    
    public function deldanaop(){
        $id = $this->uri->segment(3);
        $uri = $this->uri->segment(4);
        $inDel = $this->db->delete('tfoprasional',['id_ftoprasional'=>$id]);
        if($inDel){
            redirect('home/tfoprasional/'.$uri);
        }
    }
    
    public function edtdanaop(){
        $id = $this->uri->segment(4);
        $uri = $this->uri->segment(3);
        $data['view'] = $this->db->get_where('tfoprasional',['id_ftoprasional'=>$id])->row();
        $this->defaulttheme->DefDisplay('admin/formoprasional',$data);
    }
    
    public function uptdanaop(){
        $id = $this->input->post('id');
        $key = $this->input->post('key');
        $nama = $this->input->post('nama');
        $sald = str_replace(".","",$this->input->post('saldo'));
        $saldo = str_replace("Rp","",$sald);
        $tgl = $this->input->post('tgl');
        $keterangan = $this->input->post('keterangan');
        $inSave = $this->db->where('id_ftoprasional',$id)
            ->update('tfoprasional',['nama'=>$nama,'jumlah'=>$saldo,'tgl'=>$tgl,'keterangan'=>$keterangan,'id_perumahan'=>$key]);
        if($inSave){
            redirect('home/tfoprasional/'.$key);
        }
        
    }
    
    public function tfowner(){
        $uri = $this->uri->segment(3);
        $data['per'] = $this->db->order_by('id_perumahan','DESC')
                                ->get('perumahan');
        if(isset($uri)){
            $data['title'] = $this->db->get_where('perumahan',['id_perumahan'=>$uri])->row();
            
            $data['view'] = $this->db->order_by('id_tfowner ','DESC')->get_where('tfowner',['id_perumahan'=>$uri])->result();
        }
        $this->defaulttheme->DefDisplay('admin/tfowner',$data);
    }
    
    public function adddanaowner(){
        $uri = $this->uri->segment(3);
        $this->defaulttheme->DefDisplay('admin/formowner',$data);
    }
    
    public function savedanaowner(){
        $sald = str_replace(".","",$this->input->post('saldo'));
        $saldo = str_replace("Rp","",$sald);
        $tgl = $this->input->post('tgl');
        $key = $this->input->post('key');
        $nama = $this->input->post('nama');
        $keterangan = $this->input->post('keterangan');
        $inSave = $this->db->insert('tfowner',['namaowner'=>$nama,'jumlah'=>$saldo,'tgl'=>$tgl,'keterangan'=>$keterangan,'id_perumahan'=>$key]);
        if($inSave){
            redirect('home/tfowner/'.$key);
        }
    }
    
    public function edtdanaowner(){
        $id = $this->uri->segment(4);
        $uri = $this->uri->segment(3);
        $data['view'] = $this->db->get_where('tfowner',['id_tfowner'=>$id])->row();
        $this->defaulttheme->DefDisplay('admin/formowner',$data);
    }
    
    public function uptdanaowner(){
        $id = $this->input->post('id');
        $key = $this->input->post('key');
        $nama = $this->input->post('nama');
        $sald = str_replace(".","",$this->input->post('saldo'));
        $saldo = str_replace("Rp","",$sald);
        $tgl = $this->input->post('tgl');
        $keterangan = $this->input->post('keterangan');
        $inSave = $this->db->where('id_tfowner',$id)
            ->update('tfowner',['namaowner'=>$nama,'jumlah'=>$saldo,'tgl'=>$tgl,'keterangan'=>$keterangan,'id_perumahan'=>$key]);
        if($inSave){
            redirect('home/tfowner/'.$key);
        }
    }
    
    public function deldanaowner(){
        $id = $this->uri->segment(3);
        $uri = $this->uri->segment(4);
        $inDel = $this->db->delete('tfowner',['id_tfowner'=>$id]);
        if($inDel){
            redirect('home/tfowner/'.$uri);
        }
    }
    
    public function daftarinvestor(){
        $uri = $this->uri->segment(3);
        $data['per'] = $this->db->order_by('id_perumahan','DESC')
                                ->get('perumahan');
        if(isset($uri)){
            $data['title'] = $this->db->get_where('perumahan',['id_perumahan'=>$uri])->row();
            
            $data['view'] = $this->db->order_by('id_daftarinvestor ','DESC')->get_where('daftarinvestor',['idperumahan'=>$uri])->result();
        }
        $this->defaulttheme->DefDisplay('admin/daftarinvestor',$data);
    }
    
    public function savedaftarinvestor(){
        $idrumah = $this->input->post('key');
        $nama = $this->input->post('nama');
        $inCheck = $this->db->insert('daftarinvestor',['nama'=>$nama,'idperumahan'=>$idrumah]);
        if($inCheck){
            redirect('home/daftarinvestor/'.$idrumah);
        }
    }
    
    public function edtdaftarinvestor(){
        $uri = $this->uri->segment(3);
        $uridua = $this->uri->segment(4);
        $data['per'] = $this->db->order_by('id_perumahan','DESC')
                                ->get('perumahan');
        if(isset($uri)){
            $data['title'] = $this->db->get_where('perumahan',['id_perumahan'=>$uri])->row();
            
            $data['rowing'] = $this->db->get_where('daftarinvestor',['idperumahan'=>$uri,'id_daftarinvestor'=>$uridua])->row();
            
            
            $data['view'] = $this->db->order_by('id_daftarinvestor ','DESC')->get_where('daftarinvestor',['idperumahan'=>$uri])->result();
        }
        $this->defaulttheme->DefDisplay('admin/daftarinvestor',$data);
    }
    
    public function uptdaftarinvestor(){
        $id= $this->input->post('id');
        $key= $this->input->post('key');
        $nama = $this->input->post('nama');
        $inCheck = $this->db->where('id_daftarinvestor',$id)
                            ->update('daftarinvestor',['nama'=>$nama]);
        if($inCheck){
            redirect('home/daftarinvestor/'.$key);
        }
    }
    
    public function deldaftarinvestor(){
        $id = $this->uri->segment(3);
        $uri = $this->uri->segment(4);
        $inDel = $this->db->delete('daftarinvestor',['id_daftarinvestor'=>$id]);
        if($inDel){
            redirect('home/daftarinvestor/'.$uri);
        }
    }
    
    public function danainvestor(){
        $uri = $this->uri->segment(3);
        $data['per'] = $this->db->order_by('id_perumahan','DESC')
                                ->get('perumahan');
        if(isset($uri)){
            $data['title'] = $this->db->get_where('perumahan',['id_perumahan'=>$uri])->row();
            
            $data['view'] = $this->db->select('*')
                                     ->select_sum('danainvestor.jumlah')
                                     ->from('danainvestor')
                                     ->join('daftarinvestor','daftarinvestor.id_daftarinvestor=danainvestor.id_daftarinvestor')
                                     ->group_by("danainvestor.id_daftarinvestor")
                                     ->order_by('danainvestor.id_danainvestor','DESC')
                                     ->where('id_perumahan',$uri)
                                     ->get()
                                     ->result();
        }
        $this->defaulttheme->DefDisplay('admin/danainvestor',$data);
    }
    
    public function adddanainvestor(){
        $uri = $this->uri->segment(3);
        $data['investor'] = $this->db->get_where('daftarinvestor',['idperumahan'=>$uri])->result();
        $this->defaulttheme->DefDisplay('admin/forminvestor',$data);
    }
    
    public function savedanainvestor(){
        $sald = str_replace(".","",$this->input->post('saldo'));
        $saldo = str_replace("Rp","",$sald);
        $tgl = $this->input->post('tgl');
        $key = $this->input->post('key');
        $nama = $this->input->post('idinvestor');
        $keterangan = $this->input->post('keterangan');
        $inSave = $this->db->insert('danainvestor',['id_daftarinvestor'=>$nama,'jumlah'=>$saldo,'tgl'=>$tgl,'keterangan'=>$keterangan,'id_perumahan'=>$key]);
        if($inSave){
            redirect('home/danainvestor/'.$key);
        }
    }
    
    public function viewdanainvestor(){
        $uri1 = $this->uri->segment(3);
        $uri2 = $this->uri->segment(4);
        $data['title'] = $this->db->get_where('perumahan',['id_perumahan'=>$uri1])->row();
        $data['per'] = $this->db->order_by('id_perumahan','DESC')
                                ->get('perumahan');
        $data['view'] = $this->db->select('*')
                                     ->from('danainvestor')
                                     ->join('daftarinvestor','daftarinvestor.id_daftarinvestor=danainvestor.id_daftarinvestor')
                                     ->order_by('danainvestor.id_danainvestor','DESC')
                                     ->where('danainvestor.id_daftarinvestor',$uri2)
                                     ->get()
                                     ->result();
        $this->defaulttheme->DefDisplay('admin/viewdanainvestor',$data);
    }
    
    public function deldanainvestor(){
        $id = $this->uri->segment(3);
        $uri = $this->uri->segment(4);
        $inDel = $this->db->delete('danainvestor',['id_danainvestor'=>$id]);
        if($inDel){
            redirect('home/viewdanainvestor/'.$id.'/'.$uri);
        }
    }
    
    public function edtdanainvestor(){
        $id = $this->uri->segment(4);
        $uri = $this->uri->segment(3);
        $data['view'] = $this->db->get_where('tfowner',['id_tfowner'=>$id])->row();
        $data['investor'] = $this->db->get_where('daftarinvestor',['idperumahan'=>$uri])->result();
        $data['investors'] = $this->db->get_where('danainvestor',['id_danainvestor'=>$id])->row();
        $this->defaulttheme->DefDisplay('admin/forminvestor',$data);
    }
    
    public function uptdanainvestor(){
        $sald = str_replace(".","",$this->input->post('saldo'));
        $saldo = str_replace("Rp","",$sald);
        $tgl = $this->input->post('tgl');
        $id= $this->input->post('id');
        $key= $this->input->post('key');
        $nama = $this->input->post('idinvestor');
        $keterangan = $this->input->post('keterangan');
        $inSave = $this->db->where('id_danainvestor',$id)
                            ->update('danainvestor',['id_daftarinvestor'=>$nama,'jumlah'=>$saldo,'tgl'=>$tgl,'keterangan'=>$keterangan,'id_perumahan'=>$key]);
        if($inSave){
            redirect('home/danainvestor/'.$key);
        }
    }
    //---------------------------------------------
    
    public function export(){
        $this->defaulttheme->DefDisplay('admin/export');
    }
    
    public function exportjurnal(){
        $data['jurnal'] = $this->db->join('kategori','kategori.id_kategori = jurnal.id_kategori')
                                   ->order_by('id_jurnal', 'DESC')
                                   ->get('jurnal');
        $data['per'] = $this->db->order_by('id_perumahan','DESC')
                                ->get('perumahan');
        $this->load->view('admin/exportjurnal',$data);
    }
    
    public function exproses(){
        // Fungsi header dengan mengirimkan raw data excel
        header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
        header("Content-Disposition: attachment; filename=jurnal.xls");
        $data['jurnal'] = $this->db->join('kategori','kategori.id_kategori = jurnal.id_kategori')
                                   ->order_by('id_jurnal', 'DESC')
                                   ->get('jurnal');
        $data['per'] = $this->db->order_by('id_perumahan','DESC')
                                ->get('perumahan');
        $this->load->view('admin/exportjurnal',$data);
        //$this->defaulttheme->DefDisplay('admin/exproses');
        
    }
    
    public function exall(){
        $mysqlDatabaseName ='applapkeuangan';
$mysqlUserName ='root';
$mysqlPassword ='';
        $mysqlExportPath ='chooseFilenameForBackup.sql';

//DO NOT EDIT BELOW THIS LINE
$mysqlHostName ='localhost';
//Export the database and output the status to the page
$command='mysqldump -u' .$mysqlUserName .' -S /kunden/tmp/mysql5.sock -p' .$mysqlPassword .' ' .$mysqlDatabaseName .' > ' .$mysqlExportPath;
exec($command,$output=array(),$worked);
switch($worked){
    case 0:
        echo 'Database <b>' .$mysqlDatabaseName .'</b> successfully exported to <b>' .getcwd() .'/'.$mysqlExportPath .'</b>';
        break;
    case 1:
        echo 'There was a warning during the export of <b>' .$mysqlDatabaseName .'</b> to <b>' .getcwd() .'/' .$mysqlExportPath .'</b>';
        break;
    case 2:
        echo 'There was an error during export. Please check your values:<br/><br/><table><tr><td>MySQL Database Name:</td><td><b>' .$mysqlDatabaseName .'</b></td></tr><tr><td>MySQL User Name:</td><td><b>' .$mysqlUserName .'</b></td></tr><tr><td>MySQL Password:</td><td><b>NOTSHOWN</b></td></tr><tr><td>MySQL Host Name:</td><td><b>' .$mysqlHostName .'</b></td></tr></table>';
        break;
}
    }
    
}