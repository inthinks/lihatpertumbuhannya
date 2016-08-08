<div class="contentArea">
    <div class="contentBox">
        <h1>Photo &raquo; Gallery</h1>
        
        <div class="contentTable">
            <table class="tablesorter" id="homeuser_table" width="100%">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="10%">Action</th>
                        <th width="10%">Photo</th>
                        <th width="10%">Caption</th>
                        <th width="10%">User</th>
                        <th width="10%">Submit Date</th>
                        <th width="10%">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;$count=count($photo);foreach($photo as $list){?>
                        <tr id="<?php echo $list['id'] ?>">
                            <td><?php echo $no;?></td>
                            <td>
                            <a class="fa fa-trash" title="Delete" href="<?php echo site_url('pediasurePanel/photo/delete').'/'.$list['id'];?>" onclick="return confirm('Delete?');"></a>
                            </td>
                            <td><?php if($list['photo'] != ''){ ?><img src="<?php echo base_url()."userdata/photos/".$list['photo'];?>" width="200px"><?php } ?></td>
                            <td><?php echo $list['caption'] ?></td>
                            <td><?php echo find('name',$list['user_id'],'user_tb') ?></td>
                            <td><?php echo $list['created_date'] ?></td>
                            <td>
                            <label class="switch">
                                <input type="checkbox" class="cek" data-id="<?php echo $list['id'] ?>" value="<?php echo $list['active'] ?>" <?php if($list['active']==1){echo 'checked';}?>>
                                <div class="slider round"></div>
                            </label>      
                            </td>
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
                    </tr>
                </tfoot>
            </table>
         </div>
      </div>
</div>

<script type="text/javascript">
    $('.cek').click(function(){
        var thisVal = $(this).is(':checked') ? '1' : '0';
        var thisId = $(this).data('id');
        $.ajax({
            url: "<?php echo site_url('pediasurePanel/photo/active'); ?>",
            type:'POST',
            data: 'value='+thisVal+
                    '&id='+thisId,
            success:function(data){
                console.log(data);
            }
        });
    });
</script>