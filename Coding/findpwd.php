<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="utf-8">
    <title>GougouShan</title>
    <style type="text/css">
            @import url(findpwd.css);
	</style>
	<!--bootstrap.min.css的min意思是指程式碼經過壓縮的檔案，適合網站上線時使用，程式碼可讀性較低-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!--width=device-width將寬度設為設備的寬度，initial-scale=1 設定手機螢幕畫面的初始縮放比例為100%，shrink-to-fit=no是蘋果手機專屬的設定-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<!--bootstrap.bundle.min.js這行是為了要使用popper，popper可以用來做提示框元件，目前還沒用到-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/09745b270c.js" crossorigin="anonymous"></script>
</head>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-MZ4YGERFHR"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'G-MZ4YGERFHR');
</script>

<script>
	function showdiv(id) {
		console.log(id);
		if(id=="step2"){
		    document.getElementById(id).style.display = 'block';
		    document.getElementById('step1').style.display = 'none';
		}    
	}
	(function() {
	  'use strict';
	  window.addEventListener('load', function() {
		var forms = document.querySelectorAll('.needs-validation');
		Array.prototype.slice.call(forms)
		    .forEach(function (form) {
		      form.addEventListener('submit', function (event) {
		        if (!form.checkValidity()) { //如果有錯誤就不submit
		          event.preventDefault()
		          event.stopPropagation()		        	
		        }

		        form.classList.add('was-validated')
		      }, false)
		})

	    var inputs = document.getElementsByClassName('form-control')
	    // loop over each input and watch blue event
	    var validation = Array.prototype.filter.call(inputs, function(input) {
	    	// 及時顯示使用者輸入的是否錯誤
	      input.addEventListener('blur', function(event) {
	        input.classList.remove('is-invalid');
	        input.classList.remove('is-valid');
	        var a=document.getElementById('submit_btn1');
	        if (input.checkValidity() === false) {
	            input.classList.add('is-invalid');
	        }
	        else {
	            input.classList.add('is-valid');
	            a.setAttribute('onclick',"showdiv('step2')");
	            a.disabled=false;
	        }
	      }, false);
	    });
	  }, false);
	})()
	$(document).ready(function () {
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
	 });
</script>

