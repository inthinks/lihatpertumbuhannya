<div class="content">
            <h3 class="tag">#LihatPertumbuhannya</h3>
            <div class="featureWrapper">
                <div class="previewBox">
                    <div class="image">
                        <img src="<?php echo base_url().'userdata/photos/'./*$photo['photo']*/$this->session->userdata('img') ?>" alt="">
                    </div>
                    <div class="captionWrapper">
                        <div class="caption">
                            <p><?php echo $this->session->userdata('caption')?></p>
                        </div>
                        <div class="profile">
                            <div class="profileImage">
                                <img src="<?php echo $user['profile_picture']?>" title="<?php echo $user['name']?>" alt="<?php echo $user['name']?>">
                            </div>
                            <p><b><?php echo $user['name']?></b></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btnContainer">
                <div class="twoButton">
                    <a class="clickArea" href="<?php echo base_url('photo_competition')?>"></a>
                    <div class="defBtn">EDIT</div>
                </div>
                <div class="twoButton">
                    <a class="clickArea" href="javascript:void(0);" id="share"></a>
                    <div class="defBtn">SUBMIT</div>
                </div>
            </div>
        </div>