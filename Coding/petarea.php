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
            @import url(petarea.css);
	</style>
	<!--bootstrap.min.css的min意思是指程式碼經過壓縮的檔案，適合網站上線時使用，程式碼可讀性較低-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!--width=device-width將寬度設為設備的寬度，initial-scale=1 設定手機螢幕畫面的初始縮放比例為100%，shrink-to-fit=no是蘋果手機專屬的設定-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<!--有時候用jquery沒有加入下面這2行就沒辦法正常執行，注意jQuery的引入檔盡量放在Bootstrap的引入檔之前-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
	<!--bootstrap.bundle.min.js這行是為了要使用popper，popper可以用來做提示框元件，目前還沒用到-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
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
	<script type="text/javascript">
    window.onload= function  change(){
     var list1 = document.getElementById("lists1").getElementsByTagName("option");
     var list2 = document.getElementById("lists2").getElementsByTagName("option");
     var list3 = document.getElementById("lists3").getElementsByTagName("option");
     var list4 = document.getElementById("lists4").getElementsByTagName("option");
     var list5 = document.getElementById("lists5").getElementsByTagName("option");
         for(i=0;i<list1.length;i++){
             list1[i].onclick = function(){

                 $("#liva1").html(this.innerHTML);
             }
                    }
          for(i=0;i<list2.length;i++){
             list2[i].onclick = function(){

                 $("#liva2").html(this.innerHTML);
             }
                    }
                    for(i=0;i<list3.length;i++){
             list3[i].onclick = function(){

                 $("#liva3").html(this.innerHTML);
             }
                    }
                    for(i=0;i<list4.length;i++){
             list4[i].onclick = function(){

                 $("#liva4").html(this.innerHTML);
             }
                    } 
                    for(i=0;i<list5.length;i++){
             list5[i].onclick = function(){

                 $("#liva5").html(this.innerHTML);
             }
                    } 

         }
    $(document).ready(function () {
    	$(".btn-outline-primary").hover(function(){
		    $(".fa-search").css("color","white");
		},function(){ 
			$(".fa-search").css("color","#E47F4A");
		});
	});
	function tosupport(){ //按下我要領養時，會把jsstorage1這個變數儲存為1，並會跳到support的modal
		localStorage.setItem("jsstorage1",1);
		window.location = "support.php";
	}
  </script>
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
		        		<button type="button" class="btn btn-warning" data-dismiss="modal">取消</button>&nbsp;&nbsp;
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
	<div id="no_back" class="cover h-100 w-100" data-src="pic/pet_banner.jpg"></div>
	<div id="no_top" class="container-fluid">
	  	<div class="row align-items-center justify-content-center">
	  		<div class="col-12 text-white text-center"><!--Height 100%-->
	  			<!--這裡vmax意思是，我的字體大小是螢幕最"長"邊的4%，vmin意思是，我的字體大小是螢幕最"短"邊的XX%-->
		        <h1 style="font-size:5vmax;">貓狗專區</h1> <!--類似h1的作法可設置display-(1~4)--> 
	        </div>
	    </div>
	  </div>
</header>

