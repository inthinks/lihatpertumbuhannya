<div class="contentArea">
    <div class="contentBox">
        <h1>Cek Pertumbuhan</h1>
        
        <div class="contentTable">
            <table class="tablesorter" id="homeuser_table" width="100%">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="10%">User</th>
                        <th width="10%">Nama Anak</th>
                        <th width="10%">Jenis Kelamin</th>
                        <th width="10%">Tanggal Lahir</th>
                        <th width="10%">Tinggi Badan</th>
                        <th width="10%">Barat Badan</th>
                        <th width="10%">Result</th>
                        <th width="10%">Login From</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;$count=count($cek);foreach($cek as $list){?>
                        <?php if($list['result']==1){
                                $status = "Gizi buruk";
                            }else if($list['result']==2){
                                $status = "Berisiko kekurangan nutrisi";
                            }else if($list['result']==3){
                            $status = "Berisiko kekurangan nutrisi";
                            }else if($list['result']==4){
                            $status="Gizi normal";
                            }else if($list['result']==5){
                            $status="Berisiko kelebihan nutrisi";
                            }else if($list['result']==6){
                            $status="Berisiko kelebihan nutrisi";
                            }else{
                            $status="Gizi Lebih";
                            } ?>

                        <tr id="<?php echo $list['id'] ?>">
                            <td><?php echo $no;?></td>
                            <td><?php echo find('name',$list['user_id'],'user_tb') ?></td>
                            <td><?php echo $list['nama'] ?></td>
                            <td><?php if($list['jenis_kelamin']==1){ echo "Laki-laki"; }else{ echo "Perempuan"; } ?></td>
                            <td><?php echo date('d-m-Y',strtotime($list['tanggal_lahir'])) ?></td>
                            <td><?php echo $list['tinggi_badan'] ?></td>
                            <td><?php echo $list['berat_badan'] ?></td>
                            <td><?php echo $status ?></td>
                            <td><?php echo $list['login_from'] ?></td>
                        </tr>
                    <?php $no++;}?>
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
         </div>
      </div>
</div>