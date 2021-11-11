<style>
    tr{
        font-size: 13px;
    }
</style>
<div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Jurnal
                                <?php echo anchor('home/addjurnal','<i class="fa fa-plus"></i> Add New',['class'=>'btn btn-info btn-sm pull-right']); ?>
                            </h3>
                            
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Tanggal</th>
                                        <th>Uraian</th>
                                        <th>Jenis</th>
                                        <th>Status</th>
                                        <th style="text-align:center;">Saldo</th>
                                        <th style="text-align:center;" >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($jurnal->result() as $row){ ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->tanggal; ?></td>
                                            <td><?php echo $row->uraian; ?></td>
                                            <td><?php echo $row->jenis; ?></td>
                                            <td><?php echo $row->status; ?></td>
                                            <td style="text-align:right;"><?php echo"Rp. ".number_format($row->saldo,0,',','.'); ?></td>
                                            <td><?php echo anchor('home/deljurnal/'.$row->id_jurnal,'<i class="fa fa-trash"></i> Hapus',['class'=>'btn btn-danger btn-xs']); ?> &nbsp; &nbsp;<?php echo anchor('home/edtjurnal/'.$row->id_jurnal,'<i class="fa fa-edit"></i> Edit',['class'=>'btn btn-warning btn-xs']); ?></td>
                                        </tr>
                                    <?php $no++; } ?>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
