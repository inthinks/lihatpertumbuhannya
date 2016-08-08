

<div class="contentArea">
    <div class="contentBox">
        <h1>User &raquo; List</h1>
        
        <div class="contentTable">
            <table class="tablesorter" id="homeuser_table" width="100%">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="10%">Action</th>
                        <th width="10%">Name</th>
                        <th width="10%">Email</th>
                        <th width="10%">Telp</th>
                        <th width="10%">Tanggal lahir si kecil</th>
                        <th width="10%">Produk Susu</th>
                        <th width="10%">Login from</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;$count=count($user);foreach($user as $list){?>
                        <tr id="<?php echo $list['id'] ?>">
                            <td><?php echo $no;?></td>
                            <td>
                            <a class="fa fa-trash" title="Delete" href="<?php echo site_url('pediasurePanel/user/delete').'/'.$list['id'];?>" onclick="return confirm('Delete?');"></a>
                            </td>
                            <td><?php echo $list['name'] ?></td>
                            <td><?php echo $list['email'] ?></td>
                            <td><?php echo $list['telp'] ?></td>
                            <td><?php echo $list['tanggal_lahir_sikecil'] ?></td>
                            <td><?php echo $list['product_susu_yang_digunakan'] ?></td>
                            <td><?php if(!$list['tw_id']){ echo"Facebook"; }if(!$list['fb_id']){ echo"Twitter"; } ?></td>
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
                    </tr>
                </tfoot>
            </table>
         </div>
      </div>
</div>