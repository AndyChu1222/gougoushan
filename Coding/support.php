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
            @import url(support.css);
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
		function showdiv(id) {
		    var a = document.getElementById(id);
		    console.log(id);
		    if (a) {
		      	if(id=="money"){
		      		if (a.style.display == 'none') {
		            	a.style.display = 'block';
		          	}
		          	var b = document.getElementById('supplies');
		          	b.style.display = 'none';
		          	var e = document.getElementById("m1");
  					var e1 = document.getElementById("s1");
  					e.classList.add("darkerbg");
  					e1.classList.remove("darkerbg");
		      	}
		       if(id=="supplies"){
		      		if (a.style.display == 'none') {
		              a.style.display = 'block';
		          	}
		          	var b = document.getElementById('money');
		          	b.style.display = 'none';
		          	var e = document.getElementById("s1");
  					var e1 = document.getElementById("m1");
  					e.classList.add("darkerbg");
  					e1.classList.remove("darkerbg");
		      	}
		      }
		}
		window.onload = function() { //若在貓狗專區按下"我要領養"，則會跳到這頁的領養流程讓人家去填寫
		  var check1=localStorage.getItem("jsstorage1");
		  if (check1 == 1){
		  	$('#adopt').modal('show');
		  }
		  localStorage.setItem("jsstorage1",0);
		};
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
		      		<div class="modal-header2 text-center">
		        		<h5 class="modal-title w-100" id="em">您確定要登出嗎？</h5>
		      		</div>
		      		<div class="modal-footer2" style="justify-content: center;">
		      			<input type="hidden" name="CheckLogout" value="1">
		        		<button type="button" class="btn2 btn-secondary" data-dismiss="modal">取消</button>&nbsp;&nbsp;
		        		<button type="submit" class="btn2 btn-danger">確認登出</button>
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
		        <h1 style="font-size:5vmax;">支持我們</h1> <!--類似h1的作法可設置display-(1~4)--> 
	        </div>
	    </div>
	  </div>
</header>

