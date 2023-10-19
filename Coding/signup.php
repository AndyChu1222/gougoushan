<?php
  ini_set('display_errors','off');
  include("dbcon.php");
  session_start();
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="utf-8">
    <title>GougouShan</title>
    <style type="text/css">
            @import url(signup.css);
	</style>
	<!--bootstrap.min.css的min意思是指程式碼經過壓縮的檔案，適合網站上線時使用，程式碼可讀性較低-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!--width=device-width將寬度設為設備的寬度，initial-scale=1 設定手機螢幕畫面的初始縮放比例為100%，shrink-to-fit=no是蘋果手機專屬的設定-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<!--bootstrap.bundle.min.js這行是為了要使用popper，popper可以用來做提示框元件，目前還沒用到-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/09745b270c.js" crossorigin="anonymous"></script>

  <script>
        // var showunit ="";var showunit2 ="";var showunit3 ="";var showunit4 ="";var showunit5 ="";var showunit6 =""; //這樣做可以宣告全域變數
        // var checkSU1 = "";var checkSU2 = "";var checkSU3 = "";var checkSU4 = "";var checkSU5 = "";var checkSU6 = "";
        // window.onload = function() {
        //   var str1 = document.createElement('p');
        //   str1.textContent = '參與單位：';
        //   str1.setAttribute("id", "vc01");
        //   document.querySelector('.modal-body').appendChild(str1);
        //   var str2 = document.createElement('p');
        //   str2.textContent = '參與者姓名：';
        //   str2.setAttribute("id", "vc02");
        //   document.querySelector('.modal-body').appendChild(str2); 
        //   var str3 = document.createElement('p');
        //   str3.textContent = '參與人數：';
        //   str3.setAttribute("id", "vc03");
        //   document.querySelector('.modal-body').appendChild(str3); 
        //   var str4 = document.createElement('p');
        //   str4.textContent = '聯絡信箱：';
        //   str4.setAttribute("id", "vc04");
        //   document.querySelector('.modal-body').appendChild(str4); 
        //   var str5 = document.createElement('p');
        //   str5.textContent = '連絡電話：';
        //   str5.setAttribute("id", "vc05");
        //   document.querySelector('.modal-body').appendChild(str5);
        //   var str6 = document.createElement('p');
        //   str6.textContent = '備註：';
        //   str6.setAttribute("id", "vc06");
        //   document.querySelector('.modal-body').appendChild(str6);            
        // };
        // function sub(){
        //   if (showunit==""){
        //     showunit = document.createElement('span');
        //     if (document.getElementById("customRadio1").checked == true){ //若勾個人就顯示個人
        //       showunit.innerHTML= "個人";
        //       document.querySelector('#vc01').appendChild(showunit);          
        //     }else if (document.getElementById("customRadio2").checked == true){ //若勾團體就顯示團體名稱
        //       var v01_2value= document.getElementById("Custom").value;
        //       checkSU1 = v01_2value;
        //       if (v01_2value==""){
        //         showunit.innerHTML= "一般團體"; //如果沒填團體的名稱Input的話，就自動填入"團體"
        //       }else{
        //         showunit.innerHTML= v01_2value;
        //       }
        //       document.querySelector('#vc01').appendChild(showunit);
        //     }            
        //   } else{
        //     var checkSU2 = showunit.textContent;
        //     if (checkSU2 == "個人" && document.getElementById("customRadio2").checked == true){ //原本勾個人但後來改團體
        //       var v01_2value= document.getElementById("Custom").value;
        //       if (v01_2value==""){
        //         showunit.innerHTML= "一般團體"; //如果沒填團體的名稱Input的話，就自動填入"團體"
        //       }else{
        //         showunit.innerHTML= v01_2value;
        //       }
        //       document.querySelector('#vc01').appendChild(showunit);
        //     }else if(checkSU2 != "個人" && checkSU2 != "" && document.getElementById("customRadio1").checked == true){ 
        //       //原本勾團體後來改個人
        //       showunit.innerHTML= "個人";
        //       document.querySelector('#vc01').appendChild(showunit); 
        //     }else if (checkSU1 != checkSU2){ //舊團名改成新的團名
        //       var v01_2value= document.getElementById("Custom").value;
        //       if (v01_2value==""){
        //         showunit.innerHTML= "一般團體"; //如果沒填團體的名稱Input的話，就自動填入"團體"
        //       }else{
        //         showunit.innerHTML= v01_2value;
        //       }  
        //       document.querySelector('#vc01').appendChild(showunit);
        //     }
        //   }
        //   if (showunit2 == ""){ //參與者姓名
        //     showunit2 = document.createElement('span');
        //     var v02= document.getElementById("validationCustom02").value;
        //     checkSU2 = v02;
        //     showunit2.innerHTML= v02;
        //     document.querySelector('#vc02').appendChild(showunit2);
        //   }else{ //舊資料改新資料
        //     var cnew2 = document.getElementById("validationCustom02").value;
        //     if (checkSU2 != cnew2){
        //       showunit2.innerHTML= cnew2;
        //       document.querySelector('#vc02').appendChild(showunit2);
        //     }
        //   }
        //   if (showunit3 == ""){ //參與人數
        //     showunit3 = document.createElement('span');
        //     var v03= document.getElementById("validationCustom03").value;
        //     checkSU3 = v03;
        //     showunit3.innerHTML= v03;
        //     document.querySelector('#vc03').appendChild(showunit3);
        //   }else{ //舊資料改新資料
        //     var cnew3 = document.getElementById("validationCustom03").value;
        //     if (checkSU3 != cnew3){
        //       showunit3.innerHTML= cnew3;
        //       document.querySelector('#vc03').appendChild(showunit3);
        //     }
        //   }
        //   if (showunit4 == ""){ //聯絡信箱
        //     showunit4 = document.createElement('span');
        //     var v04= document.getElementById("validationCustom04").value;
        //     checkSU4 = v04;
        //     showunit4.innerHTML= v04;
        //     document.querySelector('#vc04').appendChild(showunit4);
        //   }else{ //舊資料改新資料
        //     var cnew4 = document.getElementById("validationCustom04").value;
        //     if (checkSU4 != cnew4){
        //       showunit4.innerHTML= cnew4;
        //       document.querySelector('#vc04').appendChild(showunit4);
        //     }
        //   }
        //   if (showunit5 == ""){ //連絡電話
        //     showunit5 = document.createElement('span');
        //     var v05= document.getElementById("validationCustom05").value;
        //     checkSU5 = v05;
        //     showunit5.innerHTML= v05;
        //     document.querySelector('#vc05').appendChild(showunit5);
        //   }else{ //舊資料改新資料
        //     var cnew5 = document.getElementById("validationCustom05").value;
        //     if (checkSU5 != cnew5){
        //       showunit5.innerHTML= cnew5;
        //       document.querySelector('#vc05').appendChild(showunit5);
        //     }
        //   }
        //   if (showunit6 == ""){ //備註
        //     showunit6 = document.createElement('span');
        //     var v06= document.getElementById("validationCustom06").value;
        //     checkSU6 = v06;
        //     showunit6.innerHTML= v06;
        //     document.querySelector('#vc06').appendChild(showunit6);
        //   }else{ //舊資料改新資料
        //     var cnew6 = document.getElementById("validationCustom06").value;
        //     if (checkSU6 != cnew6){
        //       showunit6.innerHTML= cnew6;
        //       document.querySelector('#vc06').appendChild(showunit6);
        //     }
        //   }
        // }
        // $(document).ready(function(){
        //     $('input[type="radio"]').click(function(){
        //         var inputValue = $(this).attr("value");
        //         var targetBox = $("." + inputValue);
        //         $(".box").not(targetBox).hide();
        //         $(targetBox).show();
        //     });
            
        // });

        // $(document).ready(function(){
        //   $("#submitfm1").click(function(){  
        //         //$("#form1").submit();
        //         document.form1.submit();
        //     });
        // });
        function disinput(){
          var a =document.getElementById('Custom');
          a.style.display='none';
          document.getElementById('Custom').value="個人";
          //document.getElementById('validationCustom03').innerHTML="1";
          document.getElementById('validationCustom03').value=1;
          document.getElementById('validationCustom03').disabled=true;
        }
    function eninput(){
      var b =document.getElementById('Custom');
      b.style.display='block';
      document.getElementById('Custom').innerHTML="";
      document.getElementById('Custom').value="";
      document.getElementById('validationCustom03').disabled=false;
    }
  </script>
  
