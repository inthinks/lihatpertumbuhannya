<div class="content">
        	<h3 class="tag">#LihatPertumbuhannya</h3>
            <h2 class="prize">Dapatkan hadiah <b>Voucher Belanja senilai puluhan juta rupiah</b> dan <b>Grand Prize iPhone 6</b></h2>
            <div class="featureWrapper">
                <div class="featurePanel">
                <a href="#" onClick="show_signup_popup();return false;">
                    <div class="image">
                        <img src="<?php echo base_url() ?>templates/images/img_photocomp.png" alt="">
                    </div>
                </a>
                    <div class="btnContainer">
                    	<a class="clickArea" <?php if($this->session->userdata('user_logged_in')){ ?>href="<?php echo site_url('photo_competition') ?>" <?php }else{ ?>href="javascript:void(0)" onClick="show_signup_popup();return false;"<?php } ?> ></a>
                    	<div class="defBtn">PHOTO COMPETITION</div>
                    </div>
                    <p>Share foto Ibu dalam <b>mendukung pertumbuhan Si Kecil</b> & menangkan hadiah menarik dari <b>Pediasure</b></p>
                </div>
                <div class="featurePanel">
                <a class="clickArea" href="<?php echo site_url('cek_pertumbuhan') ?>">
                    <div class="image">
                        <img src="<?php echo base_url() ?>templates/images/img_cekpertumbuhan.png" alt="">
                    </div>
                </a>
                    <div class="btnContainer">
                    	<a class="clickArea" href="<?php echo site_url('cek_pertumbuhan') ?>"></a>
                    	<div class="defBtn">CEK PERTUMBUHAN SI KECIL</div>
                    </div>
                    <p>Lihat apakah <b>Si Kecil</b> sudah memiliki <b>gizi yang baik</b></p>
                </div>
            </div>
            <div style="clear:both;"></div>
        </div>
<?php 
    if($this->session->userdata('user_logged_in')){
        $name = find('name',$this->session->userdata('user_id'),'user_tb');
        $telp = find('telp',$this->session->userdata('user_id'),'user_tb');
        $email = find('email',$this->session->userdata('user_id'),'user_tb');
        $produk_susu = find('product_susu_yang_digunakan',$this->session->userdata('user_id'),'user_tb');
    }
 ?>