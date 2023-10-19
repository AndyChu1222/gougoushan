//https://www.astralweb.com.tw/css-ellipsis/
$(document).ready(function(){
    var len = 30; // 超過50個字以"..."取代
    $(".card-text").each(function(i){
        if($(this).text().length>len){
            $(this).attr("title",$(this).text());
            var text=$(this).text().substring(0,len-1)+"...";
            $(this).text(text);
        }
    });
});
