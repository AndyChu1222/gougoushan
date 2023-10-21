<?php
	ini_set('display_errors','off');
	include("dbcon.php");
	session_start();
	$userId=$_SESSION['userid'];
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="utf-8">
    <title>GougouShan</title>
    <style type="text/css">
            @import url(volmanage.css);
	</style>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <!--要用jquery需加入下面這行-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://kit.fontawesome.com/09745b270c.js" crossorigin="anonymous"></script>
	<script src="volmanage.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
  	<!--tooltip-->
	<script src='https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js'></script>
  	<!-- Moment.js v2.20.0 -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.0/moment.min.js"></script>
	<!-- FullCalendar v3.8.1 -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.1/fullcalendar.min.css" rel="stylesheet"  />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.1/fullcalendar.print.css" rel="stylesheet" media="print"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.1/fullcalendar.min.js"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/zh-tw.min.js'></script>
	<!--此pooper的bundle script務必要放在所有引入的最底下，不然日曆的modal會彈不出來-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</head>

<body id="bootstrap-overrides">
		<!--每個解析度下container-fluid沒有設定寬度，會呈現滿版的布局-->
	<div class="container-fluid">
		<div class="row" >
		 <div class="col-md-12"> 
		 	 <!--螢幕寬度>=992px時做出橫列導覽列-->
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
							 			<span>
							 			    <a class="nav-link mx-3" href="vollogin.php" id="v1">登入/註冊</a>
							 		    </span>								  		
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
		        		<button type="submit" class="btn btn-danger">確認登出</button>
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
	<div id="no_back" class="cover h-100 w-100" data-src="pic/vol_banner.jpg"></div>
	<div id="no_top" class="container-fluid">
	  	<div class="row align-items-center justify-content-center">
	  		<div class="col-12 text-white text-center"><!--Height 100%-->
	  			<!--這裡vmax意思是，我的字體大小是螢幕最"長"邊的4%，vmin意思是，我的字體大小是螢幕最"短"邊的XX%-->
		        <h1 style="font-size:5vmax;">個人專區</h1> <!--類似h1的作法可設置display-(1~4)--> 
	        </div>
	    </div>
	  </div>
</header>

<!--以上是志工管理的banner-->

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-MZ4YGERFHR"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'G-MZ4YGERFHR');
</script>

