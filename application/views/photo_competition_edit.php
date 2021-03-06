<div class="content">
        	<h3 class="tag">#LihatPertumbuhannya</h3>
                <div class="periode">
                <h2><b>Periode I : “Kreasi Hidangan Bervariasi Untuk Si Kecil”</b></h2>
                <p><b>Posting foto kreasi makanan sehat</b> buatan Ibu untuk <b>Si Kecil</b> dan <b>tulis caption</b> tentang kemajuan pertumbuhan mereka</p>
            </div>
            <div class="featureWrapper">
                <div class="featurePanel">
                	<div class="uploadBtn">
                        <div class="dropzoneBox">
                            <form action="<?php echo base_url() ?>userdata/photos/" class="dropzone" id="uploadFoto"></form>
                        </div>
                    </div>
                </div>
                
                <div class="featurePanel">
                <form action="<?php echo site_url('photo_competition/do_post')?>" method="post" id="form_competition">
                    <div class="uploadData">
                    	<div class="input">
                        	<p><b>Caption :</b></p>
                            
                                <textarea name="caption" id="caption"><?php echo $this->session->userdata('caption')?></textarea>
                                <input type="hidden" name="token" id="token" value="<?php echo $photo['token']?>"/>
                   
							<p>#LihatPertumbuhannya</p>
                        </div>
                    </div>
                    </form>
                </div>
                
                <div style="clear:both;"></div>
            </div>
            <div style="clear:both;"></div>
            <div class="btnContainer">
                <a class="clickArea" href="javascript:void(0);"id="submit"></a>
                <div class="defBtn" >POST</div>
            </div>
            
        </div>

<script>
var sess = '<?php echo $this->session->userdata("img")?>' ;
var imgUrl = '<?php echo base_url()."userdata/photos/"; ?>'+sess;
var size = '<?php echo filesize(FCPATH."userdata/photos/".$this->session->userdata("img")); ?>';
Dropzone.options.uploadFoto = {
    url:"<?php echo site_url('photo_competition/upload') ?>",
    dictDefaultMessage: "",
    method:"post",
    paramName:'image',
    addRemoveLinks: true,
    thumbnailWidth: 100,
    thumbnailHeight: 100,
    acceptedFiles: ".jpg, .png, .jpeg",
    maxFiles: 1,
    init: function() {
        if(sess){
            var myDropzone = this;
            var mockFile = { name: sess, size: size };

            // Call the default addedfile event handler
            myDropzone.emit("addedfile", mockFile);

            // And optionally show the thumbnail of the file:
            myDropzone.emit("thumbnail", mockFile, imgUrl);
            // Or if the file on your server is not yet in the right
            // size, you can let Dropzone download and resize it
            // callback and crossOrigin are optional.
            //myDropzone.createThumbnailFromUrl(file, imgUrl, callback, crossOrigin);

            // Make sure that there is no progress bar, etc...
            myDropzone.emit("complete", mockFile);
        }

        this.on("error", function(file){
            if (!file.accepted) this.removeFile(file);
        });
        
        this.on("success", function(file, response) {
            var obj = jQuery.parseJSON(response);
            file.serverId = obj['id'];
        });

        this.on("sending",function(a,b,c){
            a.token=Math.random();
            $('#token').val(a.token);
            c.append("token",a.token); //Menmpersiapkan token untuk masing masing foto
        });

        this.on("removedfile", function(a){
            var token=$('#token').val();
            // alert(token);
            $('#token').val('');
                $.ajax({
                type:"post",
                data:{token:token},
                url:"<?php echo base_url('photo_competition/remove_foto') ?>",
                cache:false,
                dataType: 'json',
                success: function(){
                    console.log("Foto terhapus");
                    token = '';
                    
                },
                error: function(){
                    console.log("Error");

                }
            });
        });
    }
};

$('#submit').click(function(){
    if($('#token').val() == '' || $('#caption').val() == '' ){
        alert('silahkan lengkapi!');
        return false;
    } else {
        $('#form_competition').submit();
    }

})
</script>