<!--以上是banner&emsp;-->
<section class="pb-4 mt-2">
	<div class="container py-2">
		<div class="row justify-content-center bg-white py-2 mx-2">
			<div class="col-10">
				<form method="POST" action="petarea.php">
					<div class="form-row mt-3">
						<div class="form-group col-xl-4 col-sm-12 position ">
							<label for="liva1">寵物別</label>
							<select class="btn btn-secondary btn-sm dropdown-toggle col-md-8 col-6" id="liva1" name="pettype">
								<option selected value="" id="lists1">不限</option>
								<option value="貓咪">貓咪</option>
								<option value="狗狗">狗狗</option>
							</select>
						</div>
						<!-- 							<button class="btn btn-secondary btn-sm dropdown-toggle col-md-8 col-6" id="liva1" type="button" data-toggle="dropdown">不限</button>
	                  		<div class="dropdown-menu" role="menu" id="lists1" name="pettype">
			                	<a class="dropdown-item" value="貓咪">貓咪</a>
			                    <a class="dropdown-item" value="狗狗">狗狗</a>
			                </div> -->
						<div class="form-group col-xl-4 col-sm-12 position ">
							<label for="liva2">領養狀態</label>
	                  		<select class="btn btn-secondary btn-sm dropdown-toggle col-md-8 col-6" id="liva2" name="petado">
								<option selected value="" id="lists2">不限</option>
								<option value="已領養">已領養</option>
								<option value="未領養">未領養</option>
							</select>
						</div>
						<div class="form-group col-xl-4 col-sm-12 position">
							<label for="liva3">年齡</label>
			                  <select class="btn btn-secondary btn-sm dropdown-toggle col-md-8 col-6" id="liva3" name="petage">
								<option selected value="" id="lists3">不限</option>
								<option value="1">1歲以下</option>
								<option value="4">2歲至4歲</option>
								<option value="5">5歲至10歲</option>
								<option value="10">11歲以上</option>
							</select>
						</div>
						
					</div>
					<div class="form-row">
						<div class="form-group col-xl-4 col-sm-12 position">
							<label for="liva4">性別</label>
	                  		<select class="btn btn-secondary btn-sm dropdown-toggle col-md-8 col-6" id="liva4" name="petsex">
								<option selected value="" id="lists4">不限</option>
								<option value="公">公</option>
								<option value="母">母</option>
							</select>
						</div>
						
						<?php
							$sqlpettype="SELECT DISTINCT Pet_Type FROM pet";
							$showlist=mysqli_query($conn,$sqlpettype);
						?>
						<div class="form-group col-xl-4 col-sm-12 position ">
							<label for="liva5">品種</label>
							<?php
								echo "<select class='btn btn-secondary btn-sm dropdown-toggle col-md-8 col-6' id='liva5'  name='pettype2'>\n";
								echo "<option selected value='' id='lists5'>不限</option>";
									while ($result=mysqli_fetch_assoc($showlist)) {
										$strtype=(string) $result['Pet_Type'];
										echo "<option value=".$strtype.">$strtype</option>\n";
									}
								echo "</select>";
							?>
						</div>
						<div class="form-group col-xl-4 col-sm-12 txt_pos">
							<button type="submit" class="btn btn-sm btn-outline-primary wdth" style="margin-right: .2rem;"><i class="fas fa-search"></i> 查詢</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- PHP -->
		<?php
			ini_set('display_errors','off');
			$type=$_POST['pettype'];
			$ado=$_POST['petado'];
			$age=$_POST['petage'];
			$sex=$_POST['petsex'];
			$type2=$_POST['pettype2'];
			$cnt=0;
			//echo "您選擇的條件是：".$sql2." ".$type." ".$ado." ".$age." ".$sex." ".$type2;
			$sql="SELECT * FROM pet";
			$rows=mysqli_query($conn,$sql);
			$data_nums = mysqli_num_rows($rows);//統計總比數
			$find_nums = $data_nums;//預設是顯示全部資料筆數
			$sql2="SELECT * FROM pet WHERE ";

			if(!empty($type)){
				if($cnt>0){
					$sql2.="AND Pet_Breeds = '$type'";
				}else{
					$sql2.="Pet_Breeds = '$type'";
				}				
				$cnt+=1;
			}
			if(!empty($ado)){
				if($cnt>0){
					$sql2.="AND Pet_Adopt = '$ado'";
				}else{
					$sql2.="Pet_Adopt = '$ado'";
				}				
				$cnt+=1;
			}
			if(!empty($age)){
				if($cnt>0){
					if ($age=='1') {
						$sql2.="AND Pet_Age BETWEEN 0 AND 1";
					}
					if ($age=='4') {
						$sql2.="AND Pet_Age BETWEEN 2 AND 4";
					}
					if ($age=='5') {
						$sql2.="AND Pet_Age BETWEEN 5 AND 10";
					}
					if ($age=='10') {
						$sql2.="AND Pet_Age BETWEEN 11 AND 50";
					}
				}else{
					if ($age=='1') {
						$sql2.="Pet_Age BETWEEN 0 AND 1";
					}
					if ($age=='4') {
						$sql2.="Pet_Age BETWEEN 2 AND 4";
					}
					if ($age=='5') {
						$sql2.="Pet_Age BETWEEN 5 AND 10";
					}
					if ($age=='10') {
						$sql2.="Pet_Age BETWEEN 11 AND 50";
					}
					// $sql2.="Pet_Age = $age";
				}				
				$cnt+=1;
			}
			if(!empty($sex)){
				if($cnt>0){
					$sql2.="AND Pet_Sex = '$sex'";
				}else{
					$sql2.="Pet_Sex = '$sex'";
				}				
				$cnt+=1;
			}
			if(!empty($type2)){
				if($cnt>0){
					$sql2.="AND Pet_Type = '$type2'";
				}else{
					$sql2.="Pet_Type = '$type2'";
				}				
				$cnt+=1;
			}
			if($cnt>0){
				$rows=mysqli_query($conn,$sql2);
				$find_nums = mysqli_num_rows($rows);//統計查詢到的總比數
				if($find_nums==0){
					$find_nums=0;
				}	
			}
		?>
		<div class="text-center pt-2" style="font-size: 1rem">－已建置 <?php echo "$data_nums"; ?> 筆貓狗資料，目前顯示 <?php echo "$find_nums"; ?> 筆－</div>		
	</div>
	<!--貓狗資料顯示-->
	<div class="container pb-4">
		<?php
			$cnt=0;
			while($row = mysqli_fetch_array($rows)){
				$cnt+=1;
				$sql2="SELECT Pic_Path FROM pic WHERE Pic_SourceID = '{$row['Pet_ID']}';";
			    $listpic=mysqli_query($conn, $sql2);
			    while($row2=mysqli_fetch_array($listpic)){
			    	$pic_path=$row2[0];
			    }
				if($cnt%2==1){ //為了兩欄一列，在以下程式碼中，<div class='row justify-content-center'>的</div>先拿掉
					echo "
		<div class='row justify-content-center'>
			<div class='col-xl-6 col-12'>
				<div class='row bg-white mx-1'> <!--若col裡面還要再+col，前面要加上row-->
					<div class='d-flex col my-3 align-items-center'>
						<div>
							<img src='$pic_path' class='imgSetting' alt='...' style='border-radius: 20px;'>
						</div>
					</div>
					<div class='col colTable'>
						<table class='table table-sm table-hover'>
						  <thead>
						    <tr>
						      <th scope='col' colspan='2' class='text-center' style='border-top:none;'><h5><i class='fas fa-paw'></i> {$row['Pet_Name']}</h5></th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						      <th scope='row'>年齡</th>
						      <td>{$row['Pet_Age']}歲</td>
						    </tr>
						    <tr>
						      <th scope='row'>性別</th>
						      <td>{$row['Pet_Sex']}</td>
						    </tr>
						    <tr>
						      <th scope='row'>品種</th>
						      <td>{$row['Pet_Type']}</td>
						    </tr>
						    <tr>
						      <th scope='row'>領養狀態</th>
						      <td>{$row['Pet_Adopt']}</td>
						    </tr>
						  </tbody>
						</table>
						<button class='btn btn-sm btn-outline-success' data-toggle='modal' data-target='#dog1' onclick='passvalue(\"{$row['Pet_Name']}\",\"{$row['Pet_Age']}\",\"{$row['Pet_Sex']}\",\"{$row['Pet_Type']}\",\"{$row['Pet_Size']}\",\"{$row['Pet_Color']}\",\"{$row['Pet_Med']}\",\"{$row['Pet_Adopt']}\",\"{$row['Pet_Personality']}\",\"{$row['Pet_Text']}\",\"$pic_path\")'>想更認識我</button>
					</div>					
				</div>
			</div>";
				}else{
					echo "			
			<div class='col-xl-6 col-12'>
				<div class='row bg-white mx-1'> <!--若col裡面還要再+col，前面要加上row-->
					<div class='d-flex col my-3 align-items-center'>
						<div>
							<img src='$pic_path'  class='imgSetting' alt='...' style='border-radius: 20px;'>
						</div>
					</div>
					<div class='col colTable'>
						<table class='table table-sm table-hover'>
						  <thead>
						    <tr>
						      <th scope='col' colspan='2' class='text-center' style='border-top:none;'><h5><i class='fas fa-paw'></i> {$row['Pet_Name']}</h5></th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						      <th scope='row'>年齡</th>
						      <td>{$row['Pet_Age']}歲</td>
						    </tr>
						    <tr>
						      <th scope='row'>性別</th>
						      <td>{$row['Pet_Sex']}</td>
						    </tr>
						    <tr>
						      <th scope='row'>品種</th>
						      <td>{$row['Pet_Type']}</td>
						    </tr>
						    <tr>
						      <th scope='row'>領養狀態</th>
						      <td>{$row['Pet_Adopt']}</td>
						    </tr>
						  </tbody>
						</table>
						<button class='btn btn-sm btn-outline-success' data-toggle='modal' data-target='#dog1' onclick='passvalue(\"{$row['Pet_Name']}\",\"{$row['Pet_Age']}\",\"{$row['Pet_Sex']}\",\"{$row['Pet_Type']}\",\"{$row['Pet_Size']}\",\"{$row['Pet_Color']}\",\"{$row['Pet_Med']}\",\"{$row['Pet_Adopt']}\",\"{$row['Pet_Personality']}\",\"{$row['Pet_Text']}\",\"$pic_path\")'>想更認識我</button>
					</div>					
				</div>
			</div>			
		</div>"; //在此才補上<div class='row justify-content-center'>的</div>
				}
			}//while的右括弧
			if ($data_nums%2 != 0){ //若總筆數為奇數，則補上<div class='row justify-content-center'>的</div>
					echo "</div>";
			}		
		?>
	</div>
	<script>
		function passvalue(nm,age,sex,type,size,color,med,ado,per,text,path){
		    var s =nm+','+age+','+sex+','+type+','+size+','+color+','+med+','+ado+','+per+','+text+','+path;
		    console.log(s);
		    document.getElementById("m-title").innerHTML=nm;
			document.getElementById("img1").setAttribute("src",path);
		    document.getElementById("m-age").innerHTML=age;
		    document.getElementById("m-sex").innerHTML=sex;
		    document.getElementById("m-type").innerHTML=type;
		    document.getElementById("m-size").innerHTML=size;
		    document.getElementById("m-color").innerHTML=color;
		    document.getElementById("m-med").innerHTML=" "+med;
		    document.getElementById("m-ado").innerHTML=" "+ado;
		    document.getElementById("m-per").innerHTML=per;
		    document.getElementById("m-text").innerHTML=text;
		    var bt_ado = document.getElementById("bt_ado");
		    if(ado=="已領養"){
		    	bt_ado.disabled=true;
		    	bt_ado.classList.remove("btn-outline-danger");
		    	bt_ado.classList.add("btn-outline-secondary");
		    	bt_ado.innerText="已幸福~";		    	
		    }
			if(ado=="未領養"){
		    	bt_ado.disabled=false;
		    	bt_ado.classList.remove("btn-outline-secondary");
		    	bt_ado.classList.add("btn-outline-danger");
		    	bt_ado.innerText="我要領養";
		    }
		}
	</script>
	<!-- modal -->
	<div class="modal fade" id="dog1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  		<div class="modal-dialog modal-lg" role="document">
    		<div class="modal-content">
      			<div class="modal-header text-center">
        			<h3 class="modal-title font-weight-bold w-100" id="exampleModalLongTitle"><i class="fas fa-paw pt-1" aria-hidden="true" data-fa-transform="shrink-8"></i> <span id="m-title"></span></h3>
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          				<span aria-hidden="true">&times;</span>
        			</button>
      			</div>
      			<div class="modal-body">
					<div class="row">
						<div class="d-flex col-6 my-3 align-items-center">
							<div>
								<img src="" id="img1" class="imgSetting" alt="..." style="border-radius: 20px;">
							</div>
						</div>
						<div class="col-6 colTable">
							<table class="table table-sm table-hover">
							  <tbody>
							    <tr>
							      <th scope="row">年齡</th>
							      <td><span id="m-age"></span>歲</td>
							    </tr>
							    <tr>
							      <th scope="row">性別</th>
							      <td id="m-sex"></td>
							    </tr>
							    <tr>
							      <th scope="row">品種</th>
							      <td id="m-type"></td>
							    </tr>
							    <tr>
							      <th scope="row">體型</th>
							      <td id="m-size"></td>
							    </tr>
							    <tr>
							      <th scope="row">毛色</th>
							      <td id="m-color"></td>
							    </tr>
							  </tbody>
							</table>
							<div class="row mt-2">
								<i class="fas fa-syringe col-6" id="m-med"></i>
								<i class="fas fa-info-circle col-6" id="m-ado"></i>								
							</div>
						</div>					
					</div>
					<div class="col-12 colTable mt-1">
						<p><i class="far fa-comment-dots"></i> 個性：<span id="m-per"></span></p>
						<p><i class="far fa-comment-dots"></i> 故事：<span id="m-text"></span></p>
					</div>
      			</div>
	      		<div class="modal-footer">
	      			<button type="button" class="btn btn-outline-danger mr-4" id="bt_ado" onclick="tosupport();">我要領養</button>
	      		</div>
    		</div>
  		</div>
	</div>
	<div class="modal fade" id="dog2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  		<div class="modal-dialog modal-lg" role="document">
    		<div class="modal-content">
      			<div class="modal-header text-center">
        			<h3 class="modal-title font-weight-bold w-100" id="exampleModalLongTitle"><i class="fas fa-paw pt-1" aria-hidden="true" data-fa-transform="shrink-8"></i> Sun</h3>
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          				<span aria-hidden="true">&times;</span>
        			</button>
      			</div>
      			<div class="modal-body">
					<div class="row">
						<div class="d-flex col-6 my-3 align-items-center">
							<div>
								<img src="pic/vol1.jpg"  class="imgSetting" alt="..." style="border-radius: 20px;">
							</div>
						</div>
						<div class="col-6 colTable">
							<table class="table table-sm table-hover">
							  <tbody>
							    <tr>
							      <th scope="row">年齡</th>
							      <td>6歲</td>
							    </tr>
							    <tr>
							      <th scope="row">性別</th>
							      <td>公</td>
							    </tr>
							    <tr>
							      <th scope="row">品種</th>
							      <td>米克斯</td>
							    </tr>
							    <tr>
							      <th scope="row">體型</th>
							      <td>中小型</td>
							    </tr>
							    <tr>
							      <th scope="row">毛色</th>
							      <td>單米色</td>
							    </tr>
							  </tbody>
							</table>
							<i class="fas fa-syringe mb-2"> 已施打預防針、已結紮</i>
							<i class="fas fa-info-circle"> 未領養</i>
						</div>					
					</div>
					<div class="col-12 colTable mt-1">
						<p><i class="far fa-comment-dots"></i> 個性：聰明伶俐，可愛親人</p>
						<p><i class="far fa-comment-dots"></i> 故事：
							Sun被發現時才兩個月大，寒流即將到來，他獨自縮瑟在車水馬龍的大馬路邊。能果腹的，只有帆布塊上的乾草與汙水。
							之後，這條四處飄蕩的小船便駛進了「狗狗山」這個避風港。 從身上的痕跡來看，他過去曾被成犬攻擊過。初來時，他遠遠見到大狗就會發瘋似的尖叫、顫抖，彷彿這樣對他就是一種巨大的折磨。
							但現在，Sun已經是一群年輕狗兒們中的領頭，調皮搗蛋，卻又聰明伶俐，讓人對他是又愛又恨。</p>
					</div>
      			</div>
	      		<div class="modal-footer">
	      			<button type="button" class="btn btn-outline-danger mr-4"  onclick="tosupport();">我要領養</button>
	      		</div>
    		</div>
  		</div>
	</div>					
<!-- modal -->
</section>             

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