<section class="pb-5 mt-2">
	<div class="container">
		<div class="row justify-content-center">
			<button type="button" class="btn btn-primary m-3" id="m1" onclick="showdiv('mydata');">我的基本資料</button>
			<button type="button" class="btn btn-primary m-3 darkerbg" id="j1" onclick="showdiv('join');">活動服務紀錄</button>
			<button type="button" class="btn btn-primary m-3" id="a1" onclick="showdiv('apply');">申請參與時段</button>
		</div>
	</div>
	<?php 

	//記住，要動用到SQL語法的PHP，擺放的位置也很重要，如果這段擺在表單後面，那麼秀出來的資料就不是新資料了
		  	ini_set('display_errors','off');
		  	$name=$_POST['name'];
		  	$sex=$_POST['sex'];
		  	$bday=$_POST['bday'];
		  	$tel=$_POST['tel'];
		  	$work=$_POST['work'];

		  	$kno_arr=$_POST['know'];
		    $spe_arr=$_POST['spe'];
		    $rea_arr=$_POST['reason'];

		    $kno= implode("、", $kno_arr); //在陣列中的每個欄位的值之間插入頓號形成字串
		    $spe= implode("、", $spe_arr);
		    $rea= implode("、", $rea_arr);

			if (!empty($name) || !empty($sex) || !empty($tel)){
				$sql="UPDATE vol SET Vol_Name = '$name',Vol_Sex = '$sex',Vol_Tel = '$tel' WHERE Vol_ID = $userId;";
				mysqli_query($conn,$sql);
			}
			if (!empty($bday)){
				$sql="UPDATE vol SET Vol_Birth = '$bday' WHERE Vol_ID = $userId;";
				mysqli_query($conn,$sql);
			}
			if (!empty($work)){
				$sql="UPDATE vol SET Vol_Job = '$work' WHERE Vol_ID = $userId;";
				mysqli_query($conn,$sql);
			}
			if (!empty($kno)){
				$sql="UPDATE vol SET Vol_Get = '$kno' WHERE Vol_ID = $userId;";
				mysqli_query($conn,$sql);
			}else{
				$sql="UPDATE vol SET Vol_Get = '' WHERE Vol_ID = $userId;";
				mysqli_query($conn,$sql);
			}
			if (!empty($spe)){
				$sql="UPDATE vol SET Vol_Spe = '$spe' WHERE Vol_ID = $userId;";			
				mysqli_query($conn,$sql);
			}else{
				$sql="UPDATE vol SET Vol_Spe = '' WHERE Vol_ID = $userId;";
				mysqli_query($conn,$sql);
			}
			if (!empty($rea)){
				$sql="UPDATE vol SET Vol_Rea = '$rea' WHERE Vol_ID = $userId;";
				mysqli_query($conn,$sql);
			}else{
				$sql="UPDATE vol SET Vol_Rea = '' WHERE Vol_ID = $userId;";
				mysqli_query($conn,$sql);
			}//請與第550行程式作接續，因為那段程式有JS要勾選格子的關係，必須等HTML載入完才能勾選，所以我把那段程式放到第466行去了

			$vjid=$_POST['vjid'];
			if(!empty($vjid)){
				//只要按下報名就人數減一		
				$sql_join="UPDATE voljoin SET VolJoin_Num= VolJoin_Num-1 WHERE VolJoin_ID = '$vjid';";
				$sql_join2="INSERT INTO vol_voljoin(VJ_VolID,VJ_VjID) values($userId,'$vjid');";
				mysqli_query($conn,$sql_join);mysqli_query($conn,$sql_join2); //使用multi_query有時會有bug，要注意					
			}			

			$sql="SELECT VJ_VjID FROM vol_voljoin WHERE VJ_VolID=$userId;"; //取出這個人參加了哪幾項活動
			$rts=mysqli_query($conn,$sql);
			$vj_arr=array();
			while($row=mysqli_fetch_array($rts)){
				array_push($vj_arr, $row[0]);
			}
			//print_r($vj_arr);
			$vj= implode(",", $vj_arr);
			echo '<script>localStorage.setItem("vjlist","'.$vj.'")</script>';
			
	?>
	<div id="mydata" style="display:none;margin: 0px auto;width:60%;">
		<div class="container rounded bg-white p-3 m-2">
			<div class="row px-3">
				<table class="table table-striped table-responsive-lg mb-0" style="text-align: left;">
				    <tr>
				      <th scope="row">帳號</th>
				      <td>
				      	<?php 
				      		$sqlVol="SELECT * FROM vol WHERE Vol_ID = $userId";
				      		$rtsVol=mysqli_query($conn,$sqlVol);
				      		while($rowVol=mysqli_fetch_array($rtsVol)){
				      			echo "{$rowVol['Vol_Email']}";
				      			$acc=$rowVol['Vol_Email'];
				      	?>
				      	<button type="button" class="btn btn-sm btn-outline-danger ml-2" data-toggle="modal" data-target="#mypwd">
			 		 		變更密碼
						</button>
					  </td>
				      <th scope="row">姓名</th>
				      <td><?php echo "{$rowVol['Vol_Name']}"; $nn=$rowVol['Vol_Name']; ?></td>
				    </tr>
				    <tr>
				      <th scope="row">性別</th>
				      <td><?php echo "{$rowVol['Vol_Sex']}"; $sx=$rowVol['Vol_Sex']; ?></td>
				      <th scope="row">職業</th>
				      <td><?php echo "{$rowVol['Vol_Job']}"; $jj=$rowVol['Vol_Job']; ?></td>
				    </tr>
				    <tr>
				      <th scope="row">出生日期</th>
				      <td><?php echo "{$rowVol['Vol_Birth']}";$bb=$rowVol['Vol_Birth'];?></td>
				      <th scope="row">手機</th>
				      <td><?php echo "{$rowVol['Vol_Tel']}";$pp=$rowVol['Vol_Tel'];?></td>
				    </tr>
				    <tr>
				      <th scope="row">得知方式</th>
				      <td colspan="3"><?php echo "{$rowVol['Vol_Get']}";?></td>				    	
				    </tr>
				    <tr>
				      <th scope="row">願意服務的項目</th>
				      <td colspan="3"><?php echo "{$rowVol['Vol_Spe']}";?></td>
				    </tr>
				    <tr class="border-bottom">
				      <th scope="row">參加志工的動機</th>
				      <td colspan="3"><?php echo "{$rowVol['Vol_Rea']}"; $pOld=$rowVol['Vol_Pass'];} //這個右括號是while的結尾 ?></td>
				    </tr>
				</table>
				<div class="col-12">
					<button type="button" class="btn darkerbg float-right text-white mt-2" data-toggle="modal" data-target="#my">
			 		 編輯
					</button>
				</div>

			</div>

		</div>
		<div class="modal fade" id="mypwd" tabindex="-1" role="dialog" aria-labelledby="mTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title pl-3" id="mTitle">變更密碼</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>

		      <form class="container rounded bg-white p-3 needs-validation" action="vollogin.php" method="POST" novalidate="">
		      	<div class="modal-body">
		        	<div class="form-row">
					  	<div class="form-group col-md-12 text-center">
					  		您的帳號：<?php echo $acc; ?>				  			
					  	</div>		        			
		        	</div>
					<div class="form-row">
						<div class="form-group col-12">
						    <label for="PwdoldId">－舊密碼</label>
						    <input type="password" class="col-md reborder" name="passOld" id="PwdoldId" placeholder="輸入舊密碼" required>	
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-12">
						    <label for="PwdId">－新密碼</label>
						    <input type="password" class="col-md reborder" name="passNew" id="PwdId" placeholder="至少6位數須含英文與數字。" pattern="^([a-zA-Z]+\d+\W*|\d+[a-zA-Z]+\W*|\d+\W*[a-zA-Z]+|[a-zA-Z]+\W*\d+|\W*\d+[a-zA-Z]+|\W*[a-zA-Z]+\d+)[a-zA-Z0-9]*$" required>
						    <div class="valid-feedback"></div>
					        <div class="invalid-feedback">密碼至少6位數，須含英文與數字</div> 		
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-12">
						    <label for="cPwdId">－確認密碼</label>
						    <input type="password" class="col-md pwds reborder" name="passNew2" id="cPwdId" placeholder="再次輸入新密碼以確認" required>
						    <div class="valid-feedback" id="cPwdValid"></div>
					        <div class="invalid-feedback" id="cPwdInvalid">未輸入。</div>
						</div>						
					</div>
		      	</div>
			    <div class="modal-footer pb-0">
			    	<script>function subfm2() {
						localStorage.setItem("cnt2",1);
						return true;
					}</script>
			        <button type="submit" class="btn btn-success" id="submitBtn" onclick="return subfm2();">確認變更</button>
			    </div>
			   </form>
			   <?php 
			   		//變更密碼
			   		$passOld=$_POST["passOld"];
			   		$passNew=$_POST["passNew"];
			   		$passNew2=$_POST["passNew2"];
			   		if (!empty($passOld) && !empty($passNew) && !empty($passNew2) && $passOld == $pOld){
			   			$sqlup='UPDATE vol SET Vol_Pass ="'.$passNew.'" WHERE Vol_ID = "'.$userId.'";';
			   			mysqli_query($conn,$sqlup);
			   			session_destroy();
						echo "<script>alert('"."您已成功修改密碼，請立即重新登入。"."');window.location = 'vollogin.php';</script>";
			   			$passOld='';			   			
			   		}else{
			   			if(!empty($passOld) && $passOld != $pOld){
							echo "<script>alert('"."您輸入的舊密碼與原先設定不符，請重新輸入。"."');$('#mypwd').modal('show');</script>";
							$passOld='';
			   			}			   			
			   		}
			   ?> 
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
		<div class="modal fade" id="my" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title pl-3" id="exampleModalLabel">編輯基本資料</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <form action="volmanage.php" method="POST">
			      <div class="modal-body overflo_modal">
			        <div class="container rounded bg-white p-3">
						  <div class="form-row">
							    <div class="form-group col-12 text-center">
							    	帳號：<?php echo $acc; ?>	
							    </div>
						  </div>
						  <hr>
						  <div class="form-row">
							    <div class="form-group col-md-6">
							      <label for="iName">姓名</label> <!--label for功能：表示Label標籤要繫結的HTML元素，你點選這個標籤的時候，所繫結的元素將獲取焦點。-->
							      <input type="text" class="form-control" placeholder="" name="name" id="iName" value="<?php echo $nn;?>">
							    </div>
							    <div class="form-group col-md-6">
							    	<label class="w-100">性別</label> <!--有小bug，在此按tab時只選的到男選不到女-->
									<div class="form-check form-check-inline">
									  <input name="sex" class="form-check-input" type="radio" name="inlineRadioOptions" id="iboy" value="男"/>
									  <label class="form-check-label" for="iboy">男</label>
									</div>
									<div class="form-check form-check-inline">
									  <input name="sex" class="form-check-input" type="radio" name="inlineRadioOptions" id="igirl" value="女"/>
									  <label class="form-check-label" for="igirl">女</label>
									</div>									
									<?php echo "<script>checksex('".$sx."');</script>";//此行必須放在上面兩個radio跑完的下面?>
							    </div>			    
						  </div> 

						  <div class="form-row">
							    <div class="form-group col-md-6">
							      <label for="iBirth">出生日期</label>
							      <!--DatePicker的其他樣式https://bootstrap-datepicker.readthedocs.io/en/latest/index.html-->
							       <input type="date" min="1800-01-01" max="3000-12-31" class="form-control" id="iBirth" name="bday" value="<?php echo $bb;?>">
							    </div>
							    <div class="form-group col-md-6">
							      <label for="iJob">職業</label>
							      <select id="iJob" class="form-control" name="work">
							      	<option selected disabled value="">請選擇</option>
							        <option value="工商人士">工商人士</option>
							        <option value="軍公教人員">軍公教人員</option>
							        <option value="退休人員">退休人員</option>
							        <option value="家管">家管</option>
							        <option value="學生">學生</option>
							        <option value="其他">其他</option>
							      </select>
						  		</div>
						  		<?php echo "<script>checkjob('".$jj."');</script>";?>
						  </div>
						  <div class="form-row">
							    <div class="form-group col-md-6">
							         <label for="iPhone">手機</label>
							      	 <input name="tel" type="text" class="form-control" id="iPhone" placeholder="例：09xx-xxxxxx" value="<?php echo $pp;?>">
							    </div>
							    <div class="form-group col-md-6">
							    	<label for="ilnow">得知方式</label>
							    	<div class="w-100"></div>
							    	<div class="form-control d-flex justify-content-between">
							    			<div class="checkbox d-inline">
									  			<input type="checkbox" name="know[]" id="k1" value="親友介紹" class="largerCheckbox setcboxT">&nbsp;親友介紹
											</div>
											<div class="checkbox d-inline">
											  <input type="checkbox" name="know[]" id="k2" value="網路得知" class="largerCheckbox setcboxT">&nbsp;網路得知
											</div>		
											<div class="checkbox d-inline">
											  <input type="checkbox" name="know[]" id="k3" value="攤位得知" class="largerCheckbox setcboxT">&nbsp;攤位得知
											</div>	
							    	</div>
						  		</div>
						  </div>
						  <hr>
						  <div class="form-row">
							    <div class="form-group col-md-6">
							        <label for="iSkill">願意服務的項目</label>
							        <div class="w-100"></div>
							        <div class="row border bord-color w-100 rounded py-2" style="margin:0rem !important;">
							    		<div class="col-md-4 col-6">
							    			<div class="checkbox d-inline setcboxM">
									  			<input type="checkbox" name="spe[]" id="s1" value="設備裝修" class="largerCheckbox setcboxT">&nbsp;設備裝修
											</div>
							    		</div>
							    		<div class="col-lg-4 col-6">
											<div class="checkbox d-inline setcboxM">
											  <input type="checkbox" name="spe[]" id="s2" value="園藝造景" class="largerCheckbox setcboxT">&nbsp;園藝造景
											</div>			    			
							    		</div>
							    		<div class="col-lg-4 col-6">
											<div class="checkbox d-inline setcboxM">
											  <input type="checkbox" name="spe[]" id="s3" value="環境清潔" class="largerCheckbox setcboxT">&nbsp;環境清潔
											</div>			    			
							    		</div>
							    		<div class="col-lg-4 col-6">
											<div class="checkbox d-inline setcboxM">
											  <input type="checkbox" name="spe[]" id="s4" value="毛孩照顧" class="largerCheckbox setcboxT">&nbsp;毛孩照顧
											</div>			    			
							    		</div>
							    		<div class="col-lg-4 col-6">
											<div class="checkbox d-inline setcboxM">
											  <input type="checkbox" name="spe[]" id="s5" value="資訊小編" class="largerCheckbox setcboxT">&nbsp;資訊小編
											</div>			    			
							    		</div>
							    		<div class="col-lg-4 col-6">
											<div class="checkbox d-inline setcboxM">
											  <input type="checkbox" name="spe[]" id="s6" value="行銷宣傳" class="largerCheckbox setcboxT">&nbsp;行銷宣傳
											</div>			    			
							    		</div>
							    		<div class="col-lg-4 col-6">
											<div class="checkbox d-inline setcboxM">
											  <input type="checkbox" name="spe[]" id="s7" value="商品設計" class="largerCheckbox setcboxT">&nbsp;商品設計
											</div>			    			
							    		</div>
							    	</div>
								</div>
							    <div class="form-group col-md-6">
							  		<label for="ireason">參加志工的動機</label>
								    <div class="w-100"></div> <!--padding的設定是上右下左喔!-->
								    <div class="row border bord-color w-100 rounded" style="margin:0rem !important;padding:.5rem 0px 2rem 0px;">
								    	<div class="col-sm-4 col-6">
											<div class="checkbox d-inline setcboxM">
											  <input type="checkbox" name="reason[]" id="r1" value="樂於幫助" class="largerCheckbox setcboxT">&nbsp;樂於幫助
											</div>
							    		</div>
							    		<div class="col-sm-4 col-6">
											<div class="checkbox d-inline setcboxM">
											  <input type="checkbox" name="reason[]" id="r2" value="喜愛毛孩" class="largerCheckbox setcboxT">&nbsp;喜愛毛孩
											</div>		    			
							    		</div>
							    		<div class="col-sm-4 col-6">
											<div class="checkbox d-inline setcboxM">
											  <input type="checkbox" name="reason[]" id="r3" value="親友邀請" class="largerCheckbox setcboxT">&nbsp;親友邀請
											</div>			    			
							    		</div>
							    		<div class="col-sm-4 col-6">
											<div class="checkbox d-inline setcboxM">
											  <input type="checkbox" name="reason[]" id="r4" value="課業需求" class="largerCheckbox setcboxT">&nbsp;課業需求
											</div>			    			
							    		</div>
							    		<div class="col-sm-4 col-6">
											<div class="checkbox d-inline setcboxM">
											  <input type="checkbox" name="reason[]" id="r5" value="工作需求" class="largerCheckbox setcboxT">&nbsp;工作需求
											</div>			    			
							    		</div>
							    		<div class="col-sm-4 col-6">
											<div class="checkbox d-inline setcboxM">
											  <input type="checkbox" name="reason[]" id="r6" value="其他" class="largerCheckbox setcboxT">&nbsp;其他
											</div>			    			
							    		</div>
								    </div>
							    </div>
						  </div>
					</div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
			        <button type="submit" class="btn btn-success" onclick="return subfm2();">儲存</button>
			        <!--Modal傳資料可參考https://www.superglobals.net/submit-form-bootstrap-modal/-->
			      </div>		      	
		      </form>
		      <?php //請與第221行程式作對照
		     	if (!empty($kno) || !empty($spe) || !empty($rea)){
			  		if (!empty($kno)){ 
						echo '<script type="'.'text/javascript'.'">checkKnow("'.$kno.'");</script>';						
					}
					if (!empty($spe)){ 
						echo '<script type="'.'text/javascript'.'">checkSpe("'.$spe.'");</script>';						
					}
			  		if (!empty($rea)){ 
						echo '<script type="'.'text/javascript'.'">checkRea("'.$rea.'");</script>';						
					}
			  	}else{
			  		$sql="SELECT * FROM vol WHERE Vol_ID = $userId";
					$rts=mysqli_query($conn,$sql);
					while($row=mysqli_fetch_array($rts)){
						if (!empty($row['Vol_Get'])){
							echo '<script type="'.'text/javascript'.'">checkKnow("'.$row['Vol_Get'].'");</script>';
						}
						if (!empty($row['Vol_Spe'])){
							echo '<script type="'.'text/javascript'.'">checkSpe("'.$row['Vol_Spe'].'");</script>';
						}
						if (!empty($row['Vol_Rea'])){
							echo '<script type="'.'text/javascript'.'">checkRea("'.$row['Vol_Rea'].'");</script>';
						}
					}
			  	}
		      ?>
		    </div>
		  </div>
		</div>	
	</div>
	<div id="join" style="margin: 0px auto;width:60%;">
		<div class="container rounded bg-white p-3 m-2 table-responsive-lg">
				<table class="table table-striped">
				  <thead class="w-100">
				    <tr style="text-align: center;">
				      <th scope="col" class="wider">服務名稱</th>
				      <th scope="col" >服務時間</th>
				      <th scope="col" class="wider">地點</th>
				      <th scope="col">服務內容</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php
				  		for ($i=0;$i<count($vj_arr);$i++){
				  			$sql="SELECT VolJoin_Name,VolJoin_StartDT,VolJoin_EndDT,VolJoin_Place,VolJoin_Content FROM voljoin WHERE VolJoin_ID LIKE '$vj_arr[$i]'";
				  			$rts = mysqli_query($conn,$sql);
				  			while($row=mysqli_fetch_array($rts)){
				  				echo "<tr>
								      	<th scope='row' style='text-align: center;'>$row[0]</th>";
								$from=substr($row[1],0,16);
								$to=substr($row[2],0,16);
								$cmp=strncmp($row[1],$row[2],10);
								if ($cmp!=0){
									echo "	
										<td style='text-align: center;font-size:.95rem;'>
										$from<br>至<br>$to
									    </td>
									    <td style='text-align: center;'>$row[3]</td>
									    <td>$row[4]</td>
									  </tr>";									
								}else{
									$to=substr($row[2],11,5);
									echo "
										<td style='text-align: center;'>	
										$from~$to
									    </td>
									    <td style='text-align: center;'>$row[3]</td>
									    <td>$row[4]</td>
									  </tr>";
								}
				  			}
				  		} 				  		
				   ?>
				  </tbody>
			    </table>
		</div>
	</div>
		
	<div id="apply" style="display:none;margin: 0px auto;width:60%;">
		<div class="container p-2">
			<div class="row border_dash">
				<div class="col-12 text-center bg-white py-2 border_dash1"><a class="clear dropfrom"><i class="fas fa-caret-down"></i> 例行服務時段</a></div>
				<div class="col-12 bg-white drophere table-responsive py-3">
					<table class="table table-bordered text-center">
						<thead>
							<tr>
								<th></th>
								<th>週一</th>
								<th>週二</th>
								<th>週三</th>
								<th>週四</th>
								<th>週五</th>
								<th>週六</th>
								<th>週日</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th>上午</th>
								<th>
									<span id="thAm1"></span>
								</th>
								<th>
									<span id="thAm2"></span>
								</th>
								<th>
									<span id="thAm3"></span>
								</th>
								<th>
									<span id="thAm4"></span>
								</th>
								<th>
									<span id="thAm5"></span>
								</th>
								<th>
									<span id="thAm6"></span>
								</th>
								<th>
									<span id="thAm7"></span>
								</th>
							</tr>
								<th>下午</th>
								<th>
									<span id="thPm1"></span>
								</th>
								<th>
									<span id="thPm2"></span>
								</th>
								<th>
									<span id="thPm3"></span>
								</th>
								<th>
									<span id="thPm4"></span>
								</th>
								<th>
									<span id="thPm5"></span>
								</th>
								<th>
									<span id="thPm6"></span>
								</th>
								<th>
									<span id="thPm7"></span>
								</th>								
							</tr>
						</tbody>
					</table>
					<span style="font-size: 0.9rem" class="float-left mb-2">
						備註：上午時段為 9:00~12:00；下午時段為 13:00~17:00。<br>
						&emsp;&emsp;&emsp;服務地點分為狗場（<img src="pic/icon_dog.png" alt="icon_dog" style="width:1rem;">）、貓屋（<img src="pic/icon_cat.png" alt="icon_cat" style="width:1rem;">）。
					</span>
					<div class="p-2 float-right mb-2">		
						<button type="button" class="btn btn-primary darkerbg" data-toggle="modal" data-target=".editRTime">
				 		 修改
						</button>
					</div>						
				</div>
			</div>
			<hr>
			<div class="row border_dash">
				<div class="col-12 text-center bg-white py-2 border_dash1"><a class="clear dropfrom2"><i class="fas fa-caret-down"></i> 其他服務時段</a></div>
				<div class="col-12 bg-white drophere2 p-3">
					<div id="service_cal"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- 設定日曆上的事件要跳出的modal -->
	<div class="modal modal-top" id="modal-view-event">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title w-100 text-center"><span class="event-icon"></span><span class="event-title"></span></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          				<span aria-hidden="true">&times;</span>
	        		</button>					
				</div>
				<form action="volmanage.php" method="POST">
					<div class="modal-body">					
						<div class="event-body"></div>
						<div class="event-num"></div>
					</div>
					<div class="modal-footer">
						 <script>
						 	function checkSub1(){
								alert('謝謝您的加入，已送出申請，將為您跳轉至「參與紀錄」以查看。');
							}
						</script>
						<button type="submit" class="btn btn-success" id="sub1" onclick="checkSub1();">我願意加入！</button>	
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- /設定日曆上的事件要跳出的modal -->
	<!-- 設定例行服務時段跳出的modal -->
	<div class="modal fade editRTime" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">編輯例行時段</h5><div style="font-size: 0.5rem;padding-top: .5rem;">（同一時段，狗場或貓屋只能擇一前往）</div>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <form action="volmanage.php" method="POST" id="form1">
		      	<div class="modal-body table-responsive">
		      		<p>服務場地：狗場（<img src="pic/icon_dog.png" alt="icon_dog" style="width:1rem;padding-bottom: .3rem;">）</p>
						<table class="table table-bordered text-center">
							<thead>
								<tr>
									<th></th>
									<th>週一</th>
									<th>週二</th>
									<th>週三</th>
									<th>週四</th>
									<th>週五</th>
									<th>週六</th>
									<th>週日</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th>上午</th>
									<th>
										<input type="checkbox" name="Gam[]" value="1" id="d1" class="largerCheckbox">
									</th>
									<th>
										<input type="checkbox" name="Gam[]" value="2" id="d2" class="largerCheckbox">
									</th>
									<th>
										<input type="checkbox" name="Gam[]" value="3" id="d3" class="largerCheckbox">
									</th>
									<th>
										<input type="checkbox" name="Gam[]" value="4" id="d4" class="largerCheckbox">
									</th>
									<th>
										<input type="checkbox" name="Gam[]" value="5" id="d5" class="largerCheckbox">
									</th>
									<th>
										<input type="checkbox" name="Gam[]" value="6" id="d6" class="largerCheckbox">
									</th>
									<th>
										<input type="checkbox" name="Gam[]" value="7" id="d7" class="largerCheckbox">		
									</th>
								</tr>
									<th>下午</th>
									<th>
										<input type="checkbox" name="Gpm[]" value="1" id="d1-2" class="largerCheckbox">
									</th>
									<th>
										<input type="checkbox" name="Gpm[]" value="2" id="d2-2" class="largerCheckbox">
									</th>
									<th>
										<input type="checkbox" name="Gpm[]" value="3" id="d3-2" class="largerCheckbox">
									</th>
									<th>
										<input type="checkbox" name="Gpm[]" value="4" id="d4-2" class="largerCheckbox">
									</th>
									<th>
										<input type="checkbox" name="Gpm[]" value="5" id="d5-2" class="largerCheckbox">
									</th>
									<th>
										<input type="checkbox" name="Gpm[]" value="6" id="d6-2" class="largerCheckbox">
									</th>
									<th>
										<input type="checkbox" name="Gpm[]" value="7" id="d7-2" class="largerCheckbox">
									</th>								
								</tr>
							</tbody>
						</table>
					<p>服務場地：貓屋（<img src="pic/icon_cat.png" style="width:1rem;padding-bottom: .3rem;"/>）</p>
						<table class="table table-bordered text-center">
							<thead>
								<tr>
									<th></th>
									<th>週一</th>
									<th>週二</th>
									<th>週三</th>
									<th>週四</th>
									<th>週五</th>
									<th>週六</th>
									<th>週日</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th>上午</th>
									<th>
										<input type="checkbox" name="Cam[]" value="1" id="c1" class="largerCheckbox">
									</th>
									<th>
										<input type="checkbox" name="Cam[]" value="2" id="c2" class="largerCheckbox">
									</th>
									<th>
										<input type="checkbox" name="Cam[]" value="3" id="c3" class="largerCheckbox">
									</th>
									<th>
										<input type="checkbox" name="Cam[]" value="4" id="c4" class="largerCheckbox">
									</th>
									<th>
										<input type="checkbox" name="Cam[]" value="5" id="c5" class="largerCheckbox">
									</th>
									<th>
										<input type="checkbox" name="Cam[]" value="6" id="c6" class="largerCheckbox">
									</th>
									<th>
										<input type="checkbox" name="Cam[]" value="7" id="c7" class="largerCheckbox">		
									</th>
								</tr>
									<th>下午</th>
									<th>
										<input type="checkbox" name="Cpm[]" value="1" id="c1-2" class="largerCheckbox">
									</th>
									<th>
										<input type="checkbox" name="Cpm[]" value="2" id="c2-2" class="largerCheckbox">
									</th>
									<th>
										<input type="checkbox" name="Cpm[]" value="3" id="c3-2" class="largerCheckbox">
									</th>
									<th>
										<input type="checkbox" name="Cpm[]" value="4" id="c4-2" class="largerCheckbox">
									</th>
									<th>
										<input type="checkbox" name="Cpm[]" value="5" id="c5-2" class="largerCheckbox">
									</th>
									<th>
										<input type="checkbox" name="Cpm[]" value="6" id="c6-2" class="largerCheckbox">
									</th>
									<th>
										<input type="checkbox" name="Cpm[]" value="7" id="c7-2" class="largerCheckbox">
									</th>								
								</tr>
							</tbody>
						</table>
					<?php
						$sql="SELECT Remark_Word From remark;";
						$rts=mysqli_query($conn,$sql);
						while($row=mysqli_fetch_array($rts)){
						    echo "<label class='w-100' style='color:red;'>※{$row[0]}</label>";
						}
					?>
		      	</div>		      	
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
		        	<script>function subfm1() {
						alert('資料繳交成功!');
						localStorage.setItem("cnt",1);
						return true;
					}</script>
		        	<button type="submit" class="btn btn-success" onclick="return subfm1();">儲存</button>
		        	<!--Modal傳資料可參考https://www.superglobals.net/submit-form-bootstrap-modal/-->
		      	</div>
		      </form>
		    </div>
		  </div>
		</div>
	</div>
	<!-- /設定例行服務時段跳出的modal -->

	<?php 
	    $gam_arr=$_POST['Gam'];
	    $gpm_arr=$_POST['Gpm'];
	    $cam_arr=$_POST['Cam'];
	    $cpm_arr=$_POST['Cpm'];

	    $gam= implode(",", $gam_arr); //在陣列中的每個欄位的值之間插入逗號形成字串
	    $gpm= implode(",", $gpm_arr);
	    $cam= implode(",", $cam_arr);
	    $cpm= implode(",", $cpm_arr);

	    //echo $gam;echo $gpm;echo $cam;echo $cpm;
		$sql2="SELECT * FROM volact WHERE VA_ID = $userId";
		$results=mysqli_query($conn,$sql2);
		if(mysqli_num_rows($results) == 0) {
		    $sql='INSERT INTO volact(VA_ID,VA_NTime,VA_Ampm,VA_Area) VALUES("'.$userId.'","'.$gam.'","'.'上午'.'","'.'狗場'.'");';
		    $sql.='INSERT INTO volact(VA_ID,VA_NTime,VA_Ampm,VA_Area) VALUES("'.$userId.'","'.$gpm.'","'.'下午'.'","'.'狗場'.'");';
		    $sql.='INSERT INTO volact(VA_ID,VA_NTime,VA_Ampm,VA_Area) VALUES("'.$userId.'","'.$cam.'","'.'上午'.'","'.'貓屋'.'");';
		    $sql.='INSERT INTO volact(VA_ID,VA_NTime,VA_Ampm,VA_Area) VALUES("'.$userId.'","'.$cpm.'","'.'下午'.'","'.'貓屋'.'");';
		    mysqli_multi_query($conn,$sql);
			//以下4個if做的事是，如果他有新增資料，就秀出他新增幾項打勾、秀icon
			if (!empty($gam)){ 
				//echo '我是t='.$gam;
				echo '<script type="'.'text/javascript'.'">checkGam("'.$gam.'");showgamicon("'.$gam.'")</script>';						
			}
			if (!empty($gpm)){ 
				echo '<script type="'.'text/javascript'.'">checkGpm("'.$gpm.'");showgpmicon("'.$gpm.'")</script>';							
			}
			if (!empty($cam)){ 
				echo '<script type="'.'text/javascript'.'">checkCam("'.$cam.'");showcamicon("'.$cam.'")</script>';							
			}
			if (!empty($cpm)){ 
				echo '<script type="'.'text/javascript'.'">checkCpm("'.$cpm.'");showcpmicon("'.$cpm.'")</script>';							
			}	
		}else{
		    if (!empty($gam) || !empty($gpm) || !empty($cam) || !empty($cpm)){
			    $sql3='UPDATE volact SET VA_NTime ="'.$gam.'" WHERE VA_ID = "'.$userId.'" AND VA_Ampm = "'.'上午'.'" AND VA_Area = "'.'狗場'.'";';
			    $sql3.='UPDATE volact SET VA_NTime ="'.$gpm.'" WHERE VA_ID = "'.$userId.'" AND VA_Ampm = "'.'下午'.'" AND VA_Area = "'.'狗場'.'";';
			    $sql3.='UPDATE volact SET VA_NTime ="'.$cam.'" WHERE VA_ID = "'.$userId.'" AND VA_Ampm = "'.'上午'.'" AND VA_Area = "'.'貓屋'.'";';
			    $sql3.='UPDATE volact SET VA_NTime ="'.$cpm.'" WHERE VA_ID = "'.$userId.'" AND VA_Ampm = "'.'下午'.'" AND VA_Area = "'.'貓屋'.'";';
			    mysqli_multi_query($conn,$sql3); //若要用multi_query記得要加上;在每句sql的最後面
			    //以下4個if做的事是，如果他有更新資料，就秀出他更新後打勾的有哪幾項、秀icon		
				if (!empty($gam)){ 
					//echo '我是t='.$gam;
					echo '<script type="'.'text/javascript'.'">checkGam("'.$gam.'");showgamicon("'.$gam.'")</script>';						
				}
				if (!empty($gpm)){ 
					echo '<script type="'.'text/javascript'.'">checkGpm("'.$gpm.'");showgpmicon("'.$gpm.'")</script>';							
				}
				if (!empty($cam)){ 
					echo '<script type="'.'text/javascript'.'">checkCam("'.$cam.'");showcamicon("'.$cam.'")</script>';							
				}
				if (!empty($cpm)){ 
					echo '<script type="'.'text/javascript'.'">checkCpm("'.$cpm.'");showcpmicon("'.$cpm.'")</script>';							
				}
			}else{ //如果他沒有要更新資料
				while($row = mysqli_fetch_array($results)){
					if ($row['VA_Ampm']=='上午' && $row['VA_Area']=='狗場' && !empty($row['VA_NTime'])){
						//我們就只秀出他原本勾什麼、秀出狗icon
						echo '<script type="'.'text/javascript'.'">checkGam("'.$row['VA_NTime'].'");showgamicon("'.$row['VA_NTime'].'")</script>';
					}
					if ($row['VA_Ampm']=='下午' && $row['VA_Area']=='狗場' && !empty($row['VA_NTime'])){
						echo '<script type="'.'text/javascript'.'">checkGpm("'.$row['VA_NTime'].'");showgpmicon("'.$row['VA_NTime'].'")</script>';
					}
					if ($row['VA_Ampm']=='上午' && $row['VA_Area']=='貓屋' && !empty($row['VA_NTime'])){
						echo '<script type="'.'text/javascript'.'">checkCam("'.$row['VA_NTime'].'");showcamicon("'.$row['VA_NTime'].'")</script>';
					}
					if ($row['VA_Ampm']=='下午' && $row['VA_Area']=='貓屋' && !empty($row['VA_NTime'])){
						echo '<script type="'.'text/javascript'.'">checkCpm("'.$row['VA_NTime'].'");showcpmicon("'.$row['VA_NTime'].'")</script>';
					}					
				}				
			}
			     	
		}					
	?>
</section>
<!--以上是志工管理的內容-->
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
