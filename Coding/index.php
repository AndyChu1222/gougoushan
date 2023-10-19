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
            @import url(S1.css);
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
	  <div  id="no_back" class="cover h-100 w-100" data-src="pic/cover3.jpg" style="height: 100%; background-image: url(pic/cover3.jpg);">
	  	
	  </div>
	  <div id="no_top" class="container-fluid">
	  	<div class="row align-items-center justify-content-center">
	  		<div class="col-12 align-items-center text-white"><!--Height 100%-->
	  			<!--這裡vmax意思是，我的字體大小是螢幕最"長"邊的4%，vmin意思是，我的字體大小是螢幕最"短"邊的XX%-->
		        <h1 style="font-size:4vmax;" class="display-4">GOUGOUSHAN</h1> <!--類似h1的作法可設置display-(1~4)--> 
		        <p class="lead font-weight-bold"  style="font-size:1.8vmax;">歡迎加入<br>充滿熱情與希望的狗狗山</p><!--lead 使段落突出顯示-->
		      	<button type="button" class="btn btn-success font-weight-bold"  style="font-size:1.2vmax;"><a style="text-decoration: none;color:white" href="about.php">關於狗狗山</a></button>
	        </div>
	    </div>
	  </div>
	</header>

<!--以上是狗狗山header的banner-->

