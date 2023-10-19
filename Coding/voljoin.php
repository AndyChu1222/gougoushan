<?php
	ini_set('display_errors','off');
	include("dbcon.php");
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GoGoShan</title>
	<style type="text/css">
            @import url(voljoin.css);
	</style>
	<!--bootstrap.min.css的min意思是指程式碼經過壓縮的檔案，適合網站上線時使用，程式碼可讀性較低-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!--width=device-width將寬度設為設備的寬度，initial-scale=1 設定手機螢幕畫面的初始縮放比例為100%，shrink-to-fit=no是蘋果手機專屬的設定-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<!--bootstrap.bundle.min.js這行是為了要使用popper，popper可以用來做提示框元件，目前還沒用到-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/09745b270c.js" crossorigin="anonymous"></script>
	<script src="index.js"></script>
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
		        <h1 style="font-size:5vmax;">志工招募</h1> <!--類似h1的作法可設置display-(1~4)--> 
	        </div>
	    </div>
	  </div>
</header>

<!--以上是banner-->
<section class="mt-2 pt-3">
	<div class="container mt-3">
		<div class="row mb-4 bg-white" style="border-radius: 20px;box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);">
			<div class="col-lg-6 d-flex align-items-center py-2 px-0" style="border-right:2px #facc7b dotted;">
				<div class="row"> <!--https://www.kiwi.com/tw/-->
					<div class="col-6 p-2"><p class="middle">有愛心的您</p><img src="pic/love.png" class="fourimg" alt="..." style="margin-left: auto;"></div>
					<div class="col-6 p-2"><p class="middle" style="text-align: left;left:2rem;">帶來歡樂的您</p><img src="pic/joy.png" class="fourimg" alt="..." style="margin-right: auto"></div>
					<div class="col-6 p-2"><p class="middle">能量滿滿的您</p><img src="pic/eg.png" class="fourimg" alt="..." style="margin-left: auto"></div>
					<div class="col-6 p-2"><p class="middle" style="text-align: left;left:2rem;">合作無間的您</p><img src="pic/coop.png" class="fourimg" alt="..." style="margin-right: auto"></div>
				</div>
			</div>
			<div class="col-lg-6 colflex py-2 px-0">
				<div class="col-lg mt-2 pt-3">
					<div id="carouselhere3" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carouselhere3" data-slide-to="0" class="active"></li>
							<li data-target="#carouselhere3" data-slide-to="1"></li>
						</ol>
						 <div class="carousel-inner">
						   <div class="carousel-item active">
						     <img src="pic/voljoin5.jpg" class="whyneed" alt="..." style="">
						   </div>
						   <div class="carousel-item">
						     <img src="pic/voljoin3.jpg" class="whyneed" alt="..." style="">
						   </div>
						 </div>
					</div>
				</div>
				<div class="col-lg mt-1">
					<p style="margin: .5rem;text-align: center;font-weight: bold; font-size: 1.3rem">與我們並肩前行</p>
					
					<p style="margin: 0rem 1rem 1rem 1rem;text-align: justify;">狗狗山成立之初，並沒有任何人力來輔助張老師，後來雖有學生志工的加入，但也因為課業繁忙，張老師遇到困難時，經常要自己解決。我們非常希望來自各行各業的大家，一同來守護這些可愛的小生命。</p>
				</div>				
			</div>
					
		</div>
	</div>

	<div class="container">
	  <div class="row align-items-center">
	  	<div class="col-12">
			<div class="banner mb-4">
				<h4 class="text-center font-weight-bold"><i class="fas fa-paw" aria-hidden="true" data-fa-transform="shrink-8"></i>&nbsp;志工種類</h4>				
			</div>
			<div class="row">
				<div class="col-12 mb-3 font-weight-bold pr-0 text-justify">
					<p>只要您喜愛貓或狗、有技能想展露一手，或單純想要更了解，都歡迎加入！對於「日常事務」或「專業項目」願意協助者，可於本網站<a class="linkTo1" href="vollogin.php"> 註冊 </a>成為志工，日後只要登入即可調整工作時段、選擇您想協助的活動～若想成為「中途志工」，請直接私訊<a href="https://www.facebook.com/gougoushan" target="_blank" class="linkTo1"> FB粉絲團 </a>取得最新中途需求。</p>
				</div>
			</div>			
	  	</div>
	    <div class="col-md-4">
	        <div class="profile-card-4 text-center"><img src="pic/routine.jpg" class="img img-responsive">
	            <div class="profile-content">
	                <div class="profile-name">日常事務
	                    <p>清洗、遛狗、餵食、洗澡...等</p>
	                </div>
	                <div class="profile-description">
	                &emsp;&emsp;毛孩們的健康最重要了，但園區內有上百隻貓狗，肯定需要您的幫忙才能完成這項任務。為了毛孩幸福的笑臉，一切都值得了呢～
	                </div>
	                <div class="row">
	                    <div class="col">
	                        <div class="profile-overview">
	                            <p>－最需要這樣的您－</p>
	                            <h5>愛毛孩、細心、友善、合作無間</h5></div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="col-md-4">
	        <div class="profile-card-4 text-center"><img src="pic/special.jpg" class="img img-responsive">
	            <div class="profile-content">
	                <div class="profile-name">專業項目
	                    <p>園藝、修繕、商品設計、資訊小編...等</p>
	                </div>
	                <div class="profile-description">
	                &emsp;&emsp;您有任何長處想大顯身手嗎？歡迎前來加入狗狗山的大家庭！若您善於實作或是對行銷狗狗山有興趣，快來和我們的志工一起行動吧～</div>
	                <div class="row">
	                    <div class="col">
	                        <div class="profile-overview">
	                            <p>－最需要這樣的您－</p>
	                            <h5>展現拿手絕活、負責任的心</h5></div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="col-md-4">
	        <div class="profile-card-4 text-center"><img src="pic/tmphouse.jpg" class="img img-responsive">
	            <div class="profile-content">
	                <div class="profile-name">短期中途之家
	                    <p>讓醫療中的浪浪有個暫時避風港</p>
	                </div>
	                <div class="profile-description">&emsp;&emsp;狗狗山救援許多受傷貓狗，但牠們多半需要獨立空間來療養。徵求中途志工能提供良好照護，飼料、醫療費用由狗狗山負擔，保持密切聯繫。</div>
	                <div class="row">
	                    <div class="col">
	                        <div class="profile-overview">
	                            <p>－最需要這樣的您－</p>
	                            <h5>用心照料、隨時關心毛孩健康</h5>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	  </div>
	</div>

	<div class="container pb-5 pt-4">
		<div class="row justify-content-center mt-4">
			<div class="col-12 thumbnail d-flex align-items-center justify-content-center">
	  			<div class="details text-center">
	    			<h3>期待嗎？別猶豫了！</h3>
	    			<p>我們會帶著您一步步上手，給予毛孩們最溫暖的愛～</p>
	    			<button type="button" class="btn btn-success font-weight-bold"  style="font-size:1.2vmax;"><a style="text-decoration: none;color:white" href="vollogin.php">加入志工！</a></button>
	  			</div>  
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