<div class="contentArea">
    <div class="contentBox">
        <h1>Add Tinggi Badan &raquo; <?php if($gender==1){ echo"Laki-laki"; }else{ echo "Perempuan";} ?></h1>
        
        <div class="contentForm">
            <form method="post" enctype="multipart/form-data" action="<?php echo site_url('pediasurePanel/height_calculation/do_add')?>">
            <input type="hidden" id="active" name="active" value="1">
            <fieldset>
                <div class="page-wrap">
                    <div class="styled-input wide">
                        <input type="text" class="txtField" required="required" name="month" required/>
                        <label>Month</label>
                        <span></span>
                    </div>
                    <div class="styled-input wide">
                        <input type="text" class="txtField" required="required" name="val1" />
                        <label>Kurang Tinggi</label>
                        <span></span>
                    </div>
                    <div class="styled-input wide">
                        <input type="text" class="txtField" required="required" name="val2" />
                        <label></label>
                        <span></span>
                    </div>
                    <div class="styled-input wide">
                        <input type="text" class="txtField" required="required" name="val3" />
                        <label></label>
                        <span></span>
                    </div>
                    <div class="styled-input wide">
                        <input type="text" class="txtField" required="required" name="val4" />
                        <label>Tinggi Baik</label>
                        <span></span>
                    </div>
                    <div class="styled-input wide">
                        <input type="text" class="txtField" required="required" name="val5" />
                        <label></label>
                        <span></span>
                    </div>
                    <div class="styled-input wide">
                        <input type="text" class="txtField" required="required" name="val6" />
                        <label></label>
                        <span></span>
                    </div>
                    <div class="styled-input wide">
                        <input type="text" class="txtField" required="required" name="val7" />
                        <label>Tinggi Lebih</label>
                        <span></span>
                    </div>
                    <input type="hidden" name="gender" value="<?php echo $gender ?>">
                </div>
                <input type="submit" class="defBtn" value="Submit" />  <input type="button" class="defBtn" value="Back" onclick="window.location='<?php echo site_url('pediasurePanel/height_calculation')?>';" />
            </fieldset>
            </form>
        </div>
    </div>
</div>