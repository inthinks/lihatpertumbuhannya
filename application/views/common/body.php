<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"/>
<title>Pediasure | Makanan Bervariasi</title>
<meta property="og:url"                content="<?php echo base_url() ?>about-pediasure" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="Lihat pertumbuhan nya!" />
<meta property="og:description"        content="DUKUNGAN NUTRISI UNTUK ANAK YANG BERMASALAH MAKAN" />
<meta property="og:image"              content="<?php echo base_url()?>templates/images/img_can.png" />
<meta name="viewport" content="target-densitydpi=device-dpi; width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
<meta name="HandheldFriendly" content="true" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>templates/css/dropzone.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>templates/css/selectordie.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>templates/css/fontAttach/fontattach.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>templates/css/pediasure.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>templates/css/grid.css">
<script type="text/javascript" src="<?php echo base_url()?>templates/js/dropzone.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>templates/js/jquery-3.0.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>templates/js/back.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>templates/js/moment.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>templates/js/combodate.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>templates/js/selectordie.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>templates/js/main.js"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-81353715-1', 'auto');
  ga('send', 'pageview');

</script>

<script>
  var e = document.createElement("script");
  e.async = true;
  e.src = "https://ad.atdmt.com/m/a.js;m=11252201374656;cache=" + Math.random();
  var s = document.getElementsByTagName("script")[0];
  s.parentNode.insertBefore(e, s);
</script>
<noscript>
<iframe
  style="display:none;"
  src="https://ad.atdmt.com/m/a.html;m=11252201374656;noscript=1">
</iframe>
</noscript>

</head>
<?php $segment = $this->uri->segment(1)=='about-pediasure' ? 'about' : '' ?>
<body>
	<div class="wrapper <?php echo $segment; ?>" >
		<?php $this->load->view('common/header'); ?>
		<?php $this->load->view($content); ?>
		<?php $this->load->view('common/footer'); ?>
<script>
var base_url = '<?php echo base_url(); ?>';
var appId = '<?php echo APP_ID; ?>';
window.fbAsyncInit = function() {
    FB.init({
      appId      : <?php echo APP_ID?>,
      xfbml      : true,
      version    : 'v2.5'
    });
  };

(function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

$(document).ready(function() {
    $('.facebook_login').click(function(e){
      e.preventDefault();
    //checkLoginState();
      facebookLogin();
  });

  $(".twitter_login").click(function(e){
      e.preventDefault();
    twitter_login();
  });
});

function checkLoginState() {
<?php 

$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
$Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
$webOS   = stripos($_SERVER['HTTP_USER_AGENT'],"webOS");
$chrome   = stripos($_SERVER['HTTP_USER_AGENT'],"Chrome");
$crios   = stripos($_SERVER['HTTP_USER_AGENT'],"crios");

if( ($iPod || $iPhone ) && ($crios || $chrome)){?>
  alert("Facebook login is disabled for Chrome IOS. Please use safari to continue");
<?php }else{?>
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
<?php }?>
  }

function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      facebookLogin();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
    FB.login();
      console.log( 'Please log ' +
        'into this app.');
    facebookLogin();
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
    //FB.login();
      console.log( 'Please log ' +
        'into Facebook.');
    facebookLogin();
    }
  }

function facebookLogin() {
        FB.login(function(response) {
            if (response.authResponse) {

                var token=response.authResponse.accessToken;
                FB.api('/me?fields=email,name', function(response) {
    
          $.ajax({
            type: "POST",
            url: '<?php echo site_url('login/fb/');?>',
            data: {
              name : response.name,
              email:response.email,
              facebook_id:response.id,
              data_facebook:response,
              token:token
            },
            dataType:"JSON",
            success: function(data){
              //alert(JSON.stringify(data));
              if($('#abc').val()=='false'){
                if(data.name && data.email && data.telp && data.tanggal && data.produk_susu){
                  location.reload();
                }
              }
              else{
                if(data.name && data.email && data.telp && data.tanggal && data.produk_susu){
                window.location='<?php echo site_url('photo_competition')?>';
                }
                  
              }

              show_signup2_popup();
              $( "#nama" ).attr( "value", data.name );
              $( "#email" ).attr( "value", data.email );
              $( "#telp" ).attr( "value", data.telp );
              $( "#date" ).attr( "value", data.tanggal );
              $( "#produk_susu" ).attr( "value", data.produk_susu );

                $("select").selectOrDie('destroy');
                $('#date').combodate({
                  firstItem: 'none',
                  minYear: 2006,
                  maxYear: 2016
                });  
                $("select").selectOrDie({
                  size: 8,
                  customClass: 'popupDropdown'
                });  
            
              //popup_register();
                            //else
              //window.location='<?php echo site_url('home')?>';
            }
          });//ajax
        
        });//fb.api
            }
        },{scope: 'public_profile,email'});
    }

function twitter_login(){
  var url_to_open='<?php echo site_url('twit_login')?>';
  var width = 900; 
  var height = 550;
  var left = parseInt((screen.availWidth/2) - (width/2));
  var top = parseInt((screen.availHeight/2) - (height/2));
  twit_window=window.open(url_to_open, "Twitter Login", 'height=350,width=700,left=' + left + ',top=' + top + ',screenX=' + left + ',screenY=' + top);
  //show_signup2_popup();
}

function success_twitter(){
  twit_window.close();
  $.ajax({
            url: '<?php echo site_url('twit_login/get_data');?>',
            dataType:"JSON",
            success: function(data){
              //alert(JSON.stringify(data));
              if($('#abc').val()=='false'){
                if(data.nama && data.email && data.telp && data.tanggal && data.produk){
                  location.reload();
                
                }
              }
              else{
                if(data.nama && data.email && data.telp && data.tanggal && data.produk){
                window.location='<?php echo site_url('photo_competition')?>';
                }
              }

              if(data.status == 1){
                $( "#nama" ).attr( "value", data.nama );
                $( "#email" ).attr( "value", data.email );
                $( "#telp" ).attr( "value", data.telp );
                $( "#date" ).attr( "value", data.tanggal );
                $( "#produk_susu" ).attr( "value", data.produk );
              }
              else{
                $( "#nama" ).attr( "value", data.nama );
              }
            }
        });

  show_signup2_popup();
              $("select").selectOrDie('destroy');
                $('#date').combodate({
                  firstItem: 'none',
                  minYear: 2006,
                  maxYear: 2016
                });  
                $("select").selectOrDie({
                  size: 8,
                  customClass: 'popupDropdown'
                });
   // popup_register();
}

$("#submit").click(function() {
        $("#jenis").val($("#gender").val());
        $("#formID").submit();
    });
$("select").selectOrDie('destroy');
</script>

<?php if($this->session->flashdata('notif')){?>
<script>
    alert('<?php echo $this->session->flashdata('notif')?>');
</script>
<?php }?>
</body>

</html>