</head>

<body id="bootstrap-overrides">
	<!--每個解析度下container-fluid沒有設定寬度，會呈現滿版的布局-->
	<div class="container-fluid">
		<div class="row" >
		 <div class="col-md-12"> 
		 	 <!--螢幕寬度<1200px時導覽列變成漢堡條-->
		    <nav class="nav navbar-expand-xl fixed-top stroke navbar-custom">
		    	<a class="navbar-brand mr-5" href="index.php">
		    		<img src="pic/logo.svg" alt="Logo" style="width:10rem;">
		    	</a>

		    	<!---設定可折疊的導覽列-->
		    	<button class="navbar-toggler ml-auto custom-toggler" type="button" data-toggle="collapse" data-target="#colphere">
		    	<!---data-toggle="collapse" 讓他有收起和展開的功能-->
	    		<span class="navbar-toggler-icon"></span>
	    		</button>

	    		<!---設定項目-->
		    	<div class="collapse navbar-collapse" id="colphere">
		    		<div class="container-fluid">
		    			<div class="row" >
							<div class="col-md-9"> <!-- order-md-1 order-sm-2-->
							<ul class="navbar-nav float-right font-weight-bold">
								    <li class="nav-item"> <!--選擇到某頁了可以+上active在這個nav-item旁邊-->
								    	<a class="nav-link mx-3 px-3" href="about.php">關於我們</a>
								    </li>
								    <li class="nav-item">
								    	<a class="nav-link mx-3 px-3" href="petarea.php">貓狗專區</a>
								    </li>
								    <li class="nav-item">
								  		<a class="nav-link mx-3 px-3" href="support.php">支持我們</a>
								    </li>
								    <li class="nav-item">
								  		<a class="nav-link mx-3 px-3" href="tourbook.php">檢視活動</a>
								    </li>
								    <li class="nav-item">
								  		<a class="nav-link mx-3 px-3" href="voljoin.php">志工招募</a>
								    </li>
                    <li class="nav-item">
                      <a class="nav-link mx-3 px-3 " id="vm1" href="">志工專區</a>
                    </li>
							 	</ul>	
							</div>
							<div class="col-md-3">
								<!---ml-auto靠右對齊-->
								<ul class="navbar-nav float-right font-weight-bold">
                  <li class="nav-item">
                      <a class="nav-link mx-3" href="vollogin.php" id="v1">登入/註冊</a>
                    </li>
							 	</ul>					    		
							</div>
						</div>
					</div>	
		    	</div> 		
		   </nav>
		 </div> 
		</div>
	</div>
  <!-- 確認要不要登出ㄉModal -->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="em" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 300px;">
        <div class="modal-content">
          <form action="index.php" method="POST">
              <div class="modal-header text-center">
                <h5 class="modal-title w-100" id="em">您確定要登出嗎？</h5>
              </div>
              <div class="modal-footer" style="justify-content: center;">
                <input type="hidden" name="CheckLogout" value="1">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>&nbsp;&nbsp;
                <button type="submit" class="btn btn-dark">確認登出</button>
              </div>            
          </form>
        </div>
    </div>
  </div>
  <?php
    if ($_SESSION["login_session"] == true) {
      echo '<script>
      var v1=document.getElementById("v1");
      v1.setAttribute("href","#logoutModal");
      v1.setAttribute("data-toggle","modal");
      v1.innerHTML="登出";

      var vm1=document.getElementById("vm1");
      vm1.setAttribute("href","volmanage.php");
      </script>';
    }else{
      echo '<script>
      var v1=document.getElementById("v1");
      v1.setAttribute("href","vollogin.php");
      v1.innerHTML="登入/註冊";

      var vm1=document.getElementById("vm1");
      vm1.setAttribute("href","vollogin.php");
      vm1.addEventListener("click", function(){alert("「志工專區」可以安排自己的志工時段，請先登入/註冊。");}, false);
      </script>';
    }

    if ($_POST["CheckLogout"]==1){
      session_destroy();
      echo "<script>window.location.href='index.php'</script>";
    }
  ?>