<section class="mt-2">    
	  <div class="container">
	  	<div class="row text-center">		
	  		<div class="col-12 mx-auto py-3">
	  			<h4 class="text-center font-weight-bold pt-4"><i class="fas fa-paw" aria-hidden="true" data-fa-transform="shrink-8"></i>&nbsp;狗狗山－毛孩子的淨土</h4>
		  		<p style="line-height:3rem;font-weight:bold;font-size:1.1rem;">不關籠不綁鍊與大地共生，以正向能量傳遞生命教育</p>
	  		</div>
	  	</div>
	  	<div class="row no-gutters">
	  		<div class="col-4 py-2">
	  			<img class="img-fluid r1" src="pic/a1.png" alt="cutedog">
	  		</div>
	  		<div class="col-4 py-2">
	  			<img class="img-fluid r2" src="pic/a2.png" alt="cutecat">
	  		</div>
	  		<div class="col-4 py-2">
	  			<img class="img-fluid r3" src="pic/a3.png" alt="cutecat">
	  		</div>
	  		<div class="col-11 mx-auto">
	  			<img class="img-fluid p-3" src="pic/a4.jpg" alt="cutecat">
	  		</div>
	  	</div>

	    <div class="row position-relative">
	      <div class="col mx-auto py-4"> <!--用mx-auto把空位平均分散到左右兩邊-->
	        	 <h4 class="text-center font-weight-bold" id="a1"><i class="fas fa-paw" aria-hidden="true" data-fa-transform="shrink-8"></i> 最新消息</h4>
				 <div class="card-deck py-3">
	  	<!-- php page -->
	  				<?php
				 		$sqlnews='SELECT * FROM news ORDER BY News_Date DESC';
				 		$listsqlnews=mysqli_query($conn,$sqlnews);
				 		$data_nums = mysqli_num_rows($listsqlnews);//統計總比數
				 		$per = 3; //每頁顯示項目數量
				 		$pages = ceil($data_nums/$per); //取得不小於值的下一個整數
				 		$mod=$data_nums%$per;
				 		if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
					        $page=1; //則在此設定起始頁數
					    }else {
					        $page = intval($_GET["page"]); //確認頁數只能夠是數值資料
					    }
			            $start = ($page-1)*$per; //每一頁開始的資料序號
			            $listsqlnews=mysqli_query($conn,$sqlnews.' LIMIT '.$start.', '.$per);
			            while($res1 = mysqli_fetch_array($listsqlnews)){
			            	$sql="SELECT Pic_Path FROM pic WHERE Pic_SourceID = '{$res1['News_ID']}';";
			            	$listpic=mysqli_query($conn, $sql);
			            	$p_path="";$p_pathAll="";$cnt=1; //此cnt是用來紀錄第一筆資料用
			            	while($res2=mysqli_fetch_array($listpic)){
			            		if(mysqli_num_rows($listpic)==1){
				            		$p_path=$res2['Pic_Path'];
			            		}else{			            			
			            			$p_pathAll=$p_pathAll.$res2['Pic_Path'].",";
			            			if ($cnt==1){
			            				$p_pathAll_1="{$res2['Pic_Path']}";
			            				$cnt+=1;
			            			}	            			    	
			            		}				            	
			            	}
				 	?>
	  	<!-- end php page -->

	        	 	<div class="card">
							<a href='#' data-toggle='modal' data-target='#showmo' onclick='passvalue(<?php
								$len=mysqli_num_rows($listpic);
								if($len==1){
									echo "\"{$res1['News_ID']}\",\"{$res1['News_Title']}\",\"{$res1['News_Word']}\",\"{$res1['News_Date']}\",\"$p_path\""; 
								}else{
									echo "\"{$res1['News_ID']}\",\"{$res1['News_Title']}\",\"{$res1['News_Word']}\",\"{$res1['News_Date']}\",\"$p_pathAll\""; 
								}
								?>)'>
					  			<img class="card-img-top" src='<?php
						  			if($len==1){
					            		echo $p_path;   			
				            		}else{			            		
				            			echo $p_pathAll_1;        			    	
				            		}
					  			?>' alt="Card image cap">
							</a>
						    <div class="card-body">
						      <a href='#' style="text-decoration: none;color:black;" data-toggle='modal' data-target='#showmo' onclick='passvalue(<?php
								$len=mysqli_num_rows($listpic);
								if($len==1){
									echo "\"{$res1['News_ID']}\",\"{$res1['News_Title']}\",\"{$res1['News_Word']}\",\"{$res1['News_Date']}\",\"$p_path\""; 
								}else{
									echo "\"{$res1['News_ID']}\",\"{$res1['News_Title']}\",\"{$res1['News_Word']}\",\"{$res1['News_Date']}\",\"$p_pathAll\""; 
								}
								?>)'>
						      	<h5 class="card-title"><?php echo "{$res1['News_Title']}"; ?></h5>
						      </a>
						      <p class="card-text"><?php
						      ini_set('display_errors','off');
						    	echo "{$res1['News_Word']}";
						      ?></p>
						    </div>
						    <div class="card-footer blockquote-footer text-right">
						        <small class="text-muted"><?php echo "{$res1['News_Date']}"; ?></small>
						    </div>
					</div>
		        	<?php 
		        		} //while的結尾右括弧

		        		if($page==$pages){ //如果現在是最後一頁的話
			        		if($mod==1){ //如果只呈現兩筆或一筆，在此會再加上其他card來避免card滿版
			        			for($i=0;$i<2;$i++){
			        				echo "<div class='card' style='opacity:0;'></div>";
			        			}
			        		}else if($mod==2){
			        			for($i=0;$i<1;$i++){
			        				echo "<div class='card' style='opacity:0;'></div>";
			        			}
			        		}		        			
		        		}
		        	?>	 
				</div>
				<script>
					function pageClicked(){
						$(".nums").addClass("changColor");
					}
				</script>
				<nav aria-label="Page navigation example">
				  <ul class="pagination justify-content-center mt-3">
				  	<?php
				  		if(!isset($_GET["page"]) || $_GET["page"]<=1){//如果現在是第一頁的話，禁止使用者再往前按
				  			echo "<li class='page-item disabled notAllowed'><a class='page-link' href=?page=".($page-1)."#a1><</a></li>";
				  		}else{
				  			echo "<li class='page-item'><a class='page-link' href=?page=".($page-1)."#a1><</a></li>";
				  		}				  		
					    for( $i=1 ; $i<=$pages ; $i++ ) {
					        // if ( $page-3 < $i && $i < $page+3 ) {
							if($page==$i){//以變更背景顏色來顯示目前所在的頁數
					        	echo "<li class='page-item'><a class='page-link changColor' href=?page=".$i."#a1>".$i."</a></li>";
							}else{
								echo "<li class='page-item'><a class='page-link' href=?page=".$i."#a1>".$i."</a></li>";
							}
					        // }
					        
					         	//echo "<script>pageClicked()</script>";
					        
					    }
					    if($page==$pages){ //如果現在是最後一頁的話，禁止使用者再往後按
							echo "<li class='page-item disabled notAllowed'><a class='page-link' href=?page=".($page+1)."#a1>></a></li>";
					    }else{
					    	echo "<li class='page-item'><a class='page-link' href=?page=".($page+1)."#a1>></a></li>";
					    }
					    
				  	?>
				  </ul>
				</nav>
	      </div>
	    </div>	    
	  </div>
