var channelName = 'ILoveBasketballTV';
var vidWidth = '700';
var vidHeight= '400';
var results = 5;


$(document).ready(function(){
    $.get(
        "https://www.googleapis.com/youtube/v3/channels", {
            part:'contentDetails',
            forUsername:channelName,
            key:'AIzaSyBEh9gxvkMkF_SkSQcHNZAIuz2HeWVenvo'},
            function(data){
                    $.each(data.items,function(i,item){
                    var pid = item.contentDetails.relatedPlaylists.uploads;
                    getVids(pid);
            });
        }
    );
});

function getVids(pid){
    $.get(
        "https://www.googleapis.com/youtube/v3/playlistItems", {
            part:'snippet',
            fields:'items/snippet(title,resourceId)',
            maxResults:results,
            playlistId: pid,
            key:'AIzaSyBEh9gxvkMkF_SkSQcHNZAIuz2HeWVenvo'},
            function(data){
                var output;
                $.each(data.items,function(i,item){
                    title = item.snippet.title;
                    videoId = item.snippet.resourceId.videoId;
                    output = '<li><iframe height="'+vidHeight+'" width="'+vidWidth+'"src=\"//www.youtube.com/embed/'+videoId+'\"></iframe></li>';
                    $('#results').append(output);
                });
            }
         );
   }