<body id="bootstrap-overrides">

	<header>
		<div class="containe-fluid owhite d-flex justify-content-center">
			<a href="index.php"><img src="pic/logo.svg" alt="Logo" style="width:15rem;"></a>
		</div>
	</header>

	<!--以上是banner-->
	<section class="my-2 d-flex align-items-center">
	  <div class="container pb-5 my-4">
	    <div class="row align-items-center">
	      <div class="col-md-4 col-8 offset-md-4 offset-2 text-center">
		  	<span class="switch activeit">找回密碼</span>
	      </div>
	      <div class="w-100"></div>

	      <div class="col-6 mx-auto px-4 py-3 my-3 bg-white" id="step1" style="display:block;">
	      	<h5 class="w-100 text-center">步驟一</h5>
			<form>
				<span style="display: inline-block;font-size: 1vw;color:rgba(0,0,0,.8);margin-bottom: .6rem;">請輸入您的電子郵件，輸入完成後請至信箱查看以重新設定密碼。</span>
				<fieldset>
					<div class="form-group">
					    <input type="text" class="form-control" name="f_mail" placeholder="請輸入常用信箱" pattern="^.+@.+\..+$" required>
				        <div class="invalid-feedback">請依E-Mail格式填寫。</div>
					</div>								 
					<button type="button" class="btn btn-primary w-100" id="submit_btn1" disabled>寄發重設信件</button>
				</fieldset>
			</form>      	
		  </div>

		  <div class="col-6 mx-auto px-4 py-3 my-3 bg-white text-center" id="step2" style="display:none;">
	      	<h5>步驟二</h5>
			<form action="vollogin.php">
				<span style="display: inline-block;font-size: 0.9rem;color:rgba(0,0,0,.8);margin-bottom: .6rem;">輸入驗證碼以重設密碼</span>
				<fieldset>
					<div class="form-group">
					      <input type="text" class="form-control" placeholder="您收到的驗證碼*" required>
					      <div class="invalid-feedback text-justify">請前往您的電子信箱查看驗證碼，並輸入於此。</div>
					</div>
					<hr>
					<div class="form-group">
					    <input type="password" class="form-control" id="PwdId" placeholder="請輸入密碼(須含英文及數字)" pattern="^([a-zA-Z]+\d+\W*|\d+[a-zA-Z]+\W*|\d+\W*[a-zA-Z]+|[a-zA-Z]+\W*\d+|\W*\d+[a-zA-Z]+|\W*[a-zA-Z]+\d+)[a-zA-Z0-9]*$" required>
				        <div class="invalid-feedback text-justify">密碼至少6位數，必須含有英文和數字。</div> 
					</div>
					<div class="form-group">
					    <input type="password" class="form-control pwds" id="cPwdId" placeholder="再次輸入密碼" required>
					    <div class="valid-feedback" id="cPwdValid"></div>
				        <div class="invalid-feedback text-justify" id="cPwdInvalid">未輸入。</div>
					</div>					
					<button type="submit" class="btn btn-primary w-100">重設密碼</button>
				</fieldset>
			</form>      	
		  </div>

		</div>
	  </div>
	</section>


	<!--以上是登入的內容-->

	<!-- 頁尾 -->
	<footer class="py-1">
	  <div class="container-fluid">
	    <div class="row text-center m-3">
	      <div class="col-lg-4 col-sm-12">
	        <ul class="footer-menu">
	          <div class="my-2"><h6 class="font-weight-bold"><i class="fas fa-paw" aria-hidden="true"></i> 網站導覽</h6></div>
	          <div style="width:20%;height:4rem; float:left">         
	          </div>  
	          <div style="width:20%;height:auto; float:left">
	            <li><a href="index.php">首頁介紹</a></li>
	            <li><a href="tourbook.php">檢視活動</a></li>
	            <li><a href="petarea.php">貓狗專區</a></li>           
	          </div>          
	          <div style="width:20%;height:auto;float:left">
	            <li><a href="about.php">關於我們</a></li>
	            <li><a href="voljoin.php">志工招募</a></li>
	            <li><a href="donmon.php">捐款表單</a></li>            
	          </div>
	          <div style="width:20%;height:auto; float:left">
	            <li><a href="support.php">支持我們</a></li>
	            <li><a href="vollogin.php">志工登入</a></li>
	            <li><a href="adopt.php">領養表單</a></li>
	          </div>
	          <div style="width:20%;height:4rem; float:left">         
	          </div>  
	        </ul>         
	      </div>
			<div class="col-lg-4 col-sm-12">
				<div class="my-2"><h6 class="font-weight-bold"><i class="fas fa-paw" aria-hidden="true"></i> 聯絡資訊</h6></div>
				社團法人台灣黑皮狗狗山友善動物協會
				<a class="clear" href="https://www.facebook.com/gougoushan" target="_blank"><i class="fab fa-facebook-square fa-lg fa-fw px-2"></i></a><!--fa-fw設定每個icon一樣大-->
				<a class="clear" href="https://www.instagram.com/gou_gou_shan" target="_blank"><i class="fab fa-instagram fa-lg  fa-fw px-2"></i></a><br>
				EMAIL：gougoushan@gmail.com<br>
				協會字號：63018612
				
			</div>
			<div class="col-lg-4 col-sm-12">
				<div class="my-2"><h6 class="font-weight-bold"><i class="fas fa-paw" aria-hidden="true"></i> 匯款資訊</h6></div>
				匯款帳號（700）0021088 0832594
				<br>匯款劃撥：22858257
				<br>戶名：社團法人台灣黑皮狗狗山友善動物協會
 			</div>
			<div class="col-12 mt-4 text-center">
				Copyright 2021 GouGouSuan Association. All rights reserved. Designed by AJTeam.
			</div>
	    </div>
	  </div>
	</footer>
	<!--以上是頁尾-->
</body>
</html>