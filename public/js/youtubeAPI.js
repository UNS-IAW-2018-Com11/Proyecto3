
$(document).ready(function(){
  var canal = 'ILoveBasketballTV';
    $.get(
        "https://www.googleapis.com/youtube/v3/channels", {
            part:'contentDetails',
            forUsername:canal,
            key:'AIzaSyBEh9gxvkMkF_SkSQcHNZAIuz2HeWVenvo'},
            function(data){
                    $.each(data.items,function(i,item){
                    var videosSubidos = item.contentDetails.relatedPlaylists.uploads;
                    getLatestVideos(videosSubidos);
            });
        }
    );
});

function getLatestVideos(videosSubidos){
  var videowidth = '700';
  var videoheight= '400';
  var cantVideos = 5;
    $.get(
        "https://www.googleapis.com/youtube/v3/playlistItems", {
            part:'snippet',
            fields:'items/snippet(title,resourceId)',
            maxResults:cantVideos,
            playlistId: videosSubidos,
            key:'AIzaSyBEh9gxvkMkF_SkSQcHNZAIuz2HeWVenvo'},
            function(data){
                var output;
                $.each(data.items,function(i,item){
                    title = item.snippet.title;
                    videoId = item.snippet.resourceId.videoId;
                    output = '<div align="center"><iframe height="'+videoheight+'" width="'+videowidth+'"src=\"//www.youtube.com/embed/'+videoId+'\"></iframe></div><hr>';
                    $('#videos').append(output);
                });
            }
         );
   }
