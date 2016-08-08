<div class="content">
            <h3 class="tag">#LihatPertumbuhannya<span>Photo Gallery</span></h3>
            <div class="periodeTab">
                <a href="#" class="active">PERIODE I</a>
                <!-- <a href="#">PERIODE II</a> -->
            </div>
            <ul class="galleryWrapper grid effect-2" id="grid">
            <?php foreach ($photos as $list): ?>
            <li>
            
                
                <div class="previewBox">
                    <div class="image">
                        <img src="<?php echo base_url().'userdata/photos/'.$list['photo']; ?>" alt="">
                    </div>
                    <div class="captionWrapper">
                        <div class="caption">
                            <p><?php echo $list['caption'];?> </p>
                        </div>
                        <div class="profile">
                            <div class="profileImage">
                                <img src="<?php echo $list['profile_picture']?>" title="<?php echo $list['name']?>" alt="<?php echo $list['name']?>">
                            </div>
                            <p><b><?php echo $list['name'];?></b></p>
                        </div>
                    </div>
                </div>
            </li>
            <?php endforeach ?>
            </ul>
         
            
            
        </div>