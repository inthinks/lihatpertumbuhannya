<?php $segment = $this->uri->segment(1); ?>
<div class="headerWrapper">
            <header>
                <div class="logo"></div>
            </header>
            <nav>
            	<a href="#" class="mobilecloseBtn">closeBtn</a>
                <ul>
                    <li><a href="<?php echo site_url('home') ?>">HOME</a></li>
                    <li><a href="<?php echo site_url('about-pediasure')?>" <?php if($segment == 'about-pediasure') echo 'class="active"';?>>ABOUT PEDIASURE</a></li>
                    <li><a href="<?php echo site_url('gallery') ?>" <?php if($segment == '1') echo 'class="active"';?>>GALLERY</a><input type="hidden" id="abc" value="true" ></li>
                    <?php if(!$this->session->userdata('user_logged_in')){ ?><li><a href="javascript:void(0)" onClick="show_signup_popup();show_value();return false;" <?php if($segment == '1') echo 'class="active"';?>>SIGN UP</a></li><?php } ?>
                    <li><a href="<?php echo site_url('terms_conditions') ?>" <?php if($segment == 'terms_conditions') echo 'class="active"';?>>T&amp;C</a></li>
                    <li><a href="<?php echo site_url('makanan-bervariasi')?>" <?php if($segment == 'makanan-bervariasi') echo 'class="active"';?>>MAKANAN BERVARIASI</a></li>
                    <?php if($this->session->userdata('user_logged_in')){ ?><li><a href="<?php echo site_url('home/logout') ?>">LOGOUT</a></li><?php } ?>
                </ul>
            </nav>
            <a href="#" class="burgerIcon"></a>
        </div>