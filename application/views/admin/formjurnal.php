<?php 
$uri = $this->uri->segment(2);
if($uri=="edtjurnal"){
    $title = "Edit data jurnal";
    $form = form_open('home/prosedtjurnal');
}else{
    $title = "Tambah data jurnal";
    $form = form_open('home/prosaddjurnal');
}

$hasil = $edtjurnal->row();
$tanggal = $hasil->tanggal;
$uraian = $hasil->uraian;
$jenis = $hasil->jenis
?>
<div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title"><?php echo $title; ?>
                                <?php echo anchor('home/','<i class="fa fa-eye"></i> View jurnal',['class'=>'btn btn-info btn-sm pull-right']); ?>
                            </h3>
                            <?php echo $form; ?>
                            <table class="table">
                                <tr>
                                    <td>Tanggal</td>
                                    
                                    <td>:</td>
                                    <td><input type="date" name="tanggal" value="<?php echo $tanggal; ?>" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Uraian</td>
                                    <td>:</td>
                                    <td><input type="text" name="uraian" value="<?php echo $tanggal; ?>" placeholder="Uraian" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Jenis</td>
                                    <td>:</td>
                                    <td>
                                        <select class="form-control" name="jenis">
                                            <option disabled selected> PENERIMAAN / PENGELUARAN</option>
                                            <option value="PENERIMAAN">PENERIMAAN</option>
                                            <option value="PENGELUARAN">PENGELUARAN</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Saldo</td>
                                    <td>:</td>
                                    <td><input type="text" name="saldo" placeholder="Saldo" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td><textarea class="form-control" name="keterangan">None</textarea></td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <button type="submit" class="btn btn-primary btn-sm pull-right"><i class="fa fa-send"></i> &nbsp; SIMPAN</button>
                                    </td>
                                </tr>
                            </table>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
