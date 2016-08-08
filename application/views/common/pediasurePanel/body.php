<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pediasure Control Panel</title>
<link href="<?php echo base_url()?>favicon.ico" rel="shortcut icon" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/css/isyscms2.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/css/fontAttachAdmin/stylesheet_cms.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/css/selectordie.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/css/redactor.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/css/jquery-ui.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<script languange="javascript">var base_url='<?php echo base_url();?>';</script>
<script type="text/javascript" src="<?php echo base_url();?>templates/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/js/admin.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/js/selectordie.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/js/redactor.js"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

</head>
<body>

	<style>
		.popupWrapper{
			width: 100%;
			height: 100%;
			position: fixed;
			top: 0;
			left: 0;
			overflow: auto;
			display: none;
		}
		#overlay{
			width: 100%;
			height: 100%;
			position: fixed;
			top: 0;
			left: 0;
			background: #000;
			opacity: 0.8;
		}
		.popupBox{
			position: absolute;
			top: 50%;
			left: 50%;
			-webkit-transform: translateX(-50%);
			-moz-transform: translateX(-50%);
			transform: translateX(-50%);
			white-space: nowrap;
			background: #fff;
			padding: 20px;
		}
	</style>        
           <?php if($this->uri->segment(2)=="login") echo '<div class="con">'?>
        <?php $this->load->view('common/pediasurePanel/header');?>
        <?php if($this->uri->segment(2)!="login"){?>
            <section>
                <?php $this->load->view('common/pediasurePanel/nav');?>
                <?php $this->load->view($content);?>
                <script type="text/javascript">window.onload = date_time('date_time')</script>
            </section>
		<?php }else{?>
       		<?php $this->load->view($content);?>
        <?php }?>
		<?php $this->load->view('common/pediasurePanel/footer');?>		
    <?php if($this->uri->segment(2)=="login") echo '</div>'?> 
		
    
<script>
$(document).ready(function(){
	$('.text_editor').redactor({
		imageUpload: '<?php echo site_url('pediasurePanel/userdata/img');?>',
		linebreaks: true ,
		buttonSource: true,
		replaceDivs: false,
		buttonsHide: ['image'],
		//buttons: buttons
	});

	
});
</script>

<?php if($this->session->flashdata('notif1')){?>
<script>
    alert('<?php echo $this->session->flashdata('notif1')?>');
</script>
<?php }?>

</body>
</html>
