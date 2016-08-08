<div class="contentArea">
    <div class="contentBox">
        <h1>Berat Badan &raquo; <?php if($gender==1){ echo"Laki-laki"; }else{ echo "Perempuan";} ?></h1>
        <a class="defBtn" href="<?php echo site_url('pediasurePanel/weight_calculation/add/'.$gender);?>"><span>Add Calculation</span></a><br>
        <select name="gender" onchange="if (this.value) window.location.href=this.value">
            <option value="<?php echo site_url('pediasurePanel/weight_calculation'); ?>" <?php if($gender==1){ echo "selected"; } ?>>Male</option>
            <option value="<?php echo site_url('pediasurePanel/weight_calculation/female'); ?>" <?php if($gender==0){ echo "selected"; } ?>>Female</option>
        </select>
        <div class="contentTable">
            <table class="tablesorter" id="homeuser_table" width="100%">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="10%">Action</th>
                        <th width="10%">Month</th>
                        <th width="10%">Kurang Gizi</th>
                        <th width="10%"></th>
                        <th width="10%"></th>
                        <th width="10%">Gizi Baik</th>
                        <th width="10%"></th>
                        <th width="10%"></th>
                        <th width="10%">Gizi Lebih</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;$count=count($weight);foreach($weight as $list){?>
                        <tr id="<?php echo $list['id'] ?>">
                            <td><?php echo $no;?></td>
                            <td>
                            <a class="fa fa-edit" title="Edit" href="<?php echo site_url('pediasurePanel/weight_calculation/edit').'/'.$list['id'];?>"></a>  |
                            <a class="fa fa-trash" title="Delete" href="<?php echo site_url('pediasurePanel/weight_calculation/delete').'/'.$list['id'];?>" onclick="return confirm('Delete?');"></a>
                            </td>
                            <td><?php echo $list['month'] ?></td>
                            <td><?php echo $list['val1'] ?></td>
                            <td><?php echo $list['val2'] ?></td>
                            <td><?php echo $list['val3'] ?></td>
                            <td><?php echo $list['val4'] ?></td>
                            <td><?php echo $list['val5'] ?></td>
                            <td><?php echo $list['val6'] ?></td>
                            <td><?php echo $list['val7'] ?></td>
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
                        <td></td>
                    </tr>
                </tfoot>
            </table>
         </div>
      </div>
</div>