<!--以上是導覽列-->

<header>
  <div id="no_back" class="cover h-100 w-100" data-src="pic/aty_banner.jpg"></div>
  <div id="no_top" class="container-fluid">
      <div class="row align-items-center justify-content-center">
        <div class="col-12 text-white text-center"><!--Height 100%-->
          <!--這裡vmax意思是，我的字體大小是螢幕最"長"邊的4%，vmin意思是，我的字體大小是螢幕最"短"邊的XX%-->
            <h1 style="font-size:5vmax;">檢視活動</h1> <!--類似h1的作法可設置display-(1~4)--> 
          </div>
      </div>
    </div>
</header>

<!--以上是banner-->
<!-- 報名表單 -->
<section class="mt-2">
  <div class="container pt-2">
    <div class="row">
      <div class="col-10 mx-auto p-0">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-2" style="font-size: 1.1rem;">
            <li class="breadcrumb-item"><a href="tourbook.php" id="bread1">檢視活動</a></li>
            <li class="breadcrumb-item active" aria-current="page">線上報名表單</li>
          </ol>
        </nav>         
      </div>
    </div>
  </div>
  <div class="container pb-5">
    <div class="row align-items-center">
      <div class="col-10 mx-auto bg-white px-5 py-4 box-shado">
  			<form  class="needs-validation" id="form1" method="POST" action="tourbook.php" name="form1" novalidate>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="validationCustom01" class="col-form-label">您選擇的活動：</label>
                <?php 
                  if (!empty($_POST["aName"])){
                      echo $_POST["aName"];
                  }else{
                    //如果他直接不從檢視活動去選活動，就直接進報名表單的話，顯示這個
                    echo "請至<a class='linkTo1' href='tourbook.php'>「檢視活動」</a>選擇。";
                  }
                ?>
              </div>
              <div class="form-group col-md-6">
                <label class="col-form-label">活動時間：</label>
                <?php 
                  if (!empty($_POST["aTime"])){
                      echo $_POST["aTime"];
                  }else{
                    //如果他直接不從檢視活動去選活動，就直接進報名表單的話，顯示這個
                    echo "-";
                  }
                  //必須再把檢視活動的aid再繳交出去
                  if (!empty($_POST['aID'])){
                    $aid=$_POST['aID'];
                    echo "<input type='hidden' name='aIDD' value='$aid'>";
                  }             
                ?>
              </div>  
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="validationCustom01" class="col-form-label">1. 參與單位*</label>
                <div class="form-control2">
                  <div class="custom-control custom-radio custom-control-inline align-items-center">
                      <input type="radio" name="group" id="customRadio1" class="custom-control-input" onclick="disinput()" required>
                      <label class="custom-control-label" for="customRadio1">個人</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline align-items-center">
                      <input type="radio" name="group" id="customRadio2" class="custom-control-input" onclick="eninput()" required>
                      <label class="custom-control-label" for="customRadio2">團體&nbsp;</label>
                      <input type="text" name="group" class="form-control3" id="Custom" placeholder="Group Name">
                  </div>  
                </div>  
                <div class="valid-feedback">
                     <i class="fas fa-check"></i>
                </div>
                <div class="invalid-feedback">
                        請選擇參與單位!
                </div>
              </div>
              <div class="form-group col-md-6">
                <label class="col-form-label">2. 參與者姓名*</label>
                <input type="text" class="col-md test1" name="name" id="validationCustom02" placeholder="Name"  required>
                <div class="valid-feedback">
                     <i class="fas fa-check"></i>
                </div>
                <div class="invalid-feedback">
                        請輸入名字!
                </div>
              </div>  
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="validationCustom03" class="col-form-label">3. 參與人數*</label>
                <input type="number" class="col-md test1" name="num" id="validationCustom03" placeholder="The Number of Participants" min="1" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" required>
                <div class="valid-feedback">
                     <i class="fas fa-check"></i>
                </div>
                <div class="invalid-feedback"> 請輸入參訪人數!</div>
              </div>
              <div class="form-group col-md-6">
                <label class="col-form-label">4. 聯絡信箱*</label>
                <input type="email" class="col-md test1" name="mail" id="validationCustom04" placeholder="E-Mail" required>
                <div class="valid-feedback">
                     <i class="fas fa-check"></i>
                </div>
                <div class="invalid-feedback">請依E-Mail格式填寫。</div>
              </div>  
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="validationCustom05" class="col-form-label">5. 連絡電話*</label>
                <input type="text" class="col-md test1" name="tel" id="validationCustom05" placeholder="Tel"  onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" required>
                <div class="valid-feedback">
                      <i class="fas fa-check"></i>
                </div>
                <div class="invalid-feedback">
                        請輸入連絡電話!
                </div>
              </div> 
              <div class="form-group col-md-6">
                <label for="validationCustom06" class="col-form-label">6. 備註</label>
                <input type="text" class="col-md test1" name="remarks" id="validationCustom06" placeholder="Remark">
                <div class="valid-feedback">
                      <i class="fas fa-check"></i>
                </div>
              </div>                           
            </div>

            <!-- <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title w-100 text-center" id="exampleModalLongTitle">請確認填寫內容</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body"></div>
                        <div class="modal-footer">
                          <button type="button" id="submitfm1" name="submitfm1" class="btn btn-primary darkerbg float-right">繳交</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">返回</button>
                        </div>
                </div>
              </div>
            </div> -->
      			<button type="submit" class="btn btn-primary darkerbg float-right">確認</button>
            <!--  id="sbme1" onclick="sub();" -->
