<?php 
    ini_set('display_errors','off');
    include("dbcon.php");
    session_start();

    $sqlcatname="SELECT * FROM pet WHERE Pet_Breeds='貓咪' AND Pet_Adopt='未領養'";
    $showlistcat=mysqli_query($conn,$sqlcatname);

    $sqldogname="SELECT * FROM pet WHERE Pet_Breeds='狗狗' AND Pet_Adopt='未領養'";
    $showlistdog=mysqli_query($conn,$sqldogname);

?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="utf-8">
    <title>GougouShan</title>
    <style type="text/css">
            @import url(adopt.css);
	</style>
	<!--bootstrap.min.css的min意思是指程式碼經過壓縮的檔案，適合網站上線時使用，程式碼可讀性較低-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!--width=device-width將寬度設為設備的寬度，initial-scale=1 設定手機螢幕畫面的初始縮放比例為100%，shrink-to-fit=no是蘋果手機專屬的設定-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<!--bootstrap.bundle.min.js這行是為了要使用popper，popper可以用來做提示框元件，目前還沒用到-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/09745b270c.js" crossorigin="anonymous"></script>

  <script type="text/javascript">
    window.onload= function  change(){
     var list1 = document.getElementById("lists1").getElementsByTagName("option");
     var list2 = document.getElementById("lists2").getElementsByTagName("option");
     var list3 = document.getElementById("lists3").getElementsByTagName("option");
     var list4 = document.getElementById("lists4").getElementsByTagName("option");
         for(i=0;i<list1.length;i++){
             list1[i].onclick = function(){
                 $("#validationCustom02").html(this.innerHTML);
             }
          }
          for(i=0;i<list2.length;i++){
             list2[i].onclick = function(){
                 $("#validationCustom06").html(this.innerHTML);
             }
          }
          for(i=0;i<list3.length;i++){
             list3[i].onclick = function(){
                 $("#validationCustom07").html(this.innerHTML);
             }
          }
          for(i=0;i<list4.length;i++){
             list4[i].onclick = function(){
                 $("#validationCustom08").html(this.innerHTML);
             }
          }          
         }
     
    
  </script>
  <script>
    function showpetname(select){
      // console.log("JS has entered!");
      // if (value=="cat") {
      //   alert('您選擇貓咪!');
      // }else{
      //   alert('您選擇狗狗!');
      // }
      if (select.value=="cat") {
        document.getElementById('showcat').style.display = "block";
        document.getElementById('showdog').style.display = "none";
        document.getElementById('validationCustom08').selectedIndex = "寵物名稱";
      }else{
        document.getElementById('showdog').style.display = "block";
        document.getElementById('showcat').style.display = "none";
        document.getElementById('validationCustom07').selectedIndex = "寵物名稱";
      }
      
    }
    
  </script>