<!--以上是banner-->
<section class="mt-2">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-12">
					<div class="banner mb-4">
						<h4 class="text-center font-weight-bold"><i class="fas fa-paw" aria-hidden="true" data-fa-transform="shrink-8"></i>&nbsp;支持方式</h4>
					</div>
					<div class="row">
						<div class="col-lg-6 offset-lg-3 mb-3 font-weight-bold pr-0 text-center">
							<p>狗狗山需要大家共同的支持，光靠張老師的力量是沒辦法滿足每一隻毛孩的<br>因此如果您也<span class="markie">喜愛動物、願意給牠們滿滿的愛，歡迎您的善心！</span></p>
						</div>
					</div>
					<div class="row">
						
					</div>
					<!-- 三欄式卡片 -->
					<div class="row">
						<div class="col-lg-4 mb-3">
							<a href="#" style="text-decoration:none;" data-toggle="modal" data-target="#adopt">
								<div class="card whiteMe">
	  								<img src="pic/test1.jpg" class="card-img-top" alt="...">
	  								<div class="card-body">
	    								<h5 class="card-title text-center">— 領養 —</h5>
	    								<p class="card-text black">看看我們乖巧可愛的毛孩，如此盼望著一生相伴的好主人，進來了解詳情吧～</p>
	  								</div>
								</div>
							</a>
							<!-- 彈跳視窗 -->
							<div class="modal fade" id="adopt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  							<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
	    							<div class="modal-content">
	      								<div class="modal-header text-center">
	        								<h4 class="modal-title font-weight-bold w-100 bcolor" id="exampleModalLongTitle">— 領養 —</h4>
	        								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          									<h4 aria-hidden="true">&times;</h4>
	        								</button>
	      								</div>
	      								<div class="modal-body">
	        								<p class="text-center">若您對於我們所照顧的狗狗或貓咪十分感興趣，我們非常感謝您！<br>也希望您能為這些貓狗找到他們最嚮往的家～</p>
	        								<div class="row">
											  <div class="col-4 mb-4 offset-1">
											  	<p style="color:#51AF86;font-weight: bold;text-align: center;">－領養流程</p>
											    <div class="list-group text-center" id="list-tab" role="tablist">
											      <a class="list-group-item list-group-item-action active" id="list-tel-list" data-toggle="list" href="#list-tel" role="tab" aria-controls="tel">填寫領養意願表單</a>
											      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">電話訪問</a>
											      <a class="list-group-item list-group-item-action" id="list-rec-list" data-toggle="list" href="#list-rec" role="tab" aria-controls="rec">確認飼養環境</a>
											      <a class="list-group-item list-group-item-action" id="list-try-list" data-toggle="list" href="#list-try" role="tab" aria-controls="try">需試養約7~14天</a>
											      <a class="list-group-item list-group-item-action" id="list-fin-list" data-toggle="list" href="#list-fin" role="tab" aria-controls="fin">簽約領養</a>
											    </div>
											  </div>
											  <div class="col-6">
											  	<p style="color:#51AF86;font-weight: bold;text-align: center;">－詳細步驟</p>
											    <div class="tab-content" id="nav-tabContent">
											      <div class="tab-pane fade show active text-justify" id="list-tel" role="tabpanel" aria-labelledby="list-tel-list">
											      <p>若您尚未找到想領養的貓狗，趕緊前往「<a class="font-weight-bold bcolor alink" href="petarea.php">貓狗專區</a>」看看我們狗狗山有哪些可愛的寶貝吧！</p>
											      <p>若您已心有所屬，首先須填寫「領養意願表單」，您所填寫的資料僅供此平台上的領養專用。</p><p>請務必留下您的真實資料，我們收到表單後，會在下一步與您電話聯繫。</p>
											  	  </div>
											      <div class="tab-pane fade text-justify" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list"><p>藉由電話訪問得知您的領養意願，以及了解您的生活環境、經濟能力與飼養經驗等(如:
											    家中是否還有其他寵物、同居人是否能接受飼養...)，綜合以上要素，初步判斷您與毛孩是否相互契合。</p>
											    	<p>若訪談順利，會進行下一步:錄製未來飼養環境的影片。</p>
											      </div>
											      <div class="tab-pane fade text-justify" id="list-rec" role="tabpanel" aria-labelledby="list-rec-list"><p>待電話訪談後，會請領養者錄製未來飼養環境的影片，包含充足的活動空間、籠舍大小及擺放位置、生活環境是否通風良好且遮風避雨等。</p><p style="word-break: break-all;">錄製完畢請盡速將影片寄至&nbsp;gougoushan@gmail.com，我們會回信告知是否OK。</p>若影片內容不完整，可重新錄製並將新影片再次寄出，或是等待志工實際訪視。
											      </div>
											      <div class="tab-pane fade text-justify" id="list-try" role="tabpanel" aria-labelledby="list-try-list"><p>確定飼養環境後，會有7~14天的試養期讓您與毛孩相處，藉由試養讓彼此習慣新環境與生活。</p><p>當然，這段期間會進行探訪，以確定試養的狀況。</p></div>
											      <div class="tab-pane fade text-justify" id="list-fin" role="tabpanel" aria-labelledby="list-fin-list"><p>若一切就緒且沒有任何問題，則可以親自至狗狗山進行簽約，並將自己心愛的毛孩帶回家。</p>
											      	<p>須注意，狗狗山會定期追蹤貓狗是否飲食健康生活愉快，若無，則狗狗山有權利將貓狗領回。</p></div>
											    </div>
											  </div>
											</div>
	        								
	      								</div>
	      								<div class="modal-footer text-center">
	      									<div class="w-100">
	      										<button type="button" class="btn btn-outline-danger mr-4"  onclick="location.href='adopt.php'">領養意願表單</button>
	      										<!--<a class="font-weight-bold bcolor alink" href="">P.S.&nbsp;歡迎先來看看有哪些毛孩唷~</a>-->
	      									</div>
	      								</div>
	    							</div>
	  							</div>
							</div>
						</div>	
						<!-- /彈跳視窗 -->		
						<div class="col-lg-4 mb-3">
							<a href="#" style="text-decoration:none;" data-toggle="modal" data-target="#donate">
								<div class="card whiteMe">
		  							<img src="pic/vol1.jpg" class="card-img-top" alt="...">
		  							<div class="card-body">
		    							<h5 class="card-title text-center">— 捐款 —</h5>
		    							<p class="card-text black">不論是醫療、膳食或設備，都需要您的幫助來讓狗狗山這座避風港得以不畏風雨！</p>
		  							</div>
								</div>
							</a>
							<!-- 彈跳視窗 -->
							<div class="modal fade" id="donate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  							<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
	    							<div class="modal-content">
	      								<div class="modal-header text-center">
	        								<h4 class="modal-title font-weight-bold w-100 bcolor" id="exampleModalLongTitle">— 捐款 —</h4>
	        								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          									<span aria-hidden="true">&times;</span>
	        								</button>
	      								</div>
	      								<div class="modal-body">
	        								<p class="mx-3 text-justify">在狗狗山的毛孩們都非常需要各位的支持與善心，才能讓狗狗山有足夠的資源，提供這些獨特的生命一處遮風避雨的庇護所。對於捐款我們定會清楚交代每一筆捐款使用流向，相關的財務報表可於網站或FB粉絲專頁查詢，捐款人也可以選擇是否願意顯示於網站上的芳名錄中。</p>
											<ul class="list-group my-4 mx-5">
													<li class="list-group-item">捐款用途</li>  
													<li class="list-group-item list-group-item-success">受傷貓狗醫療救治費用</li>
													<li class="list-group-item list-group-item-success">援救器具與人員支出</li>
													<li class="list-group-item list-group-item-success">貓狗園區設備更換與維護，提供貓狗更加完善的環境</li>
													<li class="list-group-item list-group-item-success">貓狗飼料與貓狗營養品購買，讓貓狗們活力滿滿</li>
											</ul>
											<div class="mx-3 text-justify">若您願意捐款，請先匯款至以下專戶，再填寫「捐款確認表單」。表單繳交後，狗狗山小編會以電子郵件的方式通知您是否匯款成功。狗狗山非常感謝您的支持！</div>
											<ul class="list-group my-4 mx-5">
													<li class="list-group-item" style="border-color:rgba(0,0,0,0.3) !important;">匯款帳號（700）0021088 0832594<br>匯款劃撥：22858257<br>戶名：社團法人台灣黑皮狗狗山友善動物協會
													</li>

											</ul>											
	      								</div>
		      							<div class="modal-footer text-center">
		      								<div class="w-100">
		      									<button type="button" class="btn btn-outline-danger mr-4"  onclick="location.href='donmon.php'">捐款確認表單</button>
		      								</div>
		      							</div>
	    							</div>
	  							</div>
							</div>
						</div>
						<!--/彈跳視窗-->			
						<div class="col-lg-4 mb-3">
							<a href="#" style="text-decoration:none;" data-toggle="modal" data-target="#donatething">
								<div class="card whiteMe">
		  							<img src="pic/vol2.jpg" class="card-img-top" alt="...">
		  							<div class="card-body">
		    							<h5 class="card-title text-center">— 捐贈物資 —</h5>
		    							<p class="card-text black">飼料、清潔工具、軟墊等，充裕的物資讓志工得以維護環境，使毛孩們幸福感上升～</p>
		  							</div>
								</div>
							</a>
							<!-- 彈跳視窗 -->
							<div class="modal fade" id="donatething" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  							<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
	    							<div class="modal-content">
	      								<div class="modal-header text-center">
	        								<h4 class="modal-title font-weight-bold w-100 bcolor" id="exampleModalLongTitle">— 捐贈物資 —</h4>
	        								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          									<span aria-hidden="true">&times;</span>
	        								</button>
	      								</div>
	      								<div class="modal-body">
	        									<p class="mx-3 text-justify">在狗狗山每份愛都是需要被關心的，若您有一件甚至是多件物資都剛好擁有，我們非常需要您！若您願意幫助我們，歡迎您與向我們聯繫，非常感謝您的支援～</p>
				        						<p class="mx-3 text-justify">若以下物資您有餘力願意捐贈給狗狗山，歡迎私訊FB、IG或寄E-Mail洽詢：</p>
				        						<div class="row mx-3 mb-3">				        						
					        						<div class="col-4 text-center"><a href="https://www.facebook.com/gougoushan" target="_blank" class="fa fa-facebook clear2"></a></div>
					        						<div class="col-4 text-center"><a href="https://www.instagram.com/gou_gou_shan" target="_blank" class="fa fa-instagram fa-ig2 clear2"></a></div>
					        						<div class="col-4 text-center"><a href="mailto:gougoushan@gmail.com?subject=我想捐贈物資" class="fa fa-google clear2"></a></div>
				        						</div>
				        						
				        						<div class="table-responsive">
				        							<table class="table table-hover text-center">
													  <thead>
													    <tr>
													      <th scope="col">項次</th>
													      <th scope="col">物資名稱</th>
													      <!-- <th scope="col">需求份量</th> -->
													      <th scope="col">備註</th>
													    </tr>
													  </thead>
													  <?php
														$sqldem="SELECT * FROM demand WHERE Dem_Emer = '高'";
														$listsql=mysqli_query($conn,$sqldem);
									                	while($result1 = mysqli_fetch_array($listsql)){
								                	  
														?>
													  <tbody>
													    <tr class="table-danger">
													      <th scope="row"><?php echo "{$result1['Dem_ID']}"; ?></th>
													      <td><?php echo "{$result1['Dem_Name']}"; ?></td>
													      <!-- <td>約需 <?php echo "{$result1['Dem_Num']}"; ?> <?php echo "{$result1['Dem_Unit']}"; ?></td> -->
													      <td><?php echo "{$result1['Dem_Words']}"; ?></td>
													      
													    </tr>
													    <?php } ?>
													    <?php
														$sqldem="SELECT * FROM demand WHERE Dem_Emer = '低'";
														$listsql=mysqli_query($conn,$sqldem);
									                	while($result1 = mysqli_fetch_array($listsql)){
								                	  
														?>
													    <tr>
													      <th scope="row"><?php echo "{$result1['Dem_ID']}"; ?></th>
													      <td><?php echo "{$result1['Dem_Name']}"; ?></td>
													      <!-- <td>約需 <?php echo "{$result1['Dem_Num']}"; ?> <?php echo "{$result1['Dem_Unit']}"; ?></td> -->
													      <td><?php echo "{$result1['Dem_Words']}"; ?></td>
													    </tr>
													<?php } ?>
													  </tbody>
													
													</table>	
				        						</div>				        									        					
	      								</div>
	    							</div>
	  							</div>
							</div>
							<!-- /彈跳視窗 -->
						</div>								
					</div>
					<!-- 三欄式卡片 -->
					
					<div class="col-lg-12 my-4 justify-content-center align-items-center">
						<h4 class="text-center font-weight-bold"><i class="fas fa-paw" aria-hidden="true" data-fa-transform="shrink-8"></i>&nbsp;芳名錄</h4>
					</div>
					<div class="col-lg-12 mb-4" style="text-align:center;">
						<div class="btn-group div-sha">
							<button class="btn btn-primary darkerbg" id="m1" onclick="showdiv('money');">慈善捐款</button> 
	    					<button class="btn btn-primary" id="s1" onclick="showdiv('supplies');">愛心物資</button>							
						</div>
					</div>

					<div id="money" class="offset-md-3 col-md-6 justify-content-center mb-5" style="display:block;">
							<table class="table table-striped text-center overflow div-sha">
							  	<thead class="tcolor text-white">
							    <tr>
							      	<th scope="col">日期</th>
							      	<th scope="col">捐款人</th>
							     	<th scope="col">金額</th>
							    </tr>
							  	</thead>
							  	<!-- 芳名錄SQL -->
								<?php
									$sqldn="SELECT * FROM dn WHERE DN_Money != 0";
									$listsql=mysqli_query($conn,$sqldn);
			                	while($result1 = mysqli_fetch_array($listsql)){
			                	  
								?>
							  	<tbody>
							   	<tr>
							     	<th scope="row"><?php echo "{$result1['DN_Date']}"; ?></th>
							     	<td><?php echo "{$result1['DN_Name']}" ?></td>
							     	<td>新台幣 <?php echo "{$result1['DN_Money']}" ?> 元</td>
							   	</tr>
							   	<!-- <tr>
							     	<th scope="row">109/1/2</th>
							     	<td>蔡Ｏ美</td>
							     	<td>新台幣 5000 元</td>
							   	</tr>
							   	<tr>
								     <th scope="row">107/1/3</th>
								     <td>陳Ｏ雄</td>
								     <td>新台幣 2000 元</td>
								   	</tr> -->
								  	</tbody>
								  	<?php } ?>
							</table>
					</div>
					<div id="supplies"class="offset-md-3 col-md-6 justify-content-center mb-5" style="display:none;">
							<table class="table table-striped text-center overflow div-sha">
									<thead class="tcolor text-white">
									    <tr>
									      	<th scope="col">日期</th>
									      	<th scope="col">捐贈人</th>
									      	<th scope="col">物品名稱</th>
									    </tr>
									</thead>
									<?php
										$sqldn="SELECT * FROM dn WHERE DN_Money = 0";
										$listsql=mysqli_query($conn,$sqldn);
                					while($result1 = mysqli_fetch_array($listsql)){
                	  
									?>
								<tbody>
								    <tr>
								      <th scope="row"><?php echo "{$result1['DN_Date']}"; ?></th>
								      <td><?php echo "{$result1['DN_Name']}" ?></td>
								      <td><?php echo "{$result1['DN_Item']}" ?></td>
								    </tr>
								    <!-- <tr>
								      <th scope="row">109/1/2</th>
								      <td>蔡Ｏ美</td>
								      <td>狗碗 10 個</td>
								    </tr>
								    <tr>
								     <th scope="row">107/1/3</th>
								     <td>陳Ｏ雄</td>
								     <td>牽繩 100 個</td>
								    </tr> -->
								</tbody>
							<?php } ?>
							</table>
					</div>
								
			</div>
		</div>
	</div>	
