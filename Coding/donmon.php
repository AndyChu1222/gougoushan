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
            @import url(donmon.css);
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
  function none1000(){
    var a = document.getElementById('validationCustom');
    a.style.display='none';
    document.getElementById('validationCustom').value=1000;
  }
  function none2000(){
    var b = document.getElementById('validationCustom');
    b.style.display='none';
    document.getElementById('validationCustom').value=2000;
  }
  function block(){
    var c = document.getElementById('validationCustom');
    c.style.display='block';
    document.getElementById('validationCustom').value=10;
  }
  function nounder(){
    var d = document.getElementById('validationCustom').value;
    if (d<10 || d=="") {
      alert("輸入金額需大於10元!");
      document.getElementById('validationCustom').value=10;
    }else{
      
    }
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
  <div id="no_back" class="cover h-100 w-100" data-src="pic/sup_banner.jpg"></div>
  <div id="no_top" class="container-fluid">
      <div class="row align-items-center justify-content-center">
        <div class="col-12 text-white text-center"><!--Height 100%-->
          <!--這裡vmax意思是，我的字體大小是螢幕最"長"邊的4%，vmin意思是，我的字體大小是螢幕最"短"邊的XX%-->
            <h1 style="font-size:5vmax;">捐款確認表單</h1> <!--類似h1的作法可設置display-(1~4)--> 
          </div>
      </div>
    </div>
</header>

<!--以上是banner-->
<section class="mt-2">
  <div class="container pt-2">
    <div class="row">
      <div class="col-10 mx-auto p-0">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-2" style="font-size: 1.1rem;">
            <li class="breadcrumb-item"><a href="support.php" id="bread1">支持我們</a></li>
            <li class="breadcrumb-item active" aria-current="page">捐款確認表單</li>
          </ol>
        </nav>         
      </div>
    </div>
  </div>

  <!-- 捐款表單 -->

  <div class="container pb-5">
    <div class="row align-items-center">
      <div class="col-10 mx-auto rounded bg-white px-5 py-4 box-shado">
        <form  class="needs-validation" action="donmon.php" method="POST" novalidate>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="validationCustom01" class="col-form-label">1. 捐款人姓名/單位名稱*</label>
              <input type="text" name="name" class="col-md test1" id="validationCustom01" placeholder="Name" required>
              <div class="valid-feedback">
                <i class="fas fa-check"></i>
              </div>
              <div class="invalid-feedback">
                  請輸入名字!
              </div>
            </div>
            <div class="form-group col-md-6">
              <label for="validationCustom04" class="col-form-label">2. 連絡電話*</label>
              <input type="text" name="tel" class="col-md test1" id="validationCustom04" placeholder="Tel"  onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" required>
              <div class="valid-feedback">
                   <i class="fas fa-check"></i>
              </div>
              <div class="invalid-feedback">
                      請輸入連絡電話!
              </div>
            </div>          
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="validationCustom02" class="col-form-label">3. 電子郵件</label>
              <input type="email" name="mail" class="col-md test1" id="validationCustom02" placeholder="Email">
              <div class="valid-feedback">
                    <i class="fas fa-check"></i>
              </div>
              <div class="invalid-feedback">
                  請輸入電子郵件!
              </div>
            </div>
            <div class="form-group col-md-6">
              <label for="validationCustom03" class="col-form-label">4. 地址</label>
              <input type="text" name="addr" class="col-md test1" id="validationCustom03" placeholder="Address">
              <div class="valid-feedback">
                    <i class="fas fa-check"></i>
              </div>
              <div class="invalid-feedback">
                  請輸入地址!
              </div>
            </div>             
          </div>
          <hr>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="validationCustom05" class="col-form-label">5. 匯款金額*</label>
              <!-- <div class="form-check">
                <input class="form-check-input" type="radio" name="mon" value="1000" onclick="none1000()" required>
                <label class="form-check-label" for="mon1">
                  1000元
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="mon" value="2000" onclick="none2000()" required>
                <label class="form-check-label" for="mon2">
                  2000元
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="mon" onclick="block()" required>
                <label class="form-check-label" for="mon3">
                  其他金額&nbsp;
                </label>
                <input type="number" class="test1" name="mon" id="validationCustom" placeholder="需超過10元" min="10">&nbsp;元
              </div> -->
              <div class="form-control2">
                <div class="custom-control custom-radio custom-control-inline align-items-center">
                    <input type="radio" name="mon" class="custom-control-input" id="customRadio1" onclick="none1000()" required>
                    <label class="custom-control-label" for="customRadio1">1000元</label>
                    
                </div>
                <div class="custom-control custom-radio custom-control-inline align-items-center">
                    <input type="radio" name="mon" class="custom-control-input" id="customRadio2" onclick="none2000()" required>
                    <label class="custom-control-label" for="customRadio2">2000元</label>
                    
                </div>
                <div class="custom-control custom-radio custom-control-inline align-items-center mr-0">
                    <input type="radio" name="mon" id="customRadio3" class="custom-control-input" onclick="block()" required>
                    <label class="custom-control-label" for="customRadio3">其他金額&nbsp;</label>
                    <input type="number" class="form-control3 test1" name="mon" id="validationCustom" placeholder="需超過10元" min="10" onchange="nounder()">&nbsp;元
                </div>
                <div class="valid-feedback">
                    <i class="fas fa-check"></i>
                  </div>
                  <div class="invalid-feedback">
                      請輸入匯款金額!
                  </div>
                </div>                               
              </div>
              
            <div class="form-group col-md-6">
              <label for="validationCustom06" class="col-form-label">6. 預計匯款日期*</label>
              <input type="date" name="date" class="col-md test1" id="validationCustom06" placeholder="Date" required>
              <div class="valid-feedback">
                    <i class="fas fa-check"></i>
              </div>
              <div class="invalid-feedback">
                      請輸入匯款日期!
              </div>
            </div>            
          </div>    
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="validationCustom07" class="col-form-label">7. 匯款人帳戶(僅供查詢)*</label>
              <input type="text" name="account" class="col-md test1" id="validationCustom07" placeholder="(僅供查詢紀錄)" required>
              <div class="valid-feedback">
                    <i class="fas fa-check"></i>
              </div>
              <div class="invalid-feedback">
                      請輸入匯款人帳戶!
              </div>
            </div>
            <div class="form-group col-md-6">
              <label for="validationCustom08" class="col-form-label">8. 統編</label>
              <input type="text" name="editor" class="col-md test1" id="validationCustom08" placeholder="(若無則不必提供)">
              <div class="valid-feedback">
                    <i class="fas fa-check"></i>
              </div>
            </div>            
          </div>
          <div class="form-row">
            <div class="form-group col-12">
              <label for="validationCustom09" class="col-form-label">9. 備註</label>
              <textarea name="remarks" class="col-md test1" id="validationCustom01" placeholder="備註"></textarea>
              <div class="valid-feedback">
                    <i class="fas fa-check"></i>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary darkerbg float-right">提交</button>
          </form>
          <script>
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
  <?php 
    ini_set('display_errors','off');

    $name=$_POST['name'];
    $tel=$_POST['tel'];
    $mail=$_POST['mail'];
    $addr=$_POST['addr'];
    $mon=$_POST["mon"];
    $date=$_POST['date'];
    $account=$_POST['account'];
    $editor=$_POST['editor'];
    $remarks=$_POST['remarks'];

    if (!empty($name) && !empty($tel) && !empty($mon) && !empty($date) && !empty($account)){
      $sql='INSERT INTO don(Don_Name,Don_Tel,Don_Email,Don_Address,Don_Money,Don_Date,Don_Account,Don_Editor,Don_Remarks) VALUES("'.$name.'","'.$tel.'","'.$mail.'","'.$addr.'","'.$mon.'","'.$date.'","'.$account.'","'.$editor.'","'.$remarks.'")';
      mysqli_query($conn,$sql);

      // $sqltel='INSERT INTO don(Don_Tel) VALUES("'.$tel.'")';
      // mysqli_query($conn,$sqltel);

      // $sqlmail='INSERT INTO don(Don_Email) VALUES("'.$mail.'")';
      // mysqli_query($conn,$sqlmail);

      // $sqladdr='INSERT INTO don(Don_Address) VALUES("'.$addr.'")';
      // mysqli_query($conn,$sqladdr);

      // $sqlmon='INSERT INTO don(Don_Money) VALUES("'.$mon.'")';
      // mysqli_query($conn,$sqlmon);

      // $sqldate='INSERT INTO don(Don_Date) VALUES("'.$date.'")';
      // mysqli_query($conn,$sqldate);

      // $sqlacc='INSERT INTO don(Don_Account) VALUES("'.$account.'")';
      // mysqli_query($conn,$sqlacc);

      // $sqledi='INSERT INTO don(Don_Editor) VALUES("'.$editor.'")';
      // mysqli_query($conn,$sqledi);

      // $sqrem='INSERT INTO don(Don_Remarks) VALUES("'.$remarks.'")';
      // mysqli_query($conn,$sqlrem);
    }
  ?>
</section>

<!-- /捐款表單 -->

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