</section>
<script>
	function passvalue(nid,nt,nw,ndate,npic){
	    var s =nid+','+nt+','+nw+','+ndate+','+npic;
	    console.log(s);
	    document.getElementById("m-title").innerHTML=nt;
	    document.getElementById("m-text").innerHTML=nw;
	    document.getElementById("m-date").innerHTML="─ "+ndate;
	    var npicArr =npic.split(',');
	    var pic_num=npicArr.length-1; //-1是因為最後一個陣列元素是空白
	    document.getElementById("carl01").innerHTML="<div class='carousel-item active'><img src='"+npicArr[0]+"' class='d-block w-100 rounded' alt='NewsPicture'></div>";
	    if (pic_num>1){
		    for(i=1;i<pic_num;i++){
		        document.getElementById("carl01").insertAdjacentHTML("beforeend","<div class='carousel-item'><img src='"+npicArr[i]+"' class='d-block w-100 rounded' alt='NewsPicture'></div>");
		    }
		    //擺入輪播的切換符號(<>)
		    document.getElementById("carl01").insertAdjacentHTML("beforeend","<a class='carousel-control-prev' href='#carouselExampleControls' role='button' data-slide='prev'><span class='carousel-control-prev-icon' aria-hidden='true'></span><span class='sr-only'>Previous</span></a><a class='carousel-control-next' href='#carouselExampleControls' role='button' data-slide='next'><span class='carousel-control-next-icon' aria-hidden='true'></span><span class='sr-only'>Next</span></a>");								  	    	
	    }
	}
</script>
<!-- Modal -->
<div class="modal fade" id="showmo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					  <div class="modal-dialog modal-dialog-centered" role="document"> <!--可加上data-dismiss="modal"的屬性，意思是按下modal任何一處就能關閉modal-->
						  <div class="modal-content">
							  <div class="modal-header text-center">
								        <h5 class="modal-title w-100 pt-1 font-weight-bold" id="m-title"></h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <h4 aria-hidden="true">&times;</h4>
								        </button>
							  </div>
							  <div class="modal-body">
							  			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
										  <div class="carousel-inner" id="carl01">
										  	<!--裡面內容給js去放-->
										  </div>
										</div>
								      	<hr>
								      	<p class="m-2 text-justify" id="m-text">
								      		<!-- 狗山這次參與了微笑動物日，這對我們來說是一次很特別的經驗，主要能推廣狗山的教育理念，認識志同道合的夥伴，也希望能義賣賺一些毛孩們的生活費與擺攤的經驗！<br>
											.<br>
											這次在凱道前義賣天氣非常的好，大家也都熱情的來參與此次活動！<br>
											🎉沒到現場的朋友或試吃過後覺得不錯的朋友注意啦～日後我們也會將此次尚未賣完的商品一一上架至粉專喔！<br>
											#照片有可愛模特兒喔 #喜歡模特兒都可以來詢問喔<br>
											#喜歡模特兒展示的商品也可以來詢問喔<br> -->
								      	</p>
								      	<p id="m-date" class="my-1 text-right" style="font-size:1rem;color:gray;"></p>
						       </div>
						  </div>
					   </div>
</div>
<!--以上是最新消息-->

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
