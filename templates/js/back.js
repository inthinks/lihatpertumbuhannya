$(document).ready(function(){
  $('#share').click(function(){
   //    FB.ui({
   //      method: 'feed',
   //      app_id: appId,
   //      redirect_uri: base_url,
   //      link: base_url,
   //      picture: base_url+'templates/images/img_can.png',
   //      description: 'Pediasure adalah minuman serbuk sebagai dukungan nutrisi untuk tumbuh kembang anak usia 1 - 10 tahun yang bermasalah makan dengan rasa yang lezat.'
   //    }, function(response){
   //      // Debug response (optional)
   //      if (response && !response.error_message) {
   //          alert('Posting completed.');
   //        } else {
   //          alert('Error while posting.');
   //        }
   //      console.log(response);
  	// });
      window.location = base_url+'thanks';
  });
  $('#shareTw').click(function(){
    // window.open("https://twitter.com/intent/tweet?text=Hello%20world&button_hashtag=lihatpertumbuhannya", "Twitter Share", "width=550,height=350");
    window.location = base_url+'thanks';
  });
});