</section>



<!-- <div class="container-fluid banner mb-5"><h1>支持方式</h1></div> -->
<!-- 三欄式container -->

<!-- <div class="mb-5" style="text-align:center;"><h1>芳名錄</h1></div>
<div class="mb-5" style="text-align:center;"><h2>捐款</h2></div>

<div class="offset-lg-3 col-lg-6 justify-content-center">
	<table class="table table-hover">
  		<thead>
    	<tr>
      		<th scope="col">日期</th>
      		<th scope="col">捐款人</th>
      		<th scope="col">金額</th>
    	</tr>
  		</thead>
  		<tbody>
    	<tr>
      	<th scope="row">109/1/1</th>
      	<td>王曉明</td>
      	<td>新台幣 1000 元</td>
    	</tr>
    	<tr>
      	<th scope="row">109/1/2</th>
      	<td>蔡小美</td>
      	<td>新台幣 5000 元</td>
    	</tr>
    	<tr>
      <th scope="row">107/1/3</th>
      <td>陳大雄</td>
      <td>新台幣 2000 元</td>
    	</tr>
  		</tbody>
	</table>
</div>

<div class="mb-5" style="text-align:center;"><h2>捐物資</h2></div>
<div class="offset-lg-3 col-lg-6 justify-content-center">
	<table class="table table-hover">
  		<thead>
    	<tr>
      		<th scope="col">日期</th>
      		<th scope="col">捐贈人</th>
      		<th scope="col">物品</th>
    	</tr>
  		</thead>
  		<tbody>
    	<tr>
      	<th scope="row">109/1/1</th>
      	<td>王曉明</td>
      	<td>狗糧 50 斤</td>
    	</tr>
    	<tr>
      	<th scope="row">109/1/2</th>
      	<td>蔡小美</td>
      	<td>狗碗 10 個</td>
    	</tr>
    	<tr>
      <th scope="row">107/1/3</th>
      <td>陳大雄</td>
      <td>牽繩 100 個</td>
    	</tr>
  		</tbody>
	</table>
</div> -->

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