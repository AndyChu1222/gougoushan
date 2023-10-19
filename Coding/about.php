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
            @import url(about.css);
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

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
								  		<a class="nav-link mx-3 px-3 " href="voljoin.php">志工招募</a>
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
		        		<button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
		        		<button type="submit" class="btn btn-primary">確認登出</button>
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
	<div id="no_back" class="cover h-100 w-100" data-src="pic/about_b2.jpg"></div>
	<div id="no_top" class="container-fluid">
	  	<div class="row align-items-center justify-content-center">
	  		<div class="col-12 text-white text-center"><!--Height 100%-->
	  			<!--這裡vmax意思是，我的字體大小是螢幕最"長"邊的4%，vmin意思是，我的字體大小是螢幕最"短"邊的XX%-->
		        <h1 style="font-size:5vmax;">關於我們</h1> <!--類似h1的作法可設置display-(1~4)--> 
	        </div>
	    </div>
	  </div>
</header>

<!--以上是banner-->
<section class="mt-2">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-12">
				<div class="text-center mt-5 mb-4">
					<h4 class="text-center font-weight-bold"><i class="fas fa-paw" aria-hidden="true" data-fa-transform="shrink-8"></i> 狗狗山負責人</h4>
				</div>
			</div>
		</div>
	</div>

	<!-- 張老師介紹 -->
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<img src="pic/teacher1.jpg" class="rounded-circle adjustwid">
				<div> <!--太單調可加平行四邊形：https://shubo.io/pure-css-parallelogram/-->
	    			<h5 class="font-weight-bold my-3">張帆 老師</h5>
	    			<p>張老師是一位非常負責而且有愛心的創辦人，大大小小的事都一手包辦，而且無怨無悔付出。<br>不是在前往救援的路上，就是在園區裡為毛孩們忙碌。
	    			</p>
	  			</div>
			</div>
		</div>
	</div>
	<!-- /張老師介紹 -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="tit mt-5 mb-4">
					<h4 class="text-center font-weight-bold"><i class="fas fa-paw" aria-hidden="true" data-fa-transform="shrink-8"></i> 狗狗山宗旨</h4>
				</div>
			</div>
		</div>
	</div>