<!--data-toggle="modal" data-target="#signup"-->
            </div>
      		</form>
      		<script>
  // (function() {
  //   'use strict';
  //   window.addEventListener('load', function() {
  //     // Fetch all the forms we want to apply custom Bootstrap validation styles to
  //     var forms = document.getElementsByClassName('needs-validation');
  //     // Loop over them and prevent submission
  //     var validation = Array.prototype.filter.call(forms, function(form) {
  //       form.addEventListener('submit', function(event) {
  //         if (form.checkValidity() === false) { //如果欄位有錯誤的，就不要顯示modal
  //           event.preventDefault();
  //           event.stopPropagation();
  //           document.getElementById("sbme1").removeAttribute('data-toggle');
  //           document.getElementById("sbme1").removeAttribute("data-target");
  //         }else{ //如果欄位都答對了，先不要繳交，因為可繳交的按鈕是在modal裡面
  //           event.preventDefault();
  //           event.stopPropagation();
  //           document.getElementById("sbme1").setAttribute('data-toggle','modal');
  //           document.getElementById("sbme1").setAttribute("data-target","#signup");
  //           $('#signup').modal('show');
  //         }
  //         form.classList.add('was-validated');
  //       }, false);
  //     });
  //   }, false);
  // })();
          // Example starter JavaScript for disabling form submissions if there are invalid fields
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
</section>
<!-- /捐款表單 -->
<div class="container"></div>
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