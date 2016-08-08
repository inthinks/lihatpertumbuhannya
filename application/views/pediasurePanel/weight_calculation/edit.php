<div class="contentArea">
    <div class="contentBox">
        <h1>Berat Badan &raquo; Edit ( <?php echo $weight['month'] ?> month )</h1>
        
        <div class="contentForm">
            <form method="post" enctype="multipart/form-data" action="<?php echo site_url('pediasurePanel/weight_calculation/do_edit')?>">
            <input type="hidden" id="active" name="active" value="1">
            <fieldset>
                <div class="page-wrap">
                    <div class="styled-input wide">
                        <input type="text" class="txtField" required="required" name="val1" value="<?php echo $weight['val1'] ?>"/>
                        <label>Kurang Gizi</label>
                        <span></span>
                    </div>
                    <div class="styled-input wide">
                        <input type="text" class="txtField" required="required" name="val2" value="<?php echo $weight['val2'] ?>"/>
                        <label></label>
                        <span></span>
                    </div>
                    <div class="styled-input wide">
                        <input type="text" class="txtField" required="required" name="val3" value="<?php echo $weight['val3'] ?>"/>
                        <label></label>
                        <span></span>
                    </div>
                    <div class="styled-input wide">
                        <input type="text" class="txtField" required="required" name="val4" value="<?php echo $weight['val4'] ?>"/>
                        <label>Gizi Baik</label>
                        <span></span>
                    </div>
                    <div class="styled-input wide">
                        <input type="text" class="txtField" required="required" name="val5" value="<?php echo $weight['val5'] ?>"/>
                        <label></label>
                        <span></span>
                    </div>
                    <div class="styled-input wide">
                        <input type="text" class="txtField" required="required" name="val6" value="<?php echo $weight['val6'] ?>"/>
                        <label></label>
                        <span></span>
                    </div>
                    <div class="styled-input wide">
                        <input type="text" class="txtField" required="required" name="val7" value="<?php echo $weight['val7'] ?>"/>
                        <label>Gizi Lebih</label>
                        <span></span>
                    </div>
                    <input type="hidden" value="<?php echo $id ?>" name="id"> 
                </div>
                <input type="submit" class="defBtn" value="Submit" />  <input type="button" class="defBtn" value="Back" onclick="window.location='<?php echo site_url('pediasurePanel/weight_calculation')?>';" />
            </fieldset>
            </form>
        </div>
    </div>
</div>