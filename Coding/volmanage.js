window.onload = function () {
	//讓他編輯完之後可以直接show貓狗icon那塊
	var check1=localStorage.getItem("cnt");
	//console.log(check1);
	if (check1 == 1){
		showdiv('apply');
		localStorage.setItem("cnt",0);
	}
	//讓他更新完密碼之後可以直接show我的基本資料那塊
	var check2=localStorage.getItem("cnt2");
	console.log(check2);
	if (check2 == 1){
		showdiv('mydata');
		localStorage.setItem("cnt2",0);
	}
};
function checksex(s){ //自動勾選性別
	if (s=='男'){
		document.getElementById("iboy").checked=true;
	}else{
		document.getElementById("igirl").checked=true;
	}
}
function  checkjob(j) {
	var select=document.getElementById("iJob");
	switch (j){
		case '工商人士':
				select.options[1].setAttribute('selected', true);
				break;
		case '軍公教人員':
				select.options[2].setAttribute('selected', true);
				break;
		case '退休人員':
				select.options[3].setAttribute('selected', true);
				break;
		case '家管':
				select.options[4].setAttribute('selected', true);
				break;
		case '學生':
				select.options[5].setAttribute('selected', true);
				break;
		case '其他':
				select.options[6].setAttribute('selected', true);
				break;
		default:
				select.options[0].setAttribute('selected', true);
	}
}
function showdiv(id) {
		      var a = document.getElementById(id);
		      console.log(id);
		      if (a) {
		      	if(id=="mydata"){
		      		if (a.style.display == 'none') {
		              a.style.display = 'block';
		          	}
		          	var b = document.getElementById('join');
		          	b.style.display = 'none';
		          	var c = document.getElementById('apply');
		          	c.style.display = 'none';
		          	var e = document.getElementById("m1");
  					var e1 = document.getElementById("j1");
  					var e2 = document.getElementById("a1");
  					e.classList.add("darkerbg");
  					e1.classList.remove("darkerbg");
  					e2.classList.remove("darkerbg");
		      	}
		       if(id=="join"){
		      		if (a.style.display == 'none') {
		              a.style.display = 'block';
		          	}
		          	var b = document.getElementById('mydata');
		          	b.style.display = 'none';
		          	var c = document.getElementById('apply');
		          	c.style.display = 'none';
		          	var e = document.getElementById("j1");
  					var e1 = document.getElementById("m1");
  					var e2 = document.getElementById("a1");
  					e.classList.add("darkerbg");
  					e1.classList.remove("darkerbg");
  					e2.classList.remove("darkerbg");
		      	}
		      	if(id=="apply"){
		      		if (a.style.display == 'none') {
		              a.style.display = 'block';
		          	}
		          	var b = document.getElementById('join');
		          	b.style.display = 'none';
		          	var c = document.getElementById('mydata');
		          	c.style.display = 'none';
		          	var e = document.getElementById("a1");
  					var e1 = document.getElementById("j1");
  					var e2 = document.getElementById("m1");
  					e.classList.add("darkerbg");
  					e1.classList.remove("darkerbg");
  					e2.classList.remove("darkerbg");
		      	}
		      }
}
function checkKnow(t) {
	//console.log(t);
	if (t.toString().indexOf('親友介紹')>=0){
		let box=document.getElementById("k1")
		box.checked=true;
	}
	if (t.toString().indexOf('網路得知')>=0){
		let box=document.getElementById("k2")
		box.checked=true;
	}
	if (t.toString().indexOf('攤位得知')>=0){
		let box=document.getElementById("k3")
		box.checked=true;
	}
}
function checkSpe(t) {
	//console.log(t);
	if (t.toString().indexOf('設備裝修')>=0){
		let box=document.getElementById("s1")
		box.checked=true;
	}
	if (t.toString().indexOf('園藝造景')>=0){
		let box=document.getElementById("s2")
		box.checked=true;
	}
	if (t.toString().indexOf('環境清潔')>=0){
		let box=document.getElementById("s3")
		box.checked=true;
	}
	if (t.toString().indexOf('毛孩照顧')>=0){
		let box=document.getElementById("s4")
		box.checked=true;
	}
	if (t.toString().indexOf('資訊小編')>=0){
		let box=document.getElementById("s5")
		box.checked=true;
	}
	if (t.toString().indexOf('行銷宣傳')>=0){
		let box=document.getElementById("s6")
		box.checked=true;
	}
	if (t.toString().indexOf('商品設計')>=0){
		let box=document.getElementById("s7")
		box.checked=true;
	}
}
function checkRea(t) {
	//console.log(t);
	if (t.toString().indexOf('樂於幫助')>=0){
		let box=document.getElementById("r1")
		box.checked=true;
	}
	if (t.toString().indexOf('喜愛毛孩')>=0){
		let box=document.getElementById("r2")
		box.checked=true;
	}
	if (t.toString().indexOf('親友邀請')>=0){
		let box=document.getElementById("r3")
		box.checked=true;
	}
	if (t.toString().indexOf('課業需求')>=0){
		let box=document.getElementById("r4")
		box.checked=true;
	}
	if (t.toString().indexOf('工作需求')>=0){
		let box=document.getElementById("r5")
		box.checked=true;
	}
	if (t.toString().indexOf('其他')>=0){
		let box=document.getElementById("r6")
		box.checked=true;
	}
}
function showgamicon(x){
		if (x.toString().indexOf('1')>=0){
			document.getElementById('thAm1').innerHTML="<img src='pic/icon_dog.png' alt='icon_dog' style='width:1rem;'>";}
		if (x.toString().indexOf('2')>=0){
			document.getElementById('thAm2').innerHTML="<img src='pic/icon_dog.png' alt='icon_dog' style='width:1rem;'>";}
		if (x.toString().indexOf('3')>=0){
			document.getElementById('thAm3').innerHTML="<img src='pic/icon_dog.png' alt='icon_dog' style='width:1rem;'>";}
		if (x.toString().indexOf('4')>=0){
			document.getElementById('thAm4').innerHTML="<img src='pic/icon_dog.png' alt='icon_dog' style='width:1rem;'>";}
		if (x.toString().indexOf('5')>=0){
			document.getElementById('thAm5').innerHTML="<img src='pic/icon_dog.png' alt='icon_dog' style='width:1rem;'>";}
		if (x.toString().indexOf('6')>=0){
			document.getElementById('thAm6').innerHTML="<img src='pic/icon_dog.png' alt='icon_dog' style='width:1rem;'>";}
		if (x.toString().indexOf('7')>=0){
			document.getElementById('thAm7').innerHTML="<img src='pic/icon_dog.png' alt='icon_dog' style='width:1rem;'>";}
}
function showgpmicon(x){
		if (x.toString().indexOf('1')>=0){
			document.getElementById('thPm1').innerHTML="<img src='pic/icon_dog.png' alt='icon_dog' style='width:1rem;'>";}
		if (x.toString().indexOf('2')>=0){
			document.getElementById('thPm2').innerHTML="<img src='pic/icon_dog.png' alt='icon_dog' style='width:1rem;'>";}
		if (x.toString().indexOf('3')>=0){
			document.getElementById('thPm3').innerHTML="<img src='pic/icon_dog.png' alt='icon_dog' style='width:1rem;'>";}
		if (x.toString().indexOf('4')>=0){
			document.getElementById('thPm4').innerHTML="<img src='pic/icon_dog.png' alt='icon_dog' style='width:1rem;'>";}
		if (x.toString().indexOf('5')>=0){
			document.getElementById('thPm5').innerHTML="<img src='pic/icon_dog.png' alt='icon_dog' style='width:1rem;'>";}
		if (x.toString().indexOf('6')>=0){
			document.getElementById('thPm6').innerHTML="<img src='pic/icon_dog.png' alt='icon_dog' style='width:1rem;'>";}
		if (x.toString().indexOf('7')>=0){
			document.getElementById('thPm7').innerHTML="<img src='pic/icon_dog.png' alt='icon_dog' style='width:1rem;'>";}
}
function showcamicon(x){
		if (x.toString().indexOf('1')>=0){
			document.getElementById('thAm1').innerHTML="<img src='pic/icon_cat.png' alt='icon_cat' style='width:1rem;'>";}
		if (x.toString().indexOf('2')>=0){
			document.getElementById('thAm2').innerHTML="<img src='pic/icon_cat.png' alt='icon_cat' style='width:1rem;'>";}
		if (x.toString().indexOf('3')>=0){
			document.getElementById('thAm3').innerHTML="<img src='pic/icon_cat.png' alt='icon_cat' style='width:1rem;'>";}
		if (x.toString().indexOf('4')>=0){
			document.getElementById('thAm4').innerHTML="<img src='pic/icon_cat.png' alt='icon_cat' style='width:1rem;'>";}
		if (x.toString().indexOf('5')>=0){
			document.getElementById('thAm5').innerHTML="<img src='pic/icon_cat.png' alt='icon_cat' style='width:1rem;'>";}
		if (x.toString().indexOf('6')>=0){
			document.getElementById('thAm6').innerHTML="<img src='pic/icon_cat.png' alt='icon_cat' style='width:1rem;'>";}
		if (x.toString().indexOf('7')>=0){
			document.getElementById('thAm7').innerHTML="<img src='pic/icon_cat.png' alt='icon_cat' style='width:1rem;'>";}
}
function showcpmicon(x){
		if (x.toString().indexOf('1')>=0){
			document.getElementById('thPm1').innerHTML="<img src='pic/icon_cat.png' alt='icon_cat' style='width:1rem;'>";}
		if (x.toString().indexOf('2')>=0){
			document.getElementById('thPm2').innerHTML="<img src='pic/icon_cat.png' alt='icon_cat' style='width:1rem;'>";}
		if (x.toString().indexOf('3')>=0){
			document.getElementById('thPm3').innerHTML="<img src='pic/icon_cat.png' alt='icon_cat' style='width:1rem;'>";}
		if (x.toString().indexOf('4')>=0){
			document.getElementById('thPm4').innerHTML="<img src='pic/icon_cat.png' alt='icon_cat' style='width:1rem;'>";}
		if (x.toString().indexOf('5')>=0){
			document.getElementById('thPm5').innerHTML="<img src='pic/icon_cat.png' alt='icon_cat' style='width:1rem;'>";}
		if (x.toString().indexOf('6')>=0){
			document.getElementById('thPm6').innerHTML="<img src='pic/icon_cat.png' alt='icon_cat' style='width:1rem;'>";}
		if (x.toString().indexOf('7')>=0){
			document.getElementById('thPm7').innerHTML="<img src='pic/icon_cat.png' alt='icon_cat' style='width:1rem;'>";}
}
function checkGam(t) {
	//console.log(t);
	if (t.toString().indexOf('1')>=0){
		let box=document.getElementById("d1");
		box.checked=true;
	}
	if (t.toString().indexOf('2')>=0){
		let box=document.getElementById("d2")
		box.checked=true;
	}
	if (t.toString().indexOf('3')>=0){
		let box=document.getElementById("d3")
		box.checked=true;
	}
	if (t.toString().indexOf('4')>=0){
		let box=document.getElementById("d4")
		box.checked=true;
	}
	if (t.toString().indexOf('5')>=0){
		let box=document.getElementById("d5")
		box.checked=true;
	}
	if (t.toString().indexOf('6')>=0){
		let box=document.getElementById("d6")
		box.checked=true;
	}
	if (t.toString().indexOf('7')>=0){
		let box=document.getElementById("d7")
		box.checked=true;
	}
}
function checkGpm(t) {
	//console.log(t);
	if (t.toString().indexOf('1')>=0){
		let box=document.getElementById("d1-2");
		box.checked=true;
	}
	if (t.toString().indexOf('2')>=0){
		let box=document.getElementById("d2-2")
		box.checked=true;
	}
	if (t.toString().indexOf('3')>=0){
		let box=document.getElementById("d3-2")
		box.checked=true;
	}
	if (t.toString().indexOf('4')>=0){
		let box=document.getElementById("d4-2")
		box.checked=true;
	}
	if (t.toString().indexOf('5')>=0){
		let box=document.getElementById("d5-2")
		box.checked=true;
	}
	if (t.toString().indexOf('6')>=0){
		let box=document.getElementById("d6-2")
		box.checked=true;
	}
	if (t.toString().indexOf('7')>=0){
		let box=document.getElementById("d7-2")
		box.checked=true;
	}
}
function checkCam(t) {
	//console.log(t);
	if (t.toString().indexOf('1')>=0){
		let box=document.getElementById("c1");
		box.checked=true;
	}
	if (t.toString().indexOf('2')>=0){
		let box=document.getElementById("c2")
		box.checked=true;
	}
	if (t.toString().indexOf('3')>=0){
		let box=document.getElementById("c3")
		box.checked=true;
	}
	if (t.toString().indexOf('4')>=0){
		let box=document.getElementById("c4")
		box.checked=true;
	}
	if (t.toString().indexOf('5')>=0){
		let box=document.getElementById("c5")
		box.checked=true;
	}
	if (t.toString().indexOf('6')>=0){
		let box=document.getElementById("c6")
		box.checked=true;
	}
	if (t.toString().indexOf('7')>=0){
		let box=document.getElementById("c7")
		box.checked=true;
	}
}
function checkCpm(t) {
	//console.log(t);
	if (t.toString().indexOf('1')>=0){
		let box=document.getElementById("c1-2");
		box.checked=true;
	}
	if (t.toString().indexOf('2')>=0){
		let box=document.getElementById("c2-2")
		box.checked=true;
	}
	if (t.toString().indexOf('3')>=0){
		let box=document.getElementById("c3-2")
		box.checked=true;
	}
	if (t.toString().indexOf('4')>=0){
		let box=document.getElementById("c4-2")
		box.checked=true;
	}
	if (t.toString().indexOf('5')>=0){
		let box=document.getElementById("c5-2")
		box.checked=true;
	}
	if (t.toString().indexOf('6')>=0){
		let box=document.getElementById("c6-2")
		box.checked=true;
	}
	if (t.toString().indexOf('7')>=0){
		let box=document.getElementById("c7-2")
		box.checked=true;
	}
}
$(document).ready(function(){    
	$('#PwdId, #cPwdId').on('keyup', function () { //檢查兩密碼是否相等
        if ($('#PwdId').val() != '' && $('#cPwdId').val() != '' && $('#PwdId').val() == $('#cPwdId').val()) {
          $("#submitBtn").attr("disabled",false);
          $('#cPwdValid').show();
          $('#cPwdInvalid').hide();
          $('.pwds').removeClass('is-invalid');
        } else {
          $("#submitBtn").attr("disabled",true);
          $('#cPwdValid').hide();
          $('#cPwdInvalid').show();
          $('#cPwdInvalid').html('密碼須一致。').css('color', '#E00000');
          $('.pwds').addClass('is-invalid');
        }
  });
  $(".dropfrom").click(function(){
    $(".drophere").toggle();
  });
  $(".dropfrom2").click(function(){
    $(".drophere2").toggle();
  });
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
      events: 'load.php',
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
		    $('.event-num').html("需求人數："+event.peoNum+"<input type='hidden' name='vjid' value='"+event.vjid+"'>");
		    var v = localStorage.getItem("vjlist");
				console.log(v);
		    if(event.peoNum==0){
		    	$('.event-num').append("<span>（已額滿）</span>");
		    	$('#sub1').prop('disabled',true);
		    	$('#sub1').css('cursor','default');
		    	$('#sub1').css('background-color','gray');$('#sub1').css('border-color','gray');
		    	$('#sub1').html('期待下次與您相見~');
		    }else if(v.toString().indexOf(event.vjid.toString())>=0){
		    	$('#sub1').prop('disabled',true);
		    	$('#sub1').css('cursor','default');
		    	$('#sub1').css('background-color','#9c3726');$('#sub1').css('border-color','#9c3726');
		    	$('#sub1').html('感謝您的參與！');
		    }else{
		    	$('#sub1').prop('disabled',false);
		    	$('#sub1').css('cursor','pointer');
		    	$('#sub1').css('background-color','green');$('#sub1').css('border-color','green');
		    	$('#sub1').html('我願意加入！');
		    }
		    $('#modal-view-event').modal();		    
      },
      eventRender: function(event, element,info) {
        if(event.icon){
          element.find(".fc-title").prepend("<i class='fa fa-"+event.icon+" gray'>&nbsp;</i>");
        }
      }
  });
  //-------------------------------------------狗場上午
  $("#d1").click(function() {
  	   if($("#d1").prop("checked")){
		   $("#c1").attr("disabled","disabled");
	   }else{
	   	   $("#c1").removeAttr("disabled");
	   }	
  });
  $("#d2").click(function() {
  	   if($("#d2").prop("checked")){
		   $("#c2").attr("disabled","disabled");
	   }else{
	   	   $("#c2").removeAttr("disabled");
	   }	
  });
  $("#d3").click(function() {
  	   if($("#d3").prop("checked")){
		   $("#c3").attr("disabled","disabled");
	   }else{
	   	   $("#c3").removeAttr("disabled");
	   }	
  });
  $("#d4").click(function() {
  	   if($("#d4").prop("checked")){
		   $("#c4").attr("disabled","disabled");
	   }else{
	   	   $("#c4").removeAttr("disabled");
	   }	
  });
  $("#d5").click(function() {
  	   if($("#d5").prop("checked")){
		   $("#c5").attr("disabled","disabled");
	   }else{
	   	   $("#c5").removeAttr("disabled");
	   }	
  });
  $("#d6").click(function() {
  	   if($("#d6").prop("checked")){
		   $("#c6").attr("disabled","disabled");
	   }else{
	   	   $("#c6").removeAttr("disabled");
	   }	
  });
  $("#d7").click(function() {
  	   if($("#d7").prop("checked")){
		   $("#c7").attr("disabled","disabled");
	   }else{
	   	   $("#c7").removeAttr("disabled");
	   }	
  });
  //---------------------------------------狗場下午
  $("#d1-2").click(function() {
  	   if($("#d1-2").prop("checked")){
		   $("#c1-2").attr("disabled","disabled");
	   }else{
	   	   $("#c1-2").removeAttr("disabled");
	   }	
  });
   $("#d2-2").click(function() {
  	   if($("#d2-2").prop("checked")){
		   $("#c2-2").attr("disabled","disabled");
	   }else{
	   	   $("#c2-2").removeAttr("disabled");
	   }	
  });
  $("#d3-2").click(function() {
  	   if($("#d3-2").prop("checked")){
		   $("#c3-2").attr("disabled","disabled");
	   }else{
	   	   $("#c3-2").removeAttr("disabled");
	   }	
  });
  $("#d4-2").click(function() {
  	   if($("#d4-2").prop("checked")){
		   $("#c4-2").attr("disabled","disabled");
	   }else{
	   	   $("#c4-2").removeAttr("disabled");
	   }	
  });
  $("#d5-2").click(function() {
  	   if($("#d5-2").prop("checked")){
		   $("#c5-2").attr("disabled","disabled");
	   }else{
	   	   $("#c5-2").removeAttr("disabled");
	   }	
  });
  $("#d6-2").click(function() {
  	   if($("#d6-2").prop("checked")){
		   $("#c6-2").attr("disabled","disabled");
	   }else{
	   	   $("#c6-2").removeAttr("disabled");
	   }	
  });
  $("#d7-2").click(function() {
  	   if($("#d7-2").prop("checked")){
		   $("#c7-2").attr("disabled","disabled");
	   }else{
	   	   $("#c7-2").removeAttr("disabled");
	   }	
  });
  //---------------------------------------------貓屋上午
  $("#c1").click(function() {
  	  if($("#c1").prop("checked")){
	      $("#d1").attr("disabled","disabled");
	  }else{
	  	  $("#d1").removeAttr("disabled");
	  }
  });
    $("#c2").click(function() {
  	  if($("#c2").prop("checked")){
	      $("#d2").attr("disabled","disabled");
	  }else{
	  	  $("#d2").removeAttr("disabled");
	  }
  });
  $("#c3").click(function() {
  	   if($("#c3").prop("checked")){
		   $("#d3").attr("disabled","disabled");
	   }else{
	   	   $("#d3").removeAttr("disabled");
	   }	
  });
  $("#c4").click(function() {
  	   if($("#c4").prop("checked")){
		   $("#d4").attr("disabled","disabled");
	   }else{
	   	   $("#d4").removeAttr("disabled");
	   }	
  });
  $("#c5").click(function() {
  	   if($("#c5").prop("checked")){
		   $("#d5").attr("disabled","disabled");
	   }else{
	   	   $("#d5").removeAttr("disabled");
	   }	
  });
  $("#c6").click(function() {
  	   if($("#c6").prop("checked")){
		   $("#d6").attr("disabled","disabled");
	   }else{
	   	   $("#d6").removeAttr("disabled");
	   }	
  });
  $("#c7").click(function() {
  	   if($("#c7").prop("checked")){
		   $("#d7").attr("disabled","disabled");
	   }else{
	   	   $("#d7").removeAttr("disabled");
	   }	
  });
  //---------------------------------------------貓屋下午
  $("#c1-2").click(function() {
  	   if($("#c1-2").prop("checked")){
		   $("#d1-2").attr("disabled","disabled");
	   }else{
	   	   $("#d1-2").removeAttr("disabled");
	   }	
  });
   $("#c2-2").click(function() {
  	   if($("#c2-2").prop("checked")){
		   $("#d2-2").attr("disabled","disabled");
	   }else{
	   	   $("#d2-2").removeAttr("disabled");
	   }	
  });
  $("#c3-2").click(function() {
  	   if($("#c3-2").prop("checked")){
		   $("#d3-2").attr("disabled","disabled");
	   }else{
	   	   $("#d3-2").removeAttr("disabled");
	   }	
  });
  $("#c4-2").click(function() {
  	   if($("#c4-2").prop("checked")){
		   $("#d4-2").attr("disabled","disabled");
	   }else{
	   	   $("#d4-2").removeAttr("disabled");
	   }	
  });
  $("#c5-2").click(function() {
  	   if($("#c5-2").prop("checked")){
		   $("#d5-2").attr("disabled","disabled");
	   }else{
	   	   $("#d5-2").removeAttr("disabled");
	   }	
  });
  $("#c6-2").click(function() {
  	   if($("#c6-2").prop("checked")){
		   $("#d6-2").attr("disabled","disabled");
	   }else{
	   	   $("#d6-2").removeAttr("disabled");
	   }	
  });
  $("#c7-2").click(function() {
  	   if($("#c7-2").prop("checked")){
		   $("#d7-2").attr("disabled","disabled");
	   }else{
	   	   $("#d7-2").removeAttr("disabled");
	   }	
  });
//提示說明文字(未完成!!!!!!看看要不要用popover)
  $('[data-toggle="tooltip"]').tooltip();
});

/*以下為多選的程式
在body要加上onload="multi()"才能使用以下的程式
function multi(){
	$(document).ready(function() {
        $('#multiple-checkboxes').multiselect({
          nonSelectedText: '請選擇（可多選）',
          buttonWidth:'100%',
          allSelectedText: '全選'
        });
        $('#multiple-checkboxes2').multiselect({
          nonSelectedText: '請選擇（可多選）',
          buttonWidth:'100%',
          allSelectedText: '全選'
        });
    });
}*/
       