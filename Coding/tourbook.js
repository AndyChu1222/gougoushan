$(document).ready(function(){
  $( "#service_cal" ).fullCalendar({ 
      locale: 'zh-tw',
      header: { // 頂部排版
        left: "prev,next", // 左邊放置上一頁、下一頁和今天
        center: "title", // 中間放置標題
        right: "month,basicWeek", // 右邊放置月、周、天
        className:"fc-title"
      },
      weekends: true, // 顯示星期六跟星期日
      displayEventTime: false,
      events: 'loadtour.php',
      eventClick: function(event, jsEvent, view) {
        $('.event-icon').html("<i class='fa fa-"+event.icon+" gray'></i>");
        $('.event-title').html("&nbsp;"+event.title);
        event.start=moment(event.start).format('YYYY/MM/DD HH:mm'); //Here using moment.js
        event.end=moment(event.end).format('YYYY/MM/DD HH:mm');
        if (event.end.indexOf(event.start.slice(5,10)) >= 0){
          event.start+=" 至 "+event.end.slice(11,18);
        }else{
          event.start+=" 至 "+event.end.slice(5,18);
        }
        $('.event-body').html(event.description+"<br><br>時間："+event.start+"<br>地點："+event.location);
        $('#modal-view-event').modal();       
      },
      eventRender: function(event, element,info) {
        if(event.icon){
          element.find(".fc-title").prepend("<i class='fa fa-"+event.icon+" gray'>&nbsp;</i>");
        }
      }
  });
});
function showdiv(id) {
     var a = document.getElementById(id);
     console.log(id);
            if (a) {
                if(id=="book"){
                  if (a.style.display == 'none') {
                      a.style.display = 'block';
                    }
                  var b = document.getElementById('showcal');
                  b.style.display = 'none';
                  var e = document.getElementById("b1");
                  var e1 = document.getElementById("s1");
                  e.classList.add("darkerbg");
                  e1.classList.remove("darkerbg");
                }
               if(id=="showcal"){
                  if (a.style.display == 'none') {
                      a.style.display = 'block';
                    }
                  var b = document.getElementById('book');
                  b.style.display = 'none';
                  var e = document.getElementById("s1");
                  var e1 = document.getElementById("b1");
                  e.classList.add("darkerbg");
                  e1.classList.remove("darkerbg");
                }
          }
}