</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-MZ4YGERFHR"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'G-MZ4YGERFHR');
</script>
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
            <h1 style="font-size:5vmax;">領養意願表單</h1> <!--類似h1的作法可設置display-(1~4)--> 
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
            <li class="breadcrumb-item active" aria-current="page">領養意願表單</li>
          </ol>
        </nav>         
      </div>
    </div>
  </div>
  <!-- 捐款表單 -->
  <div class="container pb-5">
    <div class="row align-items-center">
      <div class="col-10 mx-auto rounded bg-white px-5 py-4 box-shado">
        <form  class="needs-validation" action="adopt.php" method="POST" novalidate>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="validationCustom01" class="col-form-label">1. 您的姓名*</label>
                <input type="text" name="name" class="col-md test1" id="validationCustom01" placeholder="Name"  required>
                <div class="valid-feedback">
                     <i class="fas fa-check"></i>
                </div>
                <div class="invalid-feedback">
                        請輸入名字!
                </div>
              </div>
              <div class="form-group col-md-6">
                <label class="col-form-label">2. 性別*</label>
                <div class="form-control2">
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="customControlValidation1" name="sex" value="男" required>
                    <label class="custom-control-label" for="customControlValidation1">男</label>
                  </div>                    
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="customControlValidation2" name="sex" value="女" required>
                    <label class="custom-control-label" for="customControlValidation2">女</label>
                  </div>
                  <div class="valid-feedback">
                     <i class="fas fa-check"></i>
                </div>
                <div class="invalid-feedback">
                        請輸入性別!
                </div>
                </div>    
                
              </div>  
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="validationCustom02" class="form-label w-100 test">3. 職業別*</label>
                <select class="btn btn-light dropdown-toggle col-md" id="validationCustom02" name="work" required>
                  <option selected disabled value="" id="lists1">職業別</option>
                  <option value="工商人士">工商人士</option>
                  <option value="軍公教人員">軍公教人員</option>
                  <option value="退休人員">退休人員</option>
                  <option value="家管">家管</option>
                  <option value="學生">學生</option>
                  <option value="其他">其他</option>
                </select> 
                        
                <!-- <div class="dropdown-menu" role="menu" id="lists1">
                    <a class="dropdown-item" href="#">工商人士</a>
                    <a class="dropdown-item" href="#">軍公教人員</a>
                    <a class="dropdown-item" href="#">退休人員</a>
                    <a class="dropdown-item" href="#">家管</a>
                    <a class="dropdown-item" href="#">學生</a>
                    <a class="dropdown-item" href="#">其他</a>
                </div> -->
                <div class="valid-feedback">
                  <i class="fas fa-check"></i>
                </div>
                <div class="invalid-feedback">
                    請勾選職業別!
                </div>               
              </div>
              <div class="form-group col-md-6">
                <label for="validationCustom03" class="col-form-label">4. 連絡電話*</label>
                <input type="text" class="col-md test1" id="validationCustom03" placeholder="Tel" name="tel" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" required>
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
                <label for="validationCustom04" class="col-form-label">5. 電子郵件*</label>
                <input type="email" class="col-md test1" id="validationCustom04" placeholder="Email" name="mail" required>
                <div class="valid-feedback">
                  <i class="fas fa-check"></i>
                </div>
                <div class="invalid-feedback">
                    請輸入電子郵件或請更正電子郵件格式!
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="validationCustom05" class="col-form-label">6. 現居地址*</label>
                <input type="text" class="col-md test1" id="validationCustom05" placeholder="Address" name="addr" required>
                <div class="valid-feedback">
                  <i class="fas fa-check"></i>
                </div>
                <div class="invalid-feedback">
                    請輸入地址!
                </div>
              </div>              
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="validationCustom06" class="col-form-label w-100">7. 寵物別*</label>
                <select class="btn btn-light dropdown-toggle col-md" id="validationCustom06" onchange="showpetname(this);" name="pet" required>
                  <option selected disabled value="" id="lists2">寵物別</option>
                  <option value="cat">貓咪</option>
                  <option value="dog">狗狗</option>
                </select>
                
               <!--  <div class="dropdown-menu" role="menu" id="lists2">
                    <a class="dropdown-item" href="#">貓咪</a>
                    <a class="dropdown-item" href="#">狗狗</a>
                </div> -->
                <div class="valid-feedback">
                  <i class="fas fa-check"></i>
                </div>
                <div class="invalid-feedback">
                    請勾選寵物別!
                </div>
              </div>
              <?php
                //petname正確版本
                // include("dbcon.php");
                // ini_set('display_errors','off');
                // $pet=$_POST['pet'];
                // switch ($pet) {
                //   case '貓咪':
                //     $sqlpetname="SELECT Pet_Name FROM pet WHERE Pet_Breeds = '貓咪'";
                //     $listsqlpetname=mysqli_query($conn,$sqlpetname);
                //     break;
                //   case '狗狗':
                //     $sqlpetname="SELECT Pet_Name FROM pet WHERE Pet_Breeds = '狗狗'";
                //     $listsqlpetname=mysqli_query($conn,$sqlpetname);
                //     break;
                // }
              ?>                  
              <div class="form-group col-md-6"> <!-- 尚未required，使用者可能不輸入 -->
                <label for="validationCustom07" class="w-100 col-form-label">8. 寵物名稱*</label>
                    <div id="showcat" style="display:none;">
                      <select class="btn btn-light dropdown-toggle col-md" id="validationCustom07" name="petID">
                      <?php
                        echo "<option selected disabled value='' id='lists3'>寵物名稱</option>\n";
                        while($Qt_result = mysqli_fetch_assoc($showlistcat)){
                        $strID = (string) $Qt_result['Pet_ID'];  
                        $strQt = (string) $Qt_result['Pet_Name'];
                        echo "<option value=".$strID." >$strQt</option>\n";
                       }
                       ?>
                       </select>
                    </div>
                    <div id="showdog" style="display:block;">
                      <select class="btn btn-light dropdown-toggle col-md" id="validationCustom08" name="petID">
                      <?php
                       echo "<option selected disabled value='' id='lists4'>寵物名稱</option>\n";
                        while($Qt_result1 = mysqli_fetch_assoc($showlistdog)){
                        $strID1 = (string) $Qt_result1['Pet_ID'];  
                        $strQt1 = (string) $Qt_result1['Pet_Name'];
                        echo "<option value=".$strID1." >$strQt1</option>\n";
                       }
                      ?>
                     </select> 
                    </div>
                    <!-- <select class="btn btn-light dropdown-toggle col-md" id="validationCustom07" name="petname" required>
                    </select> -->
                    <!-- <div class="dropdown-menu" role="menu" id="lists3">
                        <a class="dropdown-item" href="#">Apple</a>
                        <a class="dropdown-item" href="#">Ban</a>
                        <a class="dropdown-item" href="#">Candy</a>
                    </div> -->
                    <div class="valid-feedback">
                      <i class="fas fa-check"></i>
                    </div>
                    <div class="invalid-feedback">
                        請勾選寵物名稱!
                    </div>
                </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="validationCustom09" class="col-form-label">9. 您的領養動機*</label>
                <textarea class="col-md test1" id="validationCustom08" name="dongi" placeholder="請輸入領養動機..." required></textarea>
                <div class="valid-feedback">
                     <i class="fas fa-check"></i>
                </div>
                <div class="invalid-feedback">
                        請敘述您的領養動機!
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="validationCustom10" class="col-form-label">10. 其他想問的問題</label>
                <textarea class="col-md test1" id="validationCustom09" name="ques" placeholder="歡迎提問~"></textarea>
                <div class="valid-feedback">
                      <i class="fas fa-check"></i>
                </div>
                    <!-- <div class="invalid-feedback">
                        Please choose a username.
                    </div> -->
              </div>              
            </div>
            <!-- <script>function subfm1() {

              alert('資料繳交成功!');
              return true;
            }</script> -->
            <button type="submit" name="submit" class="btn btn-primary darkerbg float-right">提交</button>
            <!-- <script>
              function mclick(){
                var r=confirm("送出後無法修改!")
                if(r==true){
                    return true
                }else{
                    return false
                }
              }
            </script> -->
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
            $sex=$_POST['sex'];
            $work=$_POST['work'];
            $tel=$_POST['tel'];
            $mail=$_POST['mail'];
            $addr=$_POST['addr'];
            $pet=$_POST['pet'];
            $petid=$_POST['petID'];
            $dongi=$_POST['dongi'];
            $ques=$_POST['ques'];

  if (!empty($name) && !empty($sex) && !empty($work) && !empty($tel) && !empty($mail) && !empty($addr) && !empty($pet) && !empty($petid)) {
    echo "<script>alert('資料繳交成功!')</script>";
    $sql='INSERT INTO ado(Pet_ID,Ado_Name,Ado_Sex,Ado_Work,Ado_Tel,Ado_Email,Ado_Address,Ado_Mot,Ado_Remarks) VALUES("'.$petid.'","'.$name.'","'.$sex.'","'.$work.'","'.$tel.'","'.$mail.'","'.$addr.'","'.$dongi.'","'.$ques.'")';
    mysqli_query($conn,$sql);
    
    // switch ($work) {
    //   case "工商人士":
    //     $sqlwork='INSERT INTO ado(Ado_Work) VALUES("'.$work.'")';
    //     mysqli_query($conn,$sqlwork);
    //     break;
    //   case "軍公教人員":
    //     $sqlwork='INSERT INTO ado(Ado_Work) VALUES("'.$work.'")';
    //     mysqli_query($conn,$sqlwork);
    //     break;
    //   case "退休人員":
    //     $sqlwork='INSERT INTO ado(Ado_Work) VALUES("'.$work.'")';
    //     mysqli_query($conn,$sqlwork);
    //     break;
    //   case "家管":
    //     $sqlwork='INSERT INTO ado(Ado_Work) VALUES("'.$work.'")';
    //     mysqli_query($conn,$sqlwork);
    //     break;
    //   case "學生":
    //     $sqlwork='INSERT INTO ado(Ado_Work) VALUES("'.$work.'")';
    //     mysqli_query($conn,$sqlwork);
    //     break;
    //   case "其他":
    //     $sqlwork='INSERT INTO ado(Ado_Work) VALUES("'.$work.'")';
    //     mysqli_query($conn,$sqlwork);
    //     break;
    // }
    
    // switch ($pet) {
    //   case "貓咪":
    //     $sqlpet='INSERT INTO pet(Pet_Breeds) VALUES("'.$pet.'")';
    //     mysqli_query($conn,$sqlpet);
    //     break;
    //   case "狗狗":
    //     $sqlpet='INSERT INTO pet(Pet_Breeds) VALUES("'.$pet.'")';
    //     mysqli_query($conn,$sqlpet);
    //     break;
    // }
    
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