<?php
	session_start(); //請記住 session_start() 一定要放在網頁的最上方還沒有輸出任何東西之前
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="utf-8">
    <title>GougouShan</title>
    <style type="text/css">
            @import url(vollogin.css);
	</style>
	<!--bootstrap.min.css的min意思是指程式碼經過壓縮的檔案，適合網站上線時使用，程式碼可讀性較低-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!--width=device-width將寬度設為設備的寬度，initial-scale=1 設定手機螢幕畫面的初始縮放比例為100%，shrink-to-fit=no是蘋果手機專屬的設定-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<!--bootstrap.bundle.min.js這行是為了要使用檢查form-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
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
		      var a = document.getElementById(id);
		      console.log(id);
		      if (a) {
		      	if(id=="login"){
		      		if (a.style.display == 'none') {
		              a.style.display = 'block';
		          	}
		          	var b = document.getElementById('signup');
		          	b.style.display = 'none';
				    var e = document.getElementById("a1");
		  			var e1 = document.getElementById("a2");
		  			e.classList.add("activeit");
		  			e1.classList.remove("activeit");
		      	}
		       if(id=="signup"){
		      		if (a.style.display == 'none') {
		              a.style.display = 'block';
		          	}
		          	var b = document.getElementById('login');
		          	b.style.display = 'none';
				    var e = document.getElementById("a2");
		  			var e1 = document.getElementById("a1");
		  			e.classList.add("activeit");
		  			e1.classList.remove("activeit");		          	
		      	}
		      }
		      
}
$(document).ready(function () {
	$('#check').click(function(){
		$('#agreeModal').modal('hide');
		$('#ckme').prop("checked",true);
	});
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
/*	1. 正規化比對字串的教學:
	https://moojing.medium.com/javascript-%E5%88%9D%E6%8E%A2regex-%E6%AD%A3%E8%A6%8F%E8%A1%A8%E9%81%94%E5%BC%8F-1da2f4d94795
	測試自己寫的regex對不對:https://regex101.com/
	2. BS的驗證教學:
	https://stackoverflow.com/questions/43481237/bootstrap-4-form-validation  、  https://www.wfublog.com/2017/09/bootstrap-form-validator.html*/
</script>

<body id="bootstrap-overrides">
	<header>
		<div class="containe-fluid owhite d-flex justify-content-center">
			<a href="index.php"><img src="pic/logo.svg" alt="Logo" style="width:15rem;"></a>
		</div>
	</header>

	<!--以上是banner-->
	<section class="my-2 d-flex align-items-center">
	  <div class="container py-5 my-5">
	    <div class="row align-items-center" id="addcenter">
	      <div class="col-md-4 col-8 offset-md-4 offset-2 text-center" id="twobtn">
		  	<span class="switch activeit" onclick="showdiv('login');" id="a1">志工登入</span><span class="switch" id="a2" onclick="showdiv('signup');">立即註冊</span>	
	      </div>
	      <div class="w-100"></div>
	      <div id="login" class="col-md-5 col-8 mx-auto px-4 pt-4 pb-2 my-3 bg-white" style="display:block;">
					<form novalidate="" action="vollogin.php" method="post" role="form" class="needs-validation">
						<fieldset>
							<div class="form-group" id="fg1">
							    <input type="text" class="form-control" name="lg_mail" id="mail" placeholder="請輸入電子信箱" pattern="^.+@.+\..+$" required>
						        <div class="invalid-feedback">請依E-Mail格式填寫。</div>
							</div>
							<div class="form-group" id="fg2">
							    <input type="password" class="form-control" name="lg_pwd" id="pwd" placeholder="請輸入密碼(須含英文及數字)" pattern="^([a-zA-Z]+\d+\W*|\d+[a-zA-Z]+\W*|\d+\W*[a-zA-Z]+|[a-zA-Z]+\W*\d+|\W*\d+[a-zA-Z]+|\W*[a-zA-Z]+\d+)[a-zA-Z0-9]*$" required>
						        <div class="invalid-feedback">密碼至少6位數，必須含有英文和數字。</div>     
							</div>
							<button type="submit" class="btn btn-success mt-1 w-100">登入</button>					
							<div class="form-row justify-content-between my-3">
								<div class="form-check ml-1">
								      <label class="form-check-label">記住我
										  <input type="checkbox">
										  <span class="checkmark"></span>
									  </label>	 
								</div>
								<a href="findpwd.php" class="clear mr-1">忘記密碼</a>					
							</div>
						</fieldset>
					</form>
		  	</div>
					<?php
						ini_set('display_errors','off');
						include("dbcon.php");
						if ($_SESSION["login_session"] == true) {
							echo "<script>$('#signup').css('display','none');$('#login').css('display','none');$('#twobtn').css('display','none');$('#addcenter').addClass('justify-content-center');</script><h3 id='d1'>親愛的 ".$_SESSION["username"]."，您已登入。歡迎至<a href='volmanage.php'class='linkTo1'>「志工專區」</a>管理您的參與紀錄。</h3>";
						}else{
							echo "<script>$('#signup').css('display','block');$('#login').css('display','block');$('#twobtn').css('display','block');$('#addcenter').removeClass('justify-content-center');$('#d1').remove();</script>";
						}
						$user=$_POST['lg_mail'];
						$pass=$_POST['lg_pwd'];
							if ($user !="" && $pass !="") {
								$sql='SELECT * FROM vol WHERE Vol_Pass="'.$pass.'" AND Vol_Email="'.$user.'"';
								$res=mysqli_query($conn,$sql);
								$tot_res=mysqli_num_rows($res);

								if ($tot_res>0) {
									$_SESSION["login_session"] = true;
									while($row=mysqli_fetch_array($res)){
										$_SESSION["username"] = $row["Vol_Name"];
										$_SESSION["userid"] = $row["Vol_ID"];
									}									
									if($pass=='root123' && $user=='ggsroot@gmail.com'){
										echo "<script>window.location.href='backmain.php';</script>";
									}else{
										echo "<script>alert('".$_SESSION["username"].", 您已成功登入！');window.location.href='index.php';</script>";
									}

								}else{
									echo "<script>alert('帳號密碼錯誤，請重新輸入。')</script>";
									$_SESSION["login_session"]=false;
								}
							}
					?>
		  <div id="signup" class="col-md-8 col-8 mx-auto px-4 pt-4 pb-2 my-3 bg-white" style="display:none;">
			<form novalidate="" role="form" action="vollogin.php" method="POST" class="needs-validation">
				<div class="form-row">
					<div class="form-group col-12">
						<label for="email">電子信箱*</label>
					    <input type="text" class="col-md-12 test1" name="s_mail" placeholder="請輸入常用信箱" pattern="^.+@.+\..+$" required>
					    <div class="valid-feedback">
                      		<i class="fas fa-check"></i>
                    	</div>
				        <div class="invalid-feedback">請依E-Mail格式填寫。</div>
					</div>					
				</div>
				<div class="form-row">
					<div class="form-group col-6">
						<label for="pwd">密碼*</label>
					    <input type="password" class="col-md test1" name="pass" id="PwdId" placeholder="請輸入密碼(須含英文及數字)" pattern="^([a-zA-Z]+\d+\W*|\d+[a-zA-Z]+\W*|\d+\W*[a-zA-Z]+|[a-zA-Z]+\W*\d+|\W*\d+[a-zA-Z]+|\W*[a-zA-Z]+\d+)[a-zA-Z0-9]*$" required>
					    <div class="valid-feedback">
                      		<i class="fas fa-check"></i>
                    	</div>
				        <div class="invalid-feedback">密碼至少6位數，必須含有英文和數字。</div> 
					</div>
					<div class="form-group col-6">
						<label for="pwd">請再次輸入密碼*</label>
					    <input type="password" class="col-md pwds test1" id="cPwdId" placeholder="再次輸入密碼" required>
					    <div class="valid-feedback" id="cPwdValid"></div>
				        <div class="invalid-feedback" id="cPwdInvalid">未輸入。</div>
					</div>
				</div>
				<hr>
				<div class="form-row">
					<div class="form-group col-6">
						<label for="name">姓名*</label>
						<input type="text" class="col-md test1" name="name" placeholder="Name" required>
						<div class="valid-feedback">
                      		<i class="fas fa-check"></i>
                    	</div>
						<div class="invalid-feedback">請輸入此欄位。</div>
					</div>
					<div class="form-group col-6">
						<label class="w-100">性別*</label>
                  		<div class="custom-control custom-radio custom-control-inline">
                    		<input type="radio" name="sex" class="custom-control-input" id="customControlValidation1" value="男" required>
                    		<label class="custom-control-label" for="customControlValidation1">男</label>
                  		</div>                    
                  		<div class="custom-control custom-radio custom-control-inline">
                    		<input type="radio" name="sex" class="custom-control-input" id="customControlValidation2"  value="女" required>
                    		<label class="custom-control-label" for="customControlValidation2">女</label>
                  		</div>
                  		<div class="valid-feedback">
                      		<i class="fas fa-check"></i>
                    	</div>
						<div class="invalid-feedback">請選擇其中一項。</div>			
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-6">
						<label for="account">手機*</label>
						<input type="text" class="col-md test1" name="tel" placeholder="Phone" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" required>
						<div class="valid-feedback">
                      		<i class="fas fa-check"></i>
                    	</div>
				        <div class="invalid-feedback" id="cPwdInvalid">未輸入。</div>
					</div>
					<div class="form-group col-6">
						<label for="iJob col-form-label">職業</label>
						<select id="iJob" class="btn btn-light dropdown-toggle col-md" name="work" required>
						    <option selected disabled value="">請選擇</option>
						    <option value="工商人士">工商人士</option>
			                  <option value="軍公教人員">軍公教人員</option>
			                  <option value="退休人員">退休人員</option>
			                  <option value="家管">家管</option>
			                  <option value="學生">學生</option>
			                  <option value="其他">其他</option>
						</select>
						<div class="valid-feedback">
                      <i class="fas fa-check"></i>
                    </div>
                    <div class="invalid-feedback">
                        請選擇職業!
                    </div>
					</div>
				</div>
				<div class="form-row justify-content-between">
					<div class="form-group">
						<div class="form-check ml-1">
							<input type="checkbox" class="form-check-input" id="ckme"  required>
							<span class="checkmark"></span>
							<label class="form-check-label">
							</label>						
							<span class="mouse">我已閱讀並同意</span> <a data-toggle="modal" data-target="#agreeModal" id="mouse2">『個資蒐集』</a> <span class="mouse">於本機構使用</span>
					        <div class="invalid-feedback">請勾選「
					        我已閱讀並同意『個資蒐集』於本機構使用。」</div>
						</div>						
					</div>
				</div>
				<button type="submit" class="btn btn-success mb-3 w-100" id="submitBtn">註冊</button>
			</form> 
			<script>
				(function() {
                'use strict';
                window.addEventListener('load', function() {
                  // Fetch all the forms we want to apply custom Bootstrap validation styles to
                  var forms = document.getElementsByClassName('needs-validation');
                  // Loop over them and prevent submission
                  var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                      if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                      }
                      form.classList.add('was-validated');
                    }, false);
                  });
                }, false);
              })();
			</script>   	
		  </div>

		</div>
	  </div>
	  <?php 
	  ini_set('display_errors','off');
	  	$mail=$_POST['s_mail'];
	  	$pass=$_POST['pass'];
	  	$name=$_POST['name'];
	  	$sex=$_POST['sex'];
	  	$tel=$_POST['tel'];
	  	$work=$_POST['work'];

	  	if (!empty($mail) && !empty($pass) && !empty($name) && !empty($sex) && !empty($tel) && !empty($work)){
	  		$sql='INSERT INTO vol(Vol_Email,Vol_Pass,Vol_Name,Vol_Sex,Vol_Tel,Vol_Job) VALUES("'.$mail.'","'.$pass.'","'.$name.'","'.$sex.'","'.$tel.'","'.$work.'")';
	  		echo "<script>alert('您已成功註冊，請登入以繼續。')</script>";
	  		mysqli_query($conn,$sql);
	  	}
	  ?>		
	</section>

	<div class="modal fade" id="agreeModal" tabindex="-1" role="dialog" aria-labelledby="agreeTitle" aria-hidden="true">
	  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header text-center">
	        <h5 class="modal-title w-100" id="agreeTitle">個資蒐集同意書</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body" style="text-align:justify;">
	        蒐集、處理及利用捐款人個人資料告知聲明暨同意書<br><br>

			社團法人台灣黑皮狗狗山友善動物協會（以下簡稱本會）為確保捐款人之個人資料、隱私及其他權益之保護，依照個人資料保護法第八條規定明確告知下列事項：<br><br>

			1.&nbsp;&nbsp;資料蒐集者名稱：社團法人台灣黑皮狗狗山友善動物協會<br>
			2.&nbsp;&nbsp;蒐集個人資料目的：捐款人基本資料之保存、管理、識別等捐贈相關作業之運用以及製作捐贈芳名錄…等。<br>
			3.&nbsp;&nbsp;個人資料範圍與類別：<br>
			　a.&nbsp;&nbsp;C001辨識個人者：如捐款者之姓名、地址、電話、電子郵件等資訊。<br>
			　b.&nbsp;&nbsp;C002辨識財務者：如信用卡或轉帳帳戶資訊。<br>
			　c.&nbsp;&nbsp;C003政府資料中之辨識者：如身分證字號或護照號碼(外國人)。<br>
			　d.&nbsp;&nbsp;C011個人描述：如性別、國籍、出生年月日。<br>
			4.&nbsp;&nbsp;個人資料利用期間、地區、對象及方式：<br>
			　a.&nbsp;&nbsp;期間：除法令或本會規章辦法另有訂定外，為本會立案起至解散、清算止。<br>
			　b.&nbsp;&nbsp;地區：中華民國境內或您所在且未受主管機關禁止傳輸的境外地區。<br>
			　c.&nbsp;&nbsp;對象及方式：捐款者之捐款資料蒐集，將存檔於本會資料庫內，進行捐款人資訊管理，含捐款人聯絡通訊及捐款資訊建檔、寄送捐款收據、義
			　 賣品、贈品、聯繫捐款人捐款作業事宜、寄送電子報、檢索查詢、提供國稅局為捐款人年度申報綜合所得稅、於網站上徵信等。<br>
			5.&nbsp;&nbsp;本人依法得行使之權利：依個人資料保護法第三條之規定，台端就所提供之個人資料得行使下列權利：<br>
			　a.&nbsp;&nbsp;查詢、請求閱覽或請求製給複製本。<br>
			　b.&nbsp;&nbsp;請求補充或更正<br>
			　c.&nbsp;&nbsp;請求停止蒐集、處理、利用或請求刪除。若委託他人辦理，另須出具委託書並同時提供受託人身份證明文件以供核對。若申請人不符前述規
			定，本會得請申請人補充資料，以為憑辦拒絶。<br>
			6.&nbsp;&nbsp;注意事項：台端得自由選擇是否提供相關個人資料，惟台端若不同意本會蒐集、處理或利用台端之個人資料，或提供之個人資料不完全，基於捐
			款業務之執行，本會將無法提供後續完善的相關服務，尚祈見諒。<br>
			7.&nbsp;&nbsp;本人已詳閱且同意上述內容，並同意協會得於上述條件內蒐集、處理或利用本人之個人資料。<br>
	      </div>
	      <div class="modal-footer">
	      		<div class="container d-flex justify-content-center">
	      			<label class="form-check-label">
						<input type="checkbox" style="position: relative;top:1px;left:1px;" id="check">
						<a class="mouse clear" style="cursor:pointer;">我已閱讀並同意『個資蒐集』於本機構使用</a>		      			
	      			</label>
	      		</div>
		   </div>
	    </div>
	  </div>
	</div>

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