<!-- 理念卡片 -->
	<div class="container bg-choco text-white">
		<div class="row">
			<div class="col text-center">
				<img src="pic/aboutfriend2.jpg" class="rounded-circle mt-3">
				 <div class="card-body">
	    			<h5 class="card-title font-weight-bold">友善環境</h5>
	    			<p class="card-text" style="text-align:justify;">我們重視每隻毛孩的個性，志工們以不同的方式和毛孩進行親人訓練，因此狗狗山所收邊的毛孩們都非常友善。</p>
	    			<!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
	  			</div>
			</div>
			<div class="col text-center">
				<img src="pic/aboutlove2.jpg" class="rounded-circle mt-3">
				 <div class="card-body">
	    			<h5 class="card-title font-weight-bold">愛心守護</h5>
	    			<p class="card-text" style="text-align:justify;">透過陪伴與照護，我們積極的將狗狗山充滿著幸福感，人們前來，也能感覺到幸福。</p>
	    			<!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
	  			</div>
			</div>			
			<div class="col text-center">
				<img src="pic/aboutedu2.jpg" class="rounded-circle mt-3">
				 <div class="card-body">
	    			<h5 class="card-title font-weight-bold">生命教育</h5>
	    			<p class="card-text" style="text-align:justify;">在這些流浪貓狗中，有許多已經面臨過生臨死別的場景，而這些故事更是需要傳達給每個人，告訴人們每個生命的重要與獨特。</p>
	    			<!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
	  			</div>
			</div>
		</div>
	</div>
	<!-- /理念卡片 -->
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-12">
				<div class="text-center mt-5 mb-4">
					<h4 class="text-center font-weight-bold"><i class="fas fa-paw" aria-hidden="true" data-fa-transform="shrink-8"></i> 成立故事</h4>
				</div>
			</div>
		</div>
	</div>

	<!-- 成立故事卡片 -->
	<div class="container">
		<div class="row justify-content-center bg-white-1997">
			<div class="col-sm col-12 my-3">
					<div id="carouselhere" class="carousel slide" data-ride="carousel">
					    <ol class="carousel-indicators">
						    <li data-target="#carouselhere" data-slide-to="0" class="active"></li>
						    <li data-target="#carouselhere" data-slide-to="1"></li>
						</ol>
					  <div class="carousel-inner">
					    <div class="carousel-item active">
					      <img src="pic/Chris1.jpg" class="d-block w-100" alt="..." style="border-radius: 20px;">
					    </div>
					    <div class="carousel-item">
					      <img src="pic/Chris2.jpg" class="d-block w-100" alt="..." style="border-radius: 20px;">
					    </div>
					  </div>
					</div>
			</div>
			<div class="col-sm col-12 align-self-center text-center mr-3 adjust_m">
				<h5 class="card-title font-weight-bold">1997-成立私人狗園</h5>
		    	<p class="card-text" style="text-align:justify;">來自美國的Chris Ward發現台灣的流浪狗問題，投入救援行動，在臺中勤益科大附近建立了暫時性的狗場，取名為狗狗山。因緣際會下，張老師透過幾位志工的帶領，接觸了狗狗山，也十分認同Chris尊重生命的理念，只要一有空閒便前往狗場幫忙，為狗狗山盡心盡力。</p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row justify-content-center bg-white">
			<div class="col-sm col-12 my-3">
					<div id="carouselhere2" class="carousel slide" data-ride="carousel">
					    <ol class="carousel-indicators">
						    <li data-target="#carouselhere2" data-slide-to="0" class="active"></li>
						    <li data-target="#carouselhere2" data-slide-to="1"></li>
						    <li data-target="#carouselhere2" data-slide-to="2"></li>
						</ol>
					  <div class="carousel-inner">
					    <div class="carousel-item active">
					      <img src="pic/2003.jpg" class="d-block w-100" alt="..." style="border-radius: 20px;">
					    </div>
					    <div class="carousel-item">
					      <img src="pic/2003-2.jpg" class="d-block w-100" alt="..." style="border-radius: 20px;">
					    </div>
					    <div class="carousel-item">
					      <img src="pic/2003-3.jpg" class="d-block w-100" alt="..." style="border-radius: 20px;">
					    </div>
					  </div>
					</div>
			</div>
			<div class="col-sm col-12 align-self-center text-center order-sm-first mx-2 adjust_m">
				<h5 class="card-title font-weight-bold">2003-責任交接</h5>
		    	<p class="card-text"  style="text-align:justify;">直到2003年，Chris無法繼續留在台灣，張老師為了延續這份精神，接手成為狗狗山的負責人，開始著手園區的規劃、照顧所有貓狗的健康大小事與送養計畫等，但因為規模較小，老師與志工們積極尋找攤位增加曝光率，竭誠歡迎學校及民間團體的加入，以生命教育治癒人心。</p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row justify-content-center bg-white">
			<div class="col-sm col-12 my-3">
					<div id="carouselhere3" class="carousel slide" data-ride="carousel">
					    <ol class="carousel-indicators">
						    <li data-target="#carouselhere3" data-slide-to="0" class="active"></li>
						    <li data-target="#carouselhere3" data-slide-to="1"></li>
						</ol>
					  <div class="carousel-inner">
					    <div class="carousel-item active">
					      <img src="pic/2021-2.jpg" class="d-block w-100" alt="..." style="border-radius: 20px;">
					    </div>
					    <div class="carousel-item">
					      <img src="pic/2021-3.jpg" class="d-block w-100" alt="..." style="border-radius: 20px;">
					    </div>
					  </div>
					</div>
			</div>
			<div class="col-sm col-12 align-self-center text-center mr-3 adjust_m">
				<h5 class="card-title font-weight-bold">2021-協會正式成立</h5>
		    	<p class="card-text" style="text-align:justify;">歷經多次的顛簸，將園區從太平搬到霧峰，現在的狗狗山園區不僅是貓狗等待主人的避風港，更是服務學習的教育中心，使人們重視每個生命，進而成為有責任心的主人，給予貓狗一個溫暖的家。 </p>
			</div>
		</div>
	</div>	
	<!-- /成立故事卡片 -->
	<div class="container">
		<div class="video-container" style="border-radius: 20px;width">
		    <iframe width="697" height="392" src="https://www.youtube.com/embed/8wyLwnoBOKs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
	</div>

	<!--成果事蹟-->
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-12">
				<div class="text-center mt-5 mb-4">
					<h4 class="text-center font-weight-bold"><i class="fas fa-paw" aria-hidden="true" data-fa-transform="shrink-8"></i> 近年事蹟</h4>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-12">
				<div class="mb-5">
					<table class="table table-hover table-striped text-center">
				  		<thead class="thead-dark">
				    	<tr>
				      		<th scope="col">年分</th>
				      		<th scope="col">事蹟</th>
				    	</tr>
				  		</thead>
				  		<tbody>
				    	<tr>
					      	<th scope="row">109</th>
					      	<td>歷經10餘年，狗寶貝和貓寶貝成功送養達到400隻！</td>
				       	</tr>
				    	<tr>
					      	<th scope="row">108</th>
					      	<td>與中友百貨合作，以狗狗山的特色推出限量愛心商品，觸及更多愛寵人士。</td>
				    	</tr>
				    	<tr>
						    <th scope="row">107</th>
						    <td>由五位台中二中熱心的高一學生為狗狗山發起線上募資計畫，金額達標，募資成功！</td>
				    	</tr>
				  		</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<!--/成果事蹟-->
	<!-- 園區地圖 -->
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-12">
				<div class="text-center mb-4">
					<h4 class="text-center font-weight-bold"><i class="fas fa-paw" aria-hidden="true" data-fa-transform="shrink-8"></i> 園區地圖</h4>
				</div>
			</div>
		</div>
	</div>
	<div class="container pb-5">
		<div class="row justify-content-center bg-white" style="margin:0;">
			<div class="col-sm col-12 my-3">
				<div class="map-responsive">
					<iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d2044.9474448302435!2d120.72791159032518!3d24.042290201460077!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e0!4m0!4m5!1s0x346924c6ceba0693%3A0x952ad27a872a535b!2z5Z2R5Y-j6YeMIDQxM-WPsOS4reW4gumcp-WzsOWNgA!3m2!1d24.0420382!2d120.7287513!5e0!3m2!1szh-TW!2stw!4v1622189964387!5m2!1szh-TW!2stw" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen></iframe>
				</div>
			</div>
			<div class="col-sm col-12 align-self-center text-center mr-3 adjust_m">
				<h5 class="card-title">交通資訊</h5>
		    	<p class="card-text" style="text-align:justify;">Google Map 搜尋松群護理之家，接著經過松群護理之家向左轉並直走，就可抵達園區。 </p>
			</div>
		</div>
	</div>
</section> 

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