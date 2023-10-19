<?php
	  ini_set('display_errors','off');
	  include("dbcon.php");
	  session_start();
	  $group=$_POST['group'];
	  $name=$_POST['name'];
	  $number=$_POST['num'];
	  $mail=$_POST['mail'];
	  $tel=$_POST['tel'];
	  $remarks=$_POST['remarks'];
	  $aIDD=$_POST['aIDD'];
	  
	  if ($group=="個人") {
	    $number=1;
	  }else{
	    $number=$_POST['num'];
	  }
	  if (!empty($name) && !empty($mail) && !empty($tel) && !empty($aIDD)){
	    $sql="INSERT INTO tour(Act_ID,Tour_UnitName,Tour_Name,Tour_Num,Tour_Email,Tour_Tel,Tour_Remarks,Tour_SubmitTime) VALUES('$aIDD','$group','$name',$number,'$mail','$tel','$remarks',NOW());";
	    mysqli_query($conn,$sql);
	    echo '<script>alert("表單繳交成功。");</script>';
	  }else if(!empty($name) && !empty($mail) && !empty($tel) && empty($aIDD)){
	  	echo '<script>alert("報名失敗，請先至「檢視活動」選取您想參與的活動。");</script>';
	  }
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="utf-8">
    <title>GougouShan</title>
    <style type="text/css">
            @import url(tourbook.css);
	</style>
	<!--bootstrap.min.css的min意思是指程式碼經過壓縮的檔案，適合網站上線時使用，程式碼可讀性較低-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!--width=device-width將寬度設為設備的寬度，initial-scale=1 設定手機螢幕畫面的初始縮放比例為100%，shrink-to-fit=no是蘋果手機專屬的設定-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<!--有時候用jquery沒有加入下面這2行就沒辦法正常執行，注意jQuery的引入檔盡量放在Bootstrap的引入檔之前-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>

	<script src="https://kit.fontawesome.com/09745b270c.js" crossorigin="anonymous"></script>
	<script src="tourbook.js"></script>
	<!-- 以下是Fullcalender需要的script -->
	<!-- Moment.js v2.20.0 -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.0/moment.min.js"></script>
	<!-- FullCalendar v3.8.1 -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.1/fullcalendar.min.css" rel="stylesheet"  />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.1/fullcalendar.print.css" rel="stylesheet" media="print"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.1/fullcalendar.min.js"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/zh-tw.min.js'></script>
	<!--bootstrap.bundle.min.js這行是為了要使用popper，popper可以用來做提示框元件，目前還沒用到-->
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
<section class="pb-5 mt-2">
	<div class="container justify-content-center">
		<div class="row justify-content-center">
			<button type="button" class="btn btn-primary m-3 darkerbg" id="b1" onclick="showdiv('book');">活動梯次</button>
			<button type="button" class="btn btn-primary m-3" id="s1" onclick="showdiv('showcal')">日曆檢視</button>
		</div>
		<div class="row">
			<div id="book" style="display:block;" class="bg-white p-3 m-2">
				<table class="table table-hover table-responsive-lg" style="text-align: center;">
				  <thead>
				    <tr>
				      <th scope="col" class="wider">活動名稱</th>
				      <th scope="col" class="wider">活動時間</th>
				      <th scope="col" class="wider">活動地點</th>
				      <th scope="col">活動內容</th>
				      <th scope="col" class="wider">報名狀態</th>
				      <th scope="col" class="wider">報名截止日期</th>
				      <th scope="col" class="wider"></th>
				    </tr>
				  </thead>
				  <tbody>
				  	
					  	<?php
					  		$sql="SELECT * FROM act";
					  		$rts = mysqli_query($conn,$sql);
					  		while($row=mysqli_fetch_array($rts)){
					  				echo "<tr>
					  						<form action='signup.php' method='POST'>
									        	<th scope='row'>$row[1]</th>";
									$from=substr($row[2],0,16);
									$to=substr($row[3],0,16);
									$cmp=strncmp($row[2],$row[3],10);
									$end=substr($row[7],0,16);
									if ($row[6]=='報名中'){
										$state="<button type='submit' class='btn btn-success'>我要參加</button>";
									}else{
										$state="<button type='submit' class='btn btn-danger' disabled>已截止</button>";
									}
									if ($cmp!=0){ //如果活動時間有跨日的，就在時間中間加上"至"
										echo "	
												<td style='text-align: center;font-size:.95rem;'>
												$from<br>至<br>$to
										    	</td>
										    	<td>$row[4]</td>
										    	<td style='text-align: justify;'>$row[5]</td>
										    	<td>$row[6]</td>
										    	<td>$end</td>
												<td>$state</td>
												<input type='hidden' name='aID' value='$row[0]'>
												<input type='hidden' name='aName' value='$row[1]'>
												<input type='hidden' name='aTime' value='$from至$to'>
											</form>
										  </tr>";									
									}else{
										$to=substr($row[3],11,5);
										echo "
												<td style='text-align: center;'>	
												$from~$to
											    </td>
											    <td>$row[4]</td>
											    <td style='text-align: justify;'>$row[5]</td>
											    <td>$row[6]</td>
											    <td>$end</td>
												<td>$state</td>
												<input type='hidden' name='aID' value='$row[0]'>												
												<input type='hidden' name='aName' value='$row[1]'>
												<input type='hidden' name='aTime' value='$from~$to'>
											</form>
										  </tr>";
									}
					  		} 				  		
					   ?>				  		
				  	</form>

				  </tbody>
				</table>
			</div>

			<div id="showcal" style="display:none;">
				<div class="col-12 bg-white p-3 border_dash">
					<div id="service_cal"></div>
				</div>
			</div>		
		</div>
	</div>	
</section>
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
				<div class="modal-body">					
					<div class="event-body"></div>
				</div>
			</div>
		</div>
</div>
	<!-- /設定日曆上的事件要跳出的modal -->
<!--以上是導覽預約的內容-->
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