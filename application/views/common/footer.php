<footer>
	<div class="footerWrapper">
        <img class="footerRibbon" src="<?php echo base_url()?>templates/images/img_footerribbon.png" alt="">
        <img class="footercanCaption" src="<?php echo base_url()?>templates/images/img_footercancaption.png" alt="">
    </div>
</footer>

<div class="popupWrapper">
        <div class="overlay" onClick="hide_popup();"></div>
        <div class="popupBox">
            <div class="popup" id="signupPopup">
                <a href="#" class="closeBtn" onClick="hide_popup();">x</a>
                <div class="popupContent">
                    <a href="javascript:void(0)" class="defBtn fb facebook_login">Sign up with Facebook</a>
                    <a href="javascript:void(0)" class="defBtn twit twitter_login">Sign up with Twitter</a>
                </div>
            </div>
            <div class="popup" id="signupPopup2">
                <a href="#" class="closeBtn" onClick="hide_popup();">x</a>
                <div class="popupContent">
                    <div class="joinForm">
                        <h3>#LihatPertumbuhannya</h3>
                        <form method="post" action="<?php echo site_url('register/register') ?>" id="formID5">
                        <table>
                            
                            <tr>
                                <td><b>Nama Ibu</b></td>
                                <td><input type="text" name="nama" id="nama" ></td>
                            </tr>
                            <tr>
                                <td><b>E-mail</b></td>
                                <td><input type="text" name="email" id="email"></td>
                            </tr>
                            <tr>
                                <td><b>No. Telp</b><input type="hidden" id="a" name="a" value="true"/></td>

                                <td><input type="text" id="telp" name="telp"></td>
                            </tr>
                            
                            <tr>
                                <td><b>Tanggal lahir Si Kecil</b></td>
                                <td><input id="date" data-format="DD-MM-YYYY" data-template="DD MM YYYY" name="tanggal_lahir" value="01-01-2006" type="text"></td>
                            </tr>
                            <tr>
                                <td><b>Produk susu yang digunakan</b></td>
                                <td><input type="text" id="produk_susu" name="produk_susu"></td>
                            </tr>

                        </table>
                        </form>
                        <div class="termsCondition">
                            <input type="radio" id="SK"><label for="SK"><span></span>Saya setuju dengan <a href="<?php echo site_url('terms_conditions') ?>" target="_blank"><u>syarat dan ketentuan</u></a> berlaku</label>
                            <a href="#" class="disclaimer">Disclaimer</a>
                            <div class="disclaimerContent">
                            	<p>
                                	Saya mengakui dan menyetujui bahwa Abbott, beserta afiliasinya, kontraktor/sub-kontraktor, baik lokal maupun luar negeri, berwenang untuk mengumpulkan, menggunakan, memindahkan, memproses, dan mengungkapkan informasi pribadi apapun yang telah saya berikan (yang mungkin termasuk serta tidak terbatas pada informasi terkait soal kesehatan dll) di (masukkan alamat portal Pediasure) sesuai dengan kebijakan privasi Abbott yang bisa diakses di sini: https://abbott.co.id/privacy-policy.
									<br><br>
                                    Saya setuju untuk dihubungi melalui telepon, menerima email dan/atau pesan teks seluler dari Abbott, afiliasinya, kontraktor/sub-kontraktor yang terkait dengan program Abbott, baik itu produk dan/atau jasa. Saya memahami bahwa saya bisa berhenti berlangganan kapan saja dalam bentuk dan cara yang telah ditunjukkan oleh Abbott.
                                </p>
                            </div>

                        </div>
                        <div class="btnContainer">
                            <a class="clickArea" href="javascript:void(0)" id="submit5"></a>
                            <div class="defBtn">JOIN</div>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
	</div>
    <script type="text/javascript" src="<?php echo base_url()?>templates/js/modernizr.custom.js"></script>    
    <script type="text/javascript" src="<?php echo base_url()?>templates/js/masonry.pkgd.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>templates/js/imagesloaded.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>templates/js/classie.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>templates/js/AnimOnScroll.js"></script>
    <script>
    new AnimOnScroll( document.getElementById( 'grid' ), {
        minDuration : 0.4,
        maxDuration : 0.7,
        viewportFactor : 0.2
    } );
    </script>


<script>

$(document).ready(function(){
    $("#submit5").click(function() {
        var nama = $('#nama').val();
        var telp = $('#telp').val();
        var email = $('#email').val();
        var date = $('#date').val();
        var produk_susu = $('#produk_susu').val();
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 

        if(telp==''){
            alert('No.telp harus diisi');
            return false;
        }
        if(nama==''){
            alert('Nama harus diisi');
            return false;
        }
        if(email==''){
            alert('Email harus diisi');
            return false;
        }
        if(produk_susu==''){
            alert('Produk susu yang digunakan harus diisi');
            return false;
        }
        if (!mailformat.test(email)){ 
            alert('Format email salah');
            return false;
        }
        if(isNaN(telp)){
            alert('No.telp harus angka');
            return false;
        }
        if(!$('#SK:checked').val()){
            alert('Tolong check syarat dan ketentuan');
            return false;
        }
        else{
            $("#formID5").submit();
        }
    });
});
</script>