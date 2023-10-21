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
            @import url(backmain.css);
	</style>
	<!--bootstrap.min.css的min意思是指程式碼經過壓縮的檔案，適合網站上線時使用，程式碼可讀性較低-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!--width=device-width將寬度設為設備的寬度，initial-scale=1 設定手機螢幕畫面的初始縮放比例為100%，shrink-to-fit=no是蘋果手機專屬的設定-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<!--bootstrap.bundle.min.js這行是為了要使用popper，popper可以用來做提示框元件，目前還沒用到-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/09745b270c.js" crossorigin="anonymous"></script>
	<script src="backmain.js"></script>
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
		<div class="row">
			<div class="col-lg-6 text-center p-0" style="border-right: medium dashed rosybrown;">
				<a href="index.php" id="v2">回前台首頁</a>				    		
			</div>
			<div class="col-lg-6 text-center p-0">
				<a href="index.php" id="v1"></a>				    		
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
			</script>';
		}else{
			echo '<script>alert("請登入以繼續。");window.location = "vollogin.php";</script>';
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
		        <h1 style="font-size:5vmax;">－後臺管理系統－</h1> <!--類似h1的作法可設置display-(1~4)--> 
	        </div>
	    </div>
	  </div>
</header>

<!--以上是狗狗山header的banner-->
<div class="container-fluid" style="padding:0 6rem;">
	<div class="row">
		<div class="col-lg-2 text-center" style="border: medium solid #bc8f8f99;padding: 0;">
			<a id="news" onclick="showdiv('newsedit');">最新消息新增修改</a>
			<a id="pet" onclick="showdiv('petedit');">貓狗專區新增修改</a>
			<a id="voltime" onclick="showdiv('voltimeedit');">志工服務時段管理</a>						
			<a id="donmon" onclick="showdiv('donmonedit');">捐款表單查看</a>
			<a id="adopt" onclick="showdiv('adoptedit');">領養表單查看</a>
			<div id="tour" onclick="showdiv('touredit');">活動內容新增修改</div>	
		</div>
		<div class="col-lg-10" style="border: medium solid #bc8f8f99;">
			<div id="newsedit" class="row px-4" style="display:none;">
				<div class="my-4 text-center justify-content-center align-items-center">
					<h4 class="text-center font-weight-bold">－最新消息列表－</h4>
					<div class="row mt-4">
						<table class="table table-hover table-responsive-lg mx-2" style="text-align: center;">
						  <thead>
						    <tr>
						      <th scope="col" style="width:5rem;">項次</th>
						      <th scope="col" class="wider">文章標題</th>
						      <th scope="col">文章內容</th>
						      <th scope="col" class="wider">發布時間</th>
						      <th scope="col" style="width:6rem;">圖片張數</th>
						      <th scope="col" class="px-5"></th>
						      <th scope="col" class="px-5"></th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php
						  		$sql="SELECT * FROM news ORDER BY News_Date DESC";
					  			$rts = mysqli_query($conn,$sql);
					  			$cnt = 0;
					  			while($row=mysqli_fetch_array($rts)){
					  				$cnt+=1;
					  				$sql2="SELECT * FROM pic WHERE Pic_SourceID='{$row['News_ID']}'";
					  				$rts2 = mysqli_query($conn,$sql2);
					  				$pnum= mysqli_num_rows($rts2);
					  				$preg_word=preg_replace("/\r|\n/", "<br>", "{$row['News_Word']}");
					  				echo "<tr>
					  					<th>#$cnt</th>
					  					<td>{$row['News_Title']}</td>
					  					<td class='limit'>$preg_word</td>
					  					<td>{$row['News_Date']}</td>
					  					<td>$pnum</td>
					  					<td><button class='btn btn-outline-success' data-toggle='modal' data-target='#m_edit' onclick='passvalue(\"$cnt\",\"{$row['News_ID']}\",\"{$row['News_Title']}\",\"$preg_word\")'>編輯</button></td>
					  					<td><button class='btn btn-outline-danger' data-toggle='modal' data-target='#m_del' onclick='passvalue2(\"{$row['News_ID']}\",\"{$row['News_Title']}\")'>刪除</button></td>
					  				</tr>";
					  			}
						  	?>
						  </tbody>
						</table>
					</div>
					<!--跳出編輯的modal-->
					<div class="modal fade" id="m_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				  		<div class="modal-dialog modal-dialog-centered" role="document">
				    		<div class="modal-content">
				      			<div class="modal-header text-center">
				        			<h4 class="modal-title font-weight-bold w-100" id="exampleModalLongTitle">編輯第 <span id="m-num"></span> 篇文章</h4>
				        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          				<span aria-hidden="true">&times;</span>
				        			</button>
				      			</div><!--"-->
				      			<form action="backmain.php" method="POST" enctype="multipart/form-data">
					      			<div class="modal-body text-left">
					      				<input type="hidden" name="nid" id="nwid">
					      				<label>1. 修改標題*</label>
						    			<input type="text" name="title" class="form-control" id="t" required>
						    			<div class="w-100 mt-3"></div>
						    			<label>2. 修改內文*</label>
						    			<textarea name="word" class="form-control" id="w" required style="height:20rem;white-space: pre-wrap;"></textarea>
						    			<div class="w-100 mt-3"></div>
						    			<label>3. 重新上傳照片(選填，更新後原本的照片將會被取代)</label><br>
						    			選擇檔案：<input type="file" class="my-2" name="file[]" id="file1" onchange="return fileValidation()" multiple><br>
					      			</div>
						      		<div class="modal-footer">
						      			<button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
						      			<button type="submit" class="btn btn-success">更新</button>
						      		</div>				      				
				      			</form>
				    		</div>
				  		</div>
					</div>
					<!--確認是否要刪除的modal-->
					<div class="modal fade" id="m_del" tabindex="-1" role="dialog" aria-labelledby="delme" aria-hidden="true">
					  	<div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 400px;">
					    	<div class="modal-content">
					    		<form action="backmain.php" method="POST">
						      		<div class="modal-header text-center">
						        		<h5 class="modal-title w-100" id="delme"></h5>
						      		</div>
						      		<div class="modal-footer" style="justify-content: center;">
						      			<input type="hidden" name="Checkdel" id="del1">
						        		<button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
						        		<button type="submit" class="btn btn-primary">確認</button>
						      		</div>	    			
					    		</form>
					    	</div>
						</div>
					</div>
					<script>
						function passvalue(cnt,id,title,word){
						    document.getElementById("nwid").defaultValue=id;
						    document.getElementById("m-num").innerHTML=cnt;
							document.getElementById("t").defaultValue=title;
						    document.getElementById("w").innerText=word;
						}
						function passvalue2(id,title){
						    document.getElementById("delme").innerHTML='您確定要刪除標題為<br>【'+title+'】<br>的文章嗎？';
						    console.log(id);
						    document.getElementById("del1").defaultValue=id;
						}
						function passvalue_people(day,ampm,place,name,cnt) {
							if (name!=""){
								document.getElementById("showme").innerHTML='以下為 <span class="ft">星期'+day+ampm+'</span><br>前往 <span class="ft">'+place+'</span> 服務的志工名單';
								document.getElementById("showme_name").innerHTML=name+'－<br>共計'+cnt+'人';								
							}else{
								document.getElementById("showme").innerHTML='此日無志工哦~';
								document.getElementById("showme_name").innerHTML="";
							}
						}
						function passvalue_voldata(a){
							console.log(a);
						}
						function passvalue_Dondata(a,b,c,d,e,f,g,h,i) {
							document.getElementById("b1").innerHTML='捐款確認單－'+a;
							document.getElementById("d_name").innerHTML=a;
							document.getElementById("d_acc").innerHTML=b;
							document.getElementById("d_tel").innerHTML=c;
							document.getElementById("d_money").innerHTML=d;
							document.getElementById("d_date").innerHTML=f;
							document.getElementById("d_email").innerHTML=e;
							document.getElementById("d_edi").innerHTML=g;
							document.getElementById("d_addr").innerHTML=h;
							document.getElementById("d_re").innerHTML=i;					
						}
						function passvalue_Adodata(a,b,c,d,e,f,g,h,i){
							document.getElementById("b2").innerHTML='領養意願單－'+a;
							document.getElementById("a_name").innerHTML=a;
							document.getElementById("a_sex").innerHTML=b;
							document.getElementById("a_pname").innerHTML=c;
							document.getElementById("a_email").innerHTML=d;
							document.getElementById("a_addr").innerHTML=e;
							document.getElementById("a_tel").innerHTML=f;
							document.getElementById("a_work").innerHTML=g;
							document.getElementById("a_mov").innerHTML=h;
							document.getElementById("a_re").innerHTML=i;
						}
					</script>
					<?php
				    	ini_set('display_errors','off');
				    	$del_id=$_POST['Checkdel'];
				    	$id=$_POST['nid'];
				    	$title=$_POST['title'];
				    	$word=$_POST['word'];
				    	$preg_word=preg_replace("/\r|\n/", "<br>", "$word");
				    	if (!empty($del_id)){
				    		//刪除本機端的舊檔
					    	$sql2="SELECT Pic_Path FROM pic WHERE Pic_SourceID='$del_id'";
					    	$rts=mysqli_query($conn,$sql2);
					    	while($row=mysqli_fetch_array($rts)){
					    		unlink('pic/'.substr($row[0],4)); 
					    	}				    		
				    		$sql="DELETE FROM news WHERE News_ID='$del_id';";
				    		$sql.="DELETE FROM pic WHERE Pic_SourceID='$del_id';";
				    		mysqli_multi_query($conn,$sql);
				    		echo "<script>alert('刪除成功。');location.href = 'backmain.php';</script>";
				    	}
				    	if (!empty($title) && !empty($word)){
							$sql="UPDATE news SET News_Title = '$title',News_Word = '$preg_word' WHERE News_ID = '$id'";
			      			mysqli_query($conn,$sql);
			      			echo "<script>alert('更新成功。');location.href = 'backmain.php';</script>";
				    	}
				    	if (isset($_FILES["file"])){ //使用者可傳多個檔、不傳檔、檔名可中文、但限定只能傳圖檔

				    		//以下為查出目前Pic_ID中最大值為多少
				    		$sql2="SELECT Pic_ID FROM pic"; 
				    		$rts=mysqli_query($conn,$sql2);
				    		while($row=mysqli_fetch_array($rts)){
				    			$arr[]=(int)substr($row[0],1); //只擷取"P1"字串中"1"的部分，並加入陣列中
				    		}
				    		$max_id=max($arr);

				    		if($_FILES['file']['name'][0]!=""){ //如果有選擇檔案的話
					    		$sql2="SELECT Pic_Path FROM pic WHERE Pic_SourceID='$id'";
					    		$rts=mysqli_query($conn,$sql2);
					    		while($row=mysqli_fetch_array($rts)){
					    			unlink('pic/'.substr($row[0],4)); //刪除本機端的舊檔
					    		}
					    		$sql3="DELETE FROM pic WHERE Pic_SourceID='$id'"; //刪除pic表內的舊資料
					    		mysqli_query($conn,$sql3);

					    		$countfiles = count($_FILES['file']['name']);
								for($i=0;$i<$countfiles;$i++){
								  	$filename = $_FILES['file']['name'][$i];
								  	if($filename==""){
								  		break;
								  	}					  	
									move_uploaded_file($_FILES['file']['tmp_name'][$i],'pic/'.$filename);//將圖片路徑新增至pic資料表
									$max_id+=1;
									$new_id="P".(string)$max_id;
									$new_path='pic/'.$filename;
									$sql4="INSERT INTO pic VALUES('$new_id','$new_path','$id')";
									mysqli_query($conn,$sql4);
								}
				    		}			    		
				    	}
					?>
				    <div class="row">				  
				    	<div class="col-lg justify-content-start">
				    		<h4 class="text-center font-weight-bold">－新增文章－</h4>
				    		<form method="post" action="backmain.php" class="form_css" enctype="multipart/form-data">
				    			<div class="form-group text-left">
					      			<input type="hidden" name="nid" id="nwid">
					      			<label>1. 新增標題*</label>
						    		<input type="text" name="nw_title" class="form-control" id="t" required>
						    		<div class="w-100 mt-3"></div>
						    		<label>2. 新增內文*</label>
						    		<textarea name="nw_word" class="form-control" id="w" required style="height:20rem;white-space: pre-wrap;"></textarea>
						    		<div class="w-100 mt-3"></div>
						    		<label>3. 上傳照片* (可上傳多張圖檔)</label><br>
						    		選擇檔案：<input type="file" class="my-2" name="file2[]" id="file2" onchange="return fileValidation2()" multiple required>
				    			</div>
				    			<button type="submit" class="btn btn-success">確定新增</button>
				    		</form>
				    		<?php
				    			ini_set('display_errors','off');
				    			$nw_title=$_POST['nw_title'];
				    			$nw_word=preg_replace("/\r|\n/", "<br>", "{$_POST['nw_word']}");
				    			//$nw_word=$_POST['nw_word'];
				    			$news_id=0;
				    			if (!empty($nw_title) && !empty($nw_word)){
						    		//以下為查出目前News_ID中最大值為多少
						    		$sql2="SELECT News_ID FROM news"; 
						    		$rts=mysqli_query($conn,$sql2);
						    		while($row=mysqli_fetch_array($rts)){
						    			$arr[]=(int)substr($row[0],1); //只擷取"N1"字串中"1"的部分，並加入陣列中
						    		}
						    		$news_id=max($arr)+1;
						    		$news_id="N".(string)$news_id;

				    				date_default_timezone_set("Asia/Taipei");
				    				$nw_date=(string)date('Y-m-d');
				    				$sqlnw='INSERT INTO news(News_ID,News_Date,News_Word,News_Title) VALUES("'.$news_id.'","'.$nw_date.'","'.$nw_word.'","'.$nw_title.'")';
			      					mysqli_query($conn,$sqlnw);
			      					echo "<script>alert('新增成功。');location.href = 'backmain.php';</script>";
				    			}
						    	if (isset($_FILES["file2"])){ //使用者可傳多個檔、檔名可中文、但限定只能傳圖檔

						    		//以下為查出目前Pic_ID中最大值為多少
						    		$sql3="SELECT Pic_ID FROM pic"; 
						    		$rts=mysqli_query($conn,$sql3);
						    		while($row=mysqli_fetch_array($rts)){
						    			$arr[]=(int)substr($row[0],1); //只擷取"P1"字串中"1"的部分，並加入陣列中
						    		}
									$max_id=max($arr);

						    		if($_FILES['file2']['name'][0]!=""){ //如果有選擇檔案的話
							    		$countfiles = count($_FILES['file2']['name']);
										for($i=0;$i<$countfiles;$i++){
										  	$filename = $_FILES['file2']['name'][$i];
										  	if($filename==""){
										  		break;
										  	}					  	
											move_uploaded_file($_FILES['file2']['tmp_name'][$i],'pic/'.$filename);//將圖片路徑新增至pic資料表
											$max_id+=1;
											$pic_id="P".(string)$max_id;
											$new_path='pic/'.$filename;
											$sql4="INSERT INTO pic VALUES('$pic_id','$new_path','$news_id')";
											mysqli_query($conn,$sql4);
										}
						    		}			    		
						    	}
				    		?>
				    	</div>
				    </div>
				</div>
			</div>
			<div id="petedit" class="row px-4" style="display:none;">
				<div class="my-4 text-center justify-content-center align-items-center">
					<h4 class="text-center font-weight-bold">－貓狗資料列表－</h4>
					<div class="row mt-4">
						<table class="table table-hover table-responsive-lg mx-2" style="text-align: center;">
						  <thead>
						    <tr>
						      <th scope="col" class="thinner2">項次</th>
						      <th scope="col" class="thinner2">種類</th>
						      <th scope="col" style="width:6rem;">姓名</th>
						      <th scope="col" class="thinner2">年齡</th>
						      <th scope="col" class="thinner2">性別</th>
						      <th scope="col" style="width:6rem;">品種</th>
						      <th scope="col" style="width:6rem;">體型</th>
						      <th scope="col" style="width:7rem;">毛色</th>
						      <th scope="col" style="width:6rem;">個性</th>
						      <th scope="col" style="width:6rem;">故事</th>
						      <th scope="col" style="width:7rem;">領養狀況</th>
						      <th scope="col" style="width:7rem;">健康狀況</th>
						      <th style="width:5rem;"></th>
						      <th style="width:5rem;"></th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php
						  		$sql="SELECT * FROM pet";
					  			$rts = mysqli_query($conn,$sql);
					  			$cnt = 0;
					  			while($row=mysqli_fetch_array($rts)){
					  				$cnt+=1;
					  				$sql2="SELECT * FROM pic WHERE Pic_SourceID='{$row['Pet_ID']}'";
					  				$rts2 = mysqli_query($conn,$sql2);
					  				$pnum= mysqli_num_rows($rts2);
					  				$preg_word=preg_replace("/\r|\n/", "<br>", "{$row['Pet_Text']}");
					  				echo "<tr>
					  					<th>#$cnt</th>
					  					<td>{$row['Pet_Breeds']}</td>
					  					<td>{$row['Pet_Name']}</td>
					  					<td>{$row['Pet_Age']}</td>
					  					<td>{$row['Pet_Sex']}</td>
					  					<td>{$row['Pet_Type']}</td>
					  					<td>{$row['Pet_Size']}</td>
					  					<td>{$row['Pet_Color']}</td>
					  					<td class='limit2'>{$row['Pet_Personality']}</td>
					  					<td class='limit2'>{$row['Pet_Text']}</td>
					  					<td>{$row['Pet_Adopt']}</td>
					  					<td class='limit2'>{$row['Pet_Med']}</td>
					  					<td><button class='btn btn-sm btn-outline-success' data-toggle='modal' data-target='#m_PTedit' onclick='passvalue(\"$cnt\",\"{$row['Pet_ID']}\",\"{$row['News_Title']}\",\"$preg_word\")'>編輯</button></td>
					  					<td><button class='btn btn-sm btn-outline-danger' data-toggle='modal' data-target='#m_PTdel' onclick='passvalue2(\"{$row['Pet_ID']}\",\"{$row['Pet_Name']}\")'>刪除</button></td>
					  				</tr>";
					  			}
						  	?>
						  </tbody>
						</table>
					</div>
					<!--跳出編輯的modal-->
					<div class="modal fade bd-example-modal-lg" id="m_PTedit" tabindex="-1" role="dialog" aria-labelledby="ModalLongTitle" aria-hidden="true">
				  		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				    		<div class="modal-content">
				      			<div class="modal-header text-center">
				        			<h4 class="modal-title font-weight-bold w-100" id="ModalLongTitle">編輯 【<span id="m-name">花花</span>】 的資料</h4>
				        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          				<span aria-hidden="true">&times;</span>
				        			</button>
				      			</div><!--"-->
				      			<form action="backmain.php" method="POST" enctype="multipart/form-data">
					      			<div class="modal-body">
					      				<div class="row text-left">
					      					<div class="col-6">
					      						<label class="col-form-label">1. 姓名*</label>
					      						<input type="text" name="pname" class="form-control" value="花花" required>
					      						<label class="col-form-label">2. 種類*</label>
									            <div class="form-control2">									            	
									                <div class="custom-control custom-radio custom-control-inline align-items-center">
									                    <input type="radio" name="pbre" class="custom-control-input" id="c1" required checked>
									                    <label class="custom-control-label" for="c1">貓</label>
									                </div>
									                <div class="custom-control custom-radio custom-control-inline align-items-center">
									                    <input type="radio" name="pbre" class="custom-control-input" id="c2" required>
									                    <label class="custom-control-label" for="c2">狗</label>
									                </div>    
									            </div>
									            <label class="col-form-label">3. 性別*</label>
									            <div class="form-control2">									            	
									                <div class="custom-control custom-radio custom-control-inline align-items-center">
									                    <input type="radio" name="psex" class="custom-control-input" id="c3" required>
									                    <label class="custom-control-label" for="c3">公</label>
									                </div>
									                <div class="custom-control custom-radio custom-control-inline align-items-center">
									                    <input type="radio" name="psex" class="custom-control-input" id="c4" checked required>
									                    <label class="custom-control-label" for="c4">母</label>
									                </div>    
									            </div>
								                <label class="col-form-label">4. 年齡* (歲)</label>
								                <input type="number" class="col-md form-control" name="num" id="validationCustom03" min="1" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" value="10" required>
					      						<label class="col-form-label">5. 品種*</label>
					      						<input type="text" name="ptype" class="form-control" value="米克斯" required>
					      						<label class="col-form-label">6. 體型*</label>
									            <div class="form-control2"> 	
									                <div class="custom-control custom-radio custom-control-inline align-items-center">
									                    <input type="radio" name="psize" class="custom-control-input" id="c5" required>
									                    <label class="custom-control-label" for="c5">幼貓</label>
									                </div>
									                <div class="custom-control custom-radio custom-control-inline align-items-center">
									                    <input type="radio" name="psize" class="custom-control-input" id="c6" checked required>
									                    <label class="custom-control-label" for="c6">成貓</label>
									                </div>
									                <div class="custom-control custom-radio custom-control-inline align-items-center">
									                    <input type="radio" name="psize" class="custom-control-input" id="c7" required>
									                    <label class="custom-control-label" for="c7">小型犬</label>
									                </div> 
									                <div class="custom-control custom-radio custom-control-inline align-items-center">
									                    <input type="radio" name="psize" class="custom-control-input" id="c8" required>
									                    <label class="custom-control-label" for="c8">中型犬</label>
									                </div>
									                <div class="custom-control custom-radio custom-control-inline align-items-center">
									                    <input type="radio" name="psize" class="custom-control-input" id="c9" required>
									                    <label class="custom-control-label" for="c9">大型犬</label>
									                </div>				                    
									            </div>
					      					</div>
					      					<div class="col-6">
					      						<label class="col-form-label">7. 毛色</label>
					      						<input type="text" name="pcolor" class="form-control" value="黑褐" required>
					      						<label class="col-form-label">8. 個性*</label>
					      						<input type="text" name="ptext" class="form-control" value="與其牠貓咪相親相愛、能與人互動。" required>
												<label class="col-form-label">9. 故事</label>
					      						<textarea name="pet_text" class="form-control" id="w2" required style="height:9rem;white-space: pre-wrap;">在公園裡發現年幼的花花及其牠兄弟姊妹被毒殺，有好幾隻已死亡，只剩幾隻奄奄一息，緊急治療後，分別送去其牠地方照料，而其中一隻花花進了貓屋。也許是親眼目睹自己的家人朋友被毒殺，花花當時十分怕人。現在於志工的細心照料下，花花已經能夠很勇敢的在房間四處走動，並與其牠貓咪相親相愛、能與人互動。</textarea>
									            <label class="col-form-label">10. 領養狀況*</label>
									            <div class="form-control2">									            	
									                <div class="custom-control custom-radio custom-control-inline align-items-center">
									                    <input type="radio" name="padopt" class="custom-control-input" id="c10" required>
									                    <label class="custom-control-label" for="c10">未領養</label>
									                </div>
									                <div class="custom-control custom-radio custom-control-inline align-items-center">
									                    <input type="radio" name="padopt" class="custom-control-input" id="c11" checked required>
									                    <label class="custom-control-label" for="c11">已領養</label>
									                </div>    
									            </div>
												<label class="col-form-label">11. 健康狀況*</label>
					      						<input type="text" name="pmed" class="form-control" value="已打預防針已結紮" required>
					      					</div>
					      				</div><br>
					      				<div class="text-left">
						      				<label>※可重新上傳照片 (更新後原本的照片將會被取代)</label><br>
								    		選擇檔案：<input type="file" class="my-2" name="file[]" id="file3" multiple> 				
								    	</div>
					      			</div>
						      		<div class="modal-footer">
						      			<button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
						      			<button type="submit" class="btn btn-success">更新</button>
						      		</div>				      				
				      			</form>
				    		</div>
				  		</div>
					</div>
					<!--確認是否要刪除的modal-->
					<div class="modal fade" id="m_PTdel" tabindex="-1" role="dialog" aria-labelledby="delme2" aria-hidden="true">
					  	<div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 300px;">
					    	<div class="modal-content">
					    		<form action="backmain.php" method="POST">
						      		<div class="modal-header text-center">
						        		<h5 class="modal-title w-100" id="delme2">你確定要刪除<br>【花花】<br>的資料嗎？</h5>
						      		</div>
						      		<div class="modal-footer" style="justify-content: center;">
						      			<input type="hidden" name="Checkdel" id="del1">
						        		<button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
						        		<button type="submit" class="btn btn-primary">確認</button>
						      		</div>	    			
					    		</form>
					    	</div>
						</div>
					</div>
				    <div class="row">				  
				    	<div class="col-lg justify-content-start">
				    		<h4 class="text-center font-weight-bold">－新增貓狗資料－</h4>
				    		<form method="post" action="backmain.php" class="form_css" enctype="multipart/form-data">
				    			<div class="row text-left">
					      			<div class="col-6">
					      						<label class="col-form-label">1. 姓名*</label>
					      						<input type="text" name="pname" class="form-control" required>
					      						<label class="col-form-label">2. 種類*</label>
									            <div class="form-control2">									            	
									                <div class="custom-control custom-radio custom-control-inline align-items-center">
									                    <input type="radio" name="pbre" class="custom-control-input" id="c1-1" required>
									                    <label class="custom-control-label" for="c1-1">貓</label>
									                </div>
									                <div class="custom-control custom-radio custom-control-inline align-items-center">
									                    <input type="radio" name="pbre" class="custom-control-input" id="c2-2" required>
									                    <label class="custom-control-label" for="c2-2">狗</label>
									                </div>    
									            </div>
									            <label class="col-form-label">3. 性別*</label>
									            <div class="form-control2">									            	
									                <div class="custom-control custom-radio custom-control-inline align-items-center">
									                    <input type="radio" name="psex" class="custom-control-input" id="c3-3" required>
									                    <label class="custom-control-label" for="c3-3">公</label>
									                </div>
									                <div class="custom-control custom-radio custom-control-inline align-items-center">
									                    <input type="radio" name="psex" class="custom-control-input" id="c4-4" required>
									                    <label class="custom-control-label" for="c4-4">母</label>
									                </div>    
									            </div>
								                <label class="col-form-label">4. 年齡* (歲)</label>
								                <input type="number" class="col-md form-control" name="num" id="validationCustom03" min="1" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" required>
					      						<label class="col-form-label">5. 品種*</label>
					      						<input type="text" name="ptype" class="form-control" required>
					      						<label class="col-form-label">6. 體型*</label>
									            <div class="form-control2">									            	
									                <div class="custom-control custom-radio custom-control-inline align-items-center">
									                    <input type="radio" name="psize" class="custom-control-input" id="c5-5" required>
									                    <label class="custom-control-label" for="c5-5">幼貓</label>
									                </div>
									                <div class="custom-control custom-radio custom-control-inline align-items-center">
									                    <input type="radio" name="psize" class="custom-control-input" id="c6-6" required>
									                    <label class="custom-control-label" for="c6-6">成貓</label>
									                </div>
									                <div class="custom-control custom-radio custom-control-inline align-items-center">
									                    <input type="radio" name="psize" class="custom-control-input" id="c7-7" required>
									                    <label class="custom-control-label" for="c7-7">小型犬</label>
									                </div> 
									                <div class="custom-control custom-radio custom-control-inline align-items-center">
									                    <input type="radio" name="psize" class="custom-control-input" id="c8-8" required>
									                    <label class="custom-control-label" for="c8-8">中型犬</label>
									                </div>
									                <div class="custom-control custom-radio custom-control-inline align-items-center">
									                    <input type="radio" name="psize" class="custom-control-input" id="c9-9" required>
									                    <label class="custom-control-label" for="c9-9">大型犬</label>
									                </div>				                    
									            </div>
									            <label class="col-form-label">7. 上傳照片*</label><br>
								    			<input type="file" class="my-2" name="file[]" id="file4" multiple>	
					      			</div>
					      			<div class="col-6">
					      						<label class="col-form-label">8. 毛色</label>
					      						<input type="text" name="pcolor" class="form-control" required>				
					      						<label class="col-form-label">9. 個性*</label>
					      						<input type="text" name="ptext" class="form-control" required>
												<label class="col-form-label">10. 故事</label>
					      						<textarea name="pet_text" class="form-control" id="w2" required style="height:11.5rem;white-space: pre-wrap;"></textarea>
									            <label class="col-form-label">11. 領養狀況*</label>
									            <div class="form-control2">									            	
									                <div class="custom-control custom-radio custom-control-inline align-items-center">
									                    <input type="radio" name="padopt" class="custom-control-input" id="c10-10" required>
									                    <label class="custom-control-label" for="c10-10">未領養</label>
									                </div>
									                <div class="custom-control custom-radio custom-control-inline align-items-center">
									                    <input type="radio" name="padopt" class="custom-control-input" id="c11-11" required>
									                    <label class="custom-control-label" for="c11-11">已領養</label>
									                </div>    
									            </div>
												<label class="col-form-label">12. 健康狀況*</label>
					      						<input type="text" name="pmed" class="form-control" required>
					      			</div>	    				
				    			</div><br>
				    			<button type="submit" class="btn btn-success">確定新增</button>
				    		</form>
				    	</div>
				    </div>
				</div>
			</div>
			<div id="voltimeedit" class="row px-5" style="display:none;">
				<div class="my-4 justify-content-center align-items-center">
					<h4 class="text-center font-weight-bold">－依場域顯示服務人數－</h4>
					<div class="row my-4">
						<h5>1. 狗場</h5>&nbsp;<img src="pic/icon_dog.png" alt="icon_dog" style="width:1.5rem;height:1.5rem;">
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
									<td>
										<?php
											$cnt=0;$name="";
											$sql="SELECT * FROM volact WHERE VA_Ampm='上午' AND VA_Area='狗場' AND VA_NTime LIKE '%1%';";
											$rts=mysqli_query($conn,$sql);
											while($row=mysqli_fetch_array($rts)){
												$cnt+=1;
												$sql2="SELECT Vol_name FROM vol WHERE Vol_ID = {$row['VA_ID']};";
												$rts2=mysqli_query($conn,$sql2);
												while($row2=mysqli_fetch_array($rts2)){
													$name.=$row2[0].'<br>';
												}												
											}
											$a='一';$b='上午';$c='狗場';
											echo "<span id='d1' style='color:red;' data-toggle='modal' data-target='#m_showName' onclick='passvalue_people(\"$a\",\"$b\",\"$c\",\"$name\",\"$cnt\")'>";
											echo $cnt.'人</span>';
										?>	
									</td>
									<td>
										<span id="d2">
											<?php
												$cnt=0;$name="";
												$sql="SELECT * FROM volact WHERE VA_Ampm='上午' AND VA_Area='狗場' AND VA_NTime LIKE '%2%';";
												$rts=mysqli_query($conn,$sql);
												while($row=mysqli_fetch_array($rts)){
													$cnt+=1;
													$sql2="SELECT Vol_name FROM vol WHERE Vol_ID = {$row['VA_ID']};";
													$rts2=mysqli_query($conn,$sql2);
													while($row2=mysqli_fetch_array($rts2)){
														$name.=$row2[0].'<br>';
													}												
												}
												$a='二';$b='上午';$c='狗場';
												echo "<span id='d1' data-toggle='modal' data-target='#m_showName' onclick='passvalue_people(\"$a\",\"$b\",\"$c\",\"$name\",\"$cnt\")'>";
												echo $cnt.'人</span>';
											?>
										</span>
									</td>
									<td>
										<span id="d3">
											<?php
												$cnt=0;$name="";
												$sql="SELECT * FROM volact WHERE VA_Ampm='上午' AND VA_Area='狗場' AND VA_NTime LIKE '%3%';";
												$rts=mysqli_query($conn,$sql);
												while($row=mysqli_fetch_array($rts)){
													$cnt+=1;
													$sql2="SELECT Vol_name FROM vol WHERE Vol_ID = {$row['VA_ID']};";
													$rts2=mysqli_query($conn,$sql2);
													while($row2=mysqli_fetch_array($rts2)){
														$name.=$row2[0].'<br>';
													}												
												}
												$a='三';$b='上午';$c='狗場';
												echo "<span id='d1' data-toggle='modal' data-target='#m_showName' onclick='passvalue_people(\"$a\",\"$b\",\"$c\",\"$name\",\"$cnt\")'>";
												echo $cnt.'人</span>';
											?>
										</span>
									</td>
									<td>
										<span id="d4">
											<?php
												$cnt=0;$name="";
												$sql="SELECT * FROM volact WHERE VA_Ampm='上午' AND VA_Area='狗場' AND VA_NTime LIKE '%4%';";
												$rts=mysqli_query($conn,$sql);
												while($row=mysqli_fetch_array($rts)){
													$cnt+=1;
													$sql2="SELECT Vol_name FROM vol WHERE Vol_ID = {$row['VA_ID']};";
													$rts2=mysqli_query($conn,$sql2);
													while($row2=mysqli_fetch_array($rts2)){
														$name.=$row2[0].'<br>';
													}												
												}
												$a='四';$b='上午';$c='狗場';
												echo "<span id='d1' data-toggle='modal' data-target='#m_showName' onclick='passvalue_people(\"$a\",\"$b\",\"$c\",\"$name\",\"$cnt\")'>";
												echo $cnt.'人</span>';
											?>
										</span>
									</td>
									<td>
										<span id="d5">
											<?php
												$cnt=0;$name="";
												$sql="SELECT * FROM volact WHERE VA_Ampm='上午' AND VA_Area='狗場' AND VA_NTime LIKE '%5%';";
												$rts=mysqli_query($conn,$sql);
												while($row=mysqli_fetch_array($rts)){
													$cnt+=1;
													$sql2="SELECT Vol_name FROM vol WHERE Vol_ID = {$row['VA_ID']};";
													$rts2=mysqli_query($conn,$sql2);
													while($row2=mysqli_fetch_array($rts2)){
														$name.=$row2[0].'<br>';
													}												
												}
												$a='五';$b='上午';$c='狗場';
												echo "<span id='d1' data-toggle='modal' data-target='#m_showName' onclick='passvalue_people(\"$a\",\"$b\",\"$c\",\"$name\",\"$cnt\")'>";
												echo $cnt.'人</span>';
											?>
										</span>
									</td>
									<td>
										<span id="d6" style="color:red;">
											<?php
												$cnt=0;$name="";
												$sql="SELECT * FROM volact WHERE VA_Ampm='上午' AND VA_Area='狗場' AND VA_NTime LIKE '%6%';";
												$rts=mysqli_query($conn,$sql);
												while($row=mysqli_fetch_array($rts)){
													$cnt+=1;
													$sql2="SELECT Vol_name FROM vol WHERE Vol_ID = {$row['VA_ID']};";
													$rts2=mysqli_query($conn,$sql2);
													while($row2=mysqli_fetch_array($rts2)){
														$name.=$row2[0].'<br>';
													}												
												}
												$a='六';$b='上午';$c='狗場';
												echo "<span id='d1' style='color:red;' data-toggle='modal' data-target='#m_showName' onclick='passvalue_people(\"$a\",\"$b\",\"$c\",\"$name\",\"$cnt\")'>";
												echo $cnt.'人</span>';
											?>
										</span>
									</td>
									<td>
										<span id="d7">
											<?php
												$cnt=0;$name="";
												$sql="SELECT * FROM volact WHERE VA_Ampm='上午' AND VA_Area='狗場' AND VA_NTime LIKE '%7%';";
												$rts=mysqli_query($conn,$sql);
												while($row=mysqli_fetch_array($rts)){
													$cnt+=1;
													$sql2="SELECT Vol_name FROM vol WHERE Vol_ID = {$row['VA_ID']};";
													$rts2=mysqli_query($conn,$sql2);
													while($row2=mysqli_fetch_array($rts2)){
														$name.=$row2[0].'<br>';
													}												
												}
												$a='七';$b='上午';$c='狗場';
												echo "<span id='d1' data-toggle='modal' data-target='#m_showName' onclick='passvalue_people(\"$a\",\"$b\",\"$c\",\"$name\",\"$cnt\")'>";
												echo $cnt.'人</span>';
											?>
										</span>
									</td>
								</tr>
									<th>下午</th>
									<td>
										<span id="d8" style="color:red;">
										<?php
											$cnt=0;$name="";
											$sql="SELECT * FROM volact WHERE VA_Ampm='下午' AND VA_Area='狗場' AND VA_NTime LIKE '%1%';";
											$rts=mysqli_query($conn,$sql);
											while($row=mysqli_fetch_array($rts)){
												$cnt+=1;
												$sql2="SELECT Vol_name FROM vol WHERE Vol_ID = {$row['VA_ID']};";
												$rts2=mysqli_query($conn,$sql2);
												while($row2=mysqli_fetch_array($rts2)){
													$name.=$row2[0].'<br>';
												}												
											}
											$a='一';$b='下午';$c='狗場';
											echo "<span id='d1' style='color:red;' data-toggle='modal' data-target='#m_showName' onclick='passvalue_people(\"$a\",\"$b\",\"$c\",\"$name\",\"$cnt\")'>";
											echo $cnt.'人</span>';
										?>
										</span>
									</td>
									<td>
										<span id="d9" style="color:red;">
										<?php
											$cnt=0;$name="";
											$sql="SELECT * FROM volact WHERE VA_Ampm='下午' AND VA_Area='狗場' AND VA_NTime LIKE '%2%';";
											$rts=mysqli_query($conn,$sql);
											while($row=mysqli_fetch_array($rts)){
												$cnt+=1;
												$sql2="SELECT Vol_name FROM vol WHERE Vol_ID = {$row['VA_ID']};";
												$rts2=mysqli_query($conn,$sql2);
												while($row2=mysqli_fetch_array($rts2)){
													$name.=$row2[0].'<br>';
												}												
											}
											$a='二';$b='下午';$c='狗場';
											echo "<span id='d1' style='color:red;' data-toggle='modal' data-target='#m_showName' onclick='passvalue_people(\"$a\",\"$b\",\"$c\",\"$name\",\"$cnt\")'>";
											echo $cnt.'人</span>';
										?>
										</span>
									</td>
									<td>
										<span id="d10">
										<?php
											$cnt=0;$name="";
											$sql="SELECT * FROM volact WHERE VA_Ampm='下午' AND VA_Area='狗場' AND VA_NTime LIKE '%3%';";
											$rts=mysqli_query($conn,$sql);
											while($row=mysqli_fetch_array($rts)){
												$cnt+=1;
												$sql2="SELECT Vol_name FROM vol WHERE Vol_ID = {$row['VA_ID']};";
												$rts2=mysqli_query($conn,$sql2);
												while($row2=mysqli_fetch_array($rts2)){
													$name.=$row2[0].'<br>';
												}												
											}
											$a='三';$b='下午';$c='狗場';
											echo "<span id='d1' data-toggle='modal' data-target='#m_showName' onclick='passvalue_people(\"$a\",\"$b\",\"$c\",\"$name\",\"$cnt\")'>";
											echo $cnt.'人</span>';
										?>
										</span>
									</td>
									<td>
										<span id="d11">
										<?php
											$cnt=0;$name="";
											$sql="SELECT * FROM volact WHERE VA_Ampm='下午' AND VA_Area='狗場' AND VA_NTime LIKE '%4%';";
											$rts=mysqli_query($conn,$sql);
											while($row=mysqli_fetch_array($rts)){
												$cnt+=1;
												$sql2="SELECT Vol_name FROM vol WHERE Vol_ID = {$row['VA_ID']};";
												$rts2=mysqli_query($conn,$sql2);
												while($row2=mysqli_fetch_array($rts2)){
													$name.=$row2[0].'<br>';
												}												
											}
											$a='四';$b='下午';$c='狗場';
											echo "<span id='d1' data-toggle='modal' data-target='#m_showName' onclick='passvalue_people(\"$a\",\"$b\",\"$c\",\"$name\",\"$cnt\")'>";
											echo $cnt.'人</span>';
										?>
										</span>
									</td>
									<td>
										<span id="d12">
										<?php
											$cnt=0;$name="";
											$sql="SELECT * FROM volact WHERE VA_Ampm='下午' AND VA_Area='狗場' AND VA_NTime LIKE '%5%';";
											$rts=mysqli_query($conn,$sql);
											while($row=mysqli_fetch_array($rts)){
												$cnt+=1;
												$sql2="SELECT Vol_name FROM vol WHERE Vol_ID = {$row['VA_ID']};";
												$rts2=mysqli_query($conn,$sql2);
												while($row2=mysqli_fetch_array($rts2)){
													$name.=$row2[0].'<br>';
												}												
											}
											$a='五';$b='下午';$c='狗場';
											echo "<span id='d1' data-toggle='modal' data-target='#m_showName' onclick='passvalue_people(\"$a\",\"$b\",\"$c\",\"$name\",\"$cnt\")'>";
											echo $cnt.'人</span>';
										?>
										</span>
									</td>
									<td>
										<span id="d13">
										<?php
											$cnt=0;$name="";
											$sql="SELECT * FROM volact WHERE VA_Ampm='下午' AND VA_Area='狗場' AND VA_NTime LIKE '%6%';";
											$rts=mysqli_query($conn,$sql);
											while($row=mysqli_fetch_array($rts)){
												$cnt+=1;
												$sql2="SELECT Vol_name FROM vol WHERE Vol_ID = {$row['VA_ID']};";
												$rts2=mysqli_query($conn,$sql2);
												while($row2=mysqli_fetch_array($rts2)){
													$name.=$row2[0].'<br>';
												}												
											}
											$a='六';$b='下午';$c='狗場';
											echo "<span id='d1' data-toggle='modal' data-target='#m_showName' onclick='passvalue_people(\"$a\",\"$b\",\"$c\",\"$name\",\"$cnt\")'>";
											echo $cnt.'人</span>';
										?>
										</span>
									</td>
									<td>
										<span id="d14">
										<?php
											$cnt=0;$name="";
											$sql="SELECT * FROM volact WHERE VA_Ampm='下午' AND VA_Area='狗場' AND VA_NTime LIKE '%7%';";
											$rts=mysqli_query($conn,$sql);
											while($row=mysqli_fetch_array($rts)){
												$cnt+=1;
												$sql2="SELECT Vol_name FROM vol WHERE Vol_ID = {$row['VA_ID']};";
												$rts2=mysqli_query($conn,$sql2);
												while($row2=mysqli_fetch_array($rts2)){
													$name.=$row2[0].'<br>';
												}												
											}
											$a='日';$b='下午';$c='狗場';
											echo "<span id='d1' data-toggle='modal' data-target='#m_showName' onclick='passvalue_people(\"$a\",\"$b\",\"$c\",\"$name\",\"$cnt\")'>";
											echo $cnt.'人</span>';
										?>
										</span>
									</td>								
								</tr>
							</tbody>
						</table>						
						<h5>2. 貓屋</h5>&nbsp;<img src="pic/icon_cat.png" alt="icon_cat" style="width:1.5rem;height:1.5rem;">
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
									<td>
										<span id="c1" style="color:red;">
											<?php
												$cnt=0;$name="";
												$sql="SELECT * FROM volact WHERE VA_Ampm='上午' AND VA_Area='貓屋' AND VA_NTime LIKE '%1%';";
												$rts=mysqli_query($conn,$sql);
												while($row=mysqli_fetch_array($rts)){
													$cnt+=1;
													$sql2="SELECT Vol_name FROM vol WHERE Vol_ID = {$row['VA_ID']};";
													$rts2=mysqli_query($conn,$sql2);
													while($row2=mysqli_fetch_array($rts2)){
														$name.=$row2[0].'<br>';
													}												
												}
												$a='一';$b='上午';$c='貓屋';
												echo "<span id='d1' style='color:red;' data-toggle='modal' data-target='#m_showName' onclick='passvalue_people(\"$a\",\"$b\",\"$c\",\"$name\",\"$cnt\")'>";
												echo $cnt.'人</span>';
											?>
										</span>
											
									</td>
									<td>
										<span id="c2">
											<?php
												$cnt=0;$name="";
												$sql="SELECT * FROM volact WHERE VA_Ampm='上午' AND VA_Area='貓屋' AND VA_NTime LIKE '%2%';";
												$rts=mysqli_query($conn,$sql);
												while($row=mysqli_fetch_array($rts)){
													$cnt+=1;
													$sql2="SELECT Vol_name FROM vol WHERE Vol_ID = {$row['VA_ID']};";
													$rts2=mysqli_query($conn,$sql2);
													while($row2=mysqli_fetch_array($rts2)){
														$name.=$row2[0].'<br>';
													}												
												}
												$a='二';$b='上午';$c='貓屋';
												echo "<span id='d1' data-toggle='modal' data-target='#m_showName' onclick='passvalue_people(\"$a\",\"$b\",\"$c\",\"$name\",\"$cnt\")'>";
												echo $cnt.'人</span>';
											?>
										</span>
									</td>
									<td>
										<span id="c3" style="color:red;">
											<?php
												$cnt=0;$name="";
												$sql="SELECT * FROM volact WHERE VA_Ampm='上午' AND VA_Area='貓屋' AND VA_NTime LIKE '%3%';";
												$rts=mysqli_query($conn,$sql);
												while($row=mysqli_fetch_array($rts)){
													$cnt+=1;
													$sql2="SELECT Vol_name FROM vol WHERE Vol_ID = {$row['VA_ID']};";
													$rts2=mysqli_query($conn,$sql2);
													while($row2=mysqli_fetch_array($rts2)){
														$name.=$row2[0].'<br>';
													}												
												}
												$a='三';$b='上午';$c='貓屋';
												echo "<span id='d1' style='color:red;' data-toggle='modal' data-target='#m_showName' onclick='passvalue_people(\"$a\",\"$b\",\"$c\",\"$name\",\"$cnt\")'>";
												echo $cnt.'人</span>';
											?>
										</span>
									</td>
									<td>
										<span id="c4">
											<?php
												$cnt=0;$name="";
												$sql="SELECT * FROM volact WHERE VA_Ampm='上午' AND VA_Area='貓屋' AND VA_NTime LIKE '%4%';";
												$rts=mysqli_query($conn,$sql);
												while($row=mysqli_fetch_array($rts)){
													$cnt+=1;
													$sql2="SELECT Vol_name FROM vol WHERE Vol_ID = {$row['VA_ID']};";
													$rts2=mysqli_query($conn,$sql2);
													while($row2=mysqli_fetch_array($rts2)){
														$name.=$row2[0].'<br>';
													}												
												}
												$a='四';$b='上午';$c='貓屋';
												echo "<span id='d1' data-toggle='modal' data-target='#m_showName' onclick='passvalue_people(\"$a\",\"$b\",\"$c\",\"$name\",\"$cnt\")'>";
												echo $cnt.'人</span>';
											?>
										</span>
									</td>
									<td>
										<span id="c5">
											<?php
												$cnt=0;$name="";
												$sql="SELECT * FROM volact WHERE VA_Ampm='上午' AND VA_Area='貓屋' AND VA_NTime LIKE '%5%';";
												$rts=mysqli_query($conn,$sql);
												while($row=mysqli_fetch_array($rts)){
													$cnt+=1;
													$sql2="SELECT Vol_name FROM vol WHERE Vol_ID = {$row['VA_ID']};";
													$rts2=mysqli_query($conn,$sql2);
													while($row2=mysqli_fetch_array($rts2)){
														$name.=$row2[0].'<br>';
													}												
												}
												$a='五';$b='上午';$c='貓屋';
												echo "<span id='d1' data-toggle='modal' data-target='#m_showName' onclick='passvalue_people(\"$a\",\"$b\",\"$c\",\"$name\",\"$cnt\")'>";
												echo $cnt.'人</span>';
											?>
										</span>
									</td>
									<td>
										<span id="c6" style="color:red;">
											<?php
												$cnt=0;$name="";
												$sql="SELECT * FROM volact WHERE VA_Ampm='上午' AND VA_Area='貓屋' AND VA_NTime LIKE '%6%';";
												$rts=mysqli_query($conn,$sql);
												while($row=mysqli_fetch_array($rts)){
													$cnt+=1;
													$sql2="SELECT Vol_name FROM vol WHERE Vol_ID = {$row['VA_ID']};";
													$rts2=mysqli_query($conn,$sql2);
													while($row2=mysqli_fetch_array($rts2)){
														$name.=$row2[0].'<br>';
													}												
												}
												$a='六';$b='上午';$c='貓屋';
												echo "<span id='d1' style='color:red;' data-toggle='modal' data-target='#m_showName' onclick='passvalue_people(\"$a\",\"$b\",\"$c\",\"$name\",\"$cnt\")'>";
												echo $cnt.'人</span>';
											?>
										</span>
									</td>
									<td>
										<span id="c7" style="color:red;">
											<?php
												$cnt=0;$name="";
												$sql="SELECT * FROM volact WHERE VA_Ampm='上午' AND VA_Area='貓屋' AND VA_NTime LIKE '%7%';";
												$rts=mysqli_query($conn,$sql);
												while($row=mysqli_fetch_array($rts)){
													$cnt+=1;
													$sql2="SELECT Vol_name FROM vol WHERE Vol_ID = {$row['VA_ID']};";
													$rts2=mysqli_query($conn,$sql2);
													while($row2=mysqli_fetch_array($rts2)){
														$name.=$row2[0].'<br>';
													}												
												}
												$a='日';$b='上午';$c='貓屋';
												echo "<span id='d1' style='color:red;' data-toggle='modal' data-target='#m_showName' onclick='passvalue_people(\"$a\",\"$b\",\"$c\",\"$name\",\"$cnt\")'>";
												echo $cnt.'人</span>';
											?>
										</span>
									</td>
								</tr>
									<th>下午</th>
									<td>
										<span id="c8" style="color:red;">
										<?php
											$cnt=0;$name="";
											$sql="SELECT * FROM volact WHERE VA_Ampm='下午' AND VA_Area='貓屋' AND VA_NTime LIKE '%1%';";
											$rts=mysqli_query($conn,$sql);
											while($row=mysqli_fetch_array($rts)){
												$cnt+=1;
												$sql2="SELECT Vol_name FROM vol WHERE Vol_ID = {$row['VA_ID']};";
												$rts2=mysqli_query($conn,$sql2);
												while($row2=mysqli_fetch_array($rts2)){
													$name.=$row2[0].'<br>';
												}												
											}
											$a='一';$b='下午';$c='貓屋';
											echo "<span id='d1' style='color:red;' data-toggle='modal' data-target='#m_showName' onclick='passvalue_people(\"$a\",\"$b\",\"$c\",\"$name\",\"$cnt\")'>";
											echo $cnt.'人</span>';
										?>
										</span>
									</td>
									<td>
										<span id="c9" style="color:red;">
										<?php
											$cnt=0;$name="";
											$sql="SELECT * FROM volact WHERE VA_Ampm='下午' AND VA_Area='貓屋' AND VA_NTime LIKE '%2%';";
											$rts=mysqli_query($conn,$sql);
											while($row=mysqli_fetch_array($rts)){
												$cnt+=1;
												$sql2="SELECT Vol_name FROM vol WHERE Vol_ID = {$row['VA_ID']};";
												$rts2=mysqli_query($conn,$sql2);
												while($row2=mysqli_fetch_array($rts2)){
													$name.=$row2[0].'<br>';
												}												
											}
											$a='二';$b='下午';$c='貓屋';
											echo "<span id='d1' style='color:red;' data-toggle='modal' data-target='#m_showName' onclick='passvalue_people(\"$a\",\"$b\",\"$c\",\"$name\",\"$cnt\")'>";
											echo $cnt.'人</span>';
										?>
										</span>
									</td>
									<td>
										<span id="c10">
										<?php
											$cnt=0;$name="";
											$sql="SELECT * FROM volact WHERE VA_Ampm='下午' AND VA_Area='貓屋' AND VA_NTime LIKE '%3%';";
											$rts=mysqli_query($conn,$sql);
											while($row=mysqli_fetch_array($rts)){
												$cnt+=1;
												$sql2="SELECT Vol_name FROM vol WHERE Vol_ID = {$row['VA_ID']};";
												$rts2=mysqli_query($conn,$sql2);
												while($row2=mysqli_fetch_array($rts2)){
													$name.=$row2[0].'<br>';
												}												
											}
											$a='三';$b='下午';$c='貓屋';
											echo "<span id='d1' data-toggle='modal' data-target='#m_showName' onclick='passvalue_people(\"$a\",\"$b\",\"$c\",\"$name\",\"$cnt\")'>";
											echo $cnt.'人</span>';
										?>
										</span>
									</td>
									<td>
										<span id="c11" style="color:red;">
										<?php
											$cnt=0;$name="";
											$sql="SELECT * FROM volact WHERE VA_Ampm='下午' AND VA_Area='貓屋' AND VA_NTime LIKE '%4%';";
											$rts=mysqli_query($conn,$sql);
											while($row=mysqli_fetch_array($rts)){
												$cnt+=1;
												$sql2="SELECT Vol_name FROM vol WHERE Vol_ID = {$row['VA_ID']};";
												$rts2=mysqli_query($conn,$sql2);
												while($row2=mysqli_fetch_array($rts2)){
													$name.=$row2[0].'<br>';
												}												
											}
											$a='四';$b='下午';$c='貓屋';
											echo "<span id='d1' style='color:red;' data-toggle='modal' data-target='#m_showName' onclick='passvalue_people(\"$a\",\"$b\",\"$c\",\"$name\",\"$cnt\")'>";
											echo $cnt.'人</span>';
										?>
										</span>
									</td>
									<td>
										<span id="c12">
										<?php
											$cnt=0;$name="";
											$sql="SELECT * FROM volact WHERE VA_Ampm='下午' AND VA_Area='貓屋' AND VA_NTime LIKE '%5%';";
											$rts=mysqli_query($conn,$sql);
											while($row=mysqli_fetch_array($rts)){
												$cnt+=1;
												$sql2="SELECT Vol_name FROM vol WHERE Vol_ID = {$row['VA_ID']};";
												$rts2=mysqli_query($conn,$sql2);
												while($row2=mysqli_fetch_array($rts2)){
													$name.=$row2[0].'<br>';
												}												
											}
											$a='五';$b='下午';$c='貓屋';
											echo "<span id='d1' data-toggle='modal' data-target='#m_showName' onclick='passvalue_people(\"$a\",\"$b\",\"$c\",\"$name\",\"$cnt\")'>";
											echo $cnt.'人</span>';
										?>
										</span>
									</td>
									<td>
										<span id="c13">
										<?php
											$cnt=0;$name="";
											$sql="SELECT * FROM volact WHERE VA_Ampm='下午' AND VA_Area='貓屋' AND VA_NTime LIKE '%6%';";
											$rts=mysqli_query($conn,$sql);
											while($row=mysqli_fetch_array($rts)){
												$cnt+=1;
												$sql2="SELECT Vol_name FROM vol WHERE Vol_ID = {$row['VA_ID']};";
												$rts2=mysqli_query($conn,$sql2);
												while($row2=mysqli_fetch_array($rts2)){
													$name.=$row2[0].'<br>';
												}												
											}
											$a='六';$b='下午';$c='貓屋';
											echo "<span id='d1' data-toggle='modal' data-target='#m_showName' onclick='passvalue_people(\"$a\",\"$b\",\"$c\",\"$name\",\"$cnt\")'>";
											echo $cnt.'人</span>';
										?>
										</span>
									</td>
									<td>
										<span id="c14">
										<?php
											$cnt=0;$name="";
											$sql="SELECT * FROM volact WHERE VA_Ampm='下午' AND VA_Area='貓屋' AND VA_NTime LIKE '%7%';";
											$rts=mysqli_query($conn,$sql);
											while($row=mysqli_fetch_array($rts)){
												$cnt+=1;
												$sql2="SELECT Vol_name FROM vol WHERE Vol_ID = {$row['VA_ID']};";
												$rts2=mysqli_query($conn,$sql2);
												while($row2=mysqli_fetch_array($rts2)){
													$name.=$row2[0].'<br>';
												}												
											}
											$a='日';$b='下午';$c='貓屋';
											echo "<span id='d1' data-toggle='modal' data-target='#m_showName' onclick='passvalue_people(\"$a\",\"$b\",\"$c\",\"$name\",\"$cnt\")'>";
											echo $cnt.'人</span>';
										?>
										</span>
									</td>								
								</tr>
							</tbody>
						</table>
						<!--秀出志工姓名的modal-->
						<div class="modal fade" id="m_showName" tabindex="-1" role="dialog" aria-labelledby="showme" aria-hidden="true">
						  	<div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 400px;">
						    	<div class="modal-content">
							      	<div class="modal-header text-center">
							        	<h5 class="modal-title w-100" id="showme"></h5>
							        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
							      	</div>
							      	<div class="modal-body text-center">
							      		<span id="showme_name" style="font-weight: bold;font-size: 1.2rem;"></span>
							      	</div>
						    	</div>
							</div>
						</div>
						<form action="backmain.php" method="POST">
							<div class="form-group">
						    	<label class="w-100">※想提醒志工的一句話 (將顯示於志工專區/申請服務時段)</label><br>
						    	<?php
						    		$sql="SELECT Remark_Word From remark;";
						    		$rts=mysqli_query($conn,$sql);
						    		while($row=mysqli_fetch_array($rts)){
						    			echo "<input type='text' name='rm_word' class='form-control d-inline' placeholder='{$row[0]}' required style='width: 70%'>";
						    		}
						    	?>						    	
						    	<button type="submit" class="btn btn-success d-inline mb-1" style="width: 20%">更新</button>
						    </div>					    	
						</form>
						<?php
							$rword=$_POST['rm_word'];
							if(!empty($rword)){
								$sql="DELETE FROM remark WHERE Remark_ID = 1;";
								mysqli_query($conn,$sql);
								$sql="INSERT INTO remark VALUES(1,'$rword');";
								mysqli_query($conn,$sql);
								echo "<script>location.href = 'backmain.php';</script>";
							}
						?>
					</div>
					<h4 class="text-center font-weight-bold">－依志工顯示服務時段－</h4>
					<div class="row mt-4">
						<table class="table table-bordered text-center">
							<tbody>
								<tr>
									<th rowspan="2" style="vertical-align:middle;">項次</th>
									<th rowspan="2" style="vertical-align:middle;">姓名</th>
									<th colspan="2">狗場</th>
									<th colspan="2">貓屋</th>									
								</tr>
								<tr>
									<th>上午</th><th>下午</th><th>上午</th><th>下午</th>
								</tr>
								<?php
									$sql="SELECT COUNT(*) FROM vol;";
									$rts=mysqli_query($conn,$sql);
									$total_volnum=0;
									while($row=mysqli_fetch_array($rts)){
										$total_volnum=$row[0];
									}
									for($i=1;$i<=$total_volnum;$i++){
										echo "<tr>";
										$sql="SELECT Vol_Name,VA_NTime FROM vol,volact WHERE volact.VA_ID=$i AND volact.VA_ID=vol.Vol_ID;";
										$rts=mysqli_query($conn,$sql);
										$cnt=0;
										while($row=mysqli_fetch_array($rts)){
											if($row[0]!='root'){
												if($cnt==0){
													echo "<td>$i</td><td><span id='d1' class='underline' data-toggle='modal' data-target='#m_showData' onclick='passvalue_voldata(\"1\",)'>{$row[0]}</span></td>";
												}
												$cnt+=1;
												$day_arr=explode(',',$row[1]);
												echo "<td>";
												foreach ($day_arr as $key => $value) {
													switch ($value){
														case '':
															echo "None";break;
														case '1':
															echo "一 ";break;
														case '2':
															echo "二 ";break;
														case '3':
															echo "三 ";break;
														case '4':
															echo "四 ";break;
														case '5':
															echo "五 ";break;
														case '6':
															echo "六 ";break;
														case '7':
															echo "日 ";break;
													}
												}
												echo "</td>"; 												
											}
										}
										echo "</tr>";
									}
								?>
							</tbody>
						</table>
						<!--秀出志工資料的modal-->
						<div class="modal fade bd-example-modal-lg" id="m_showData" tabindex="-1" role="dialog" aria-labelledby="showdata" aria-hidden="true">
						  	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						    	<div class="modal-content">
						    		<div class="text-center">
										<?php 
											$sqlVol="SELECT * FROM vol WHERE Vol_ID = 1";
											$rtsVol=mysqli_query($conn,$sqlVol);
											while($rowVol=mysqli_fetch_array($rtsVol)){
												$acc=$rowVol['Vol_Email'];
										?>						    			
						    			<?php  echo "<br><h4 style='display:inline;padding-left:3rem;'><b>志工資料表－{$rowVol['Vol_Name']}</b></h4>"; ?>
								        <button type="button" class="close pt-1 pr-4" data-dismiss="modal" aria-label="Close" style="float:right;">
									        <span aria-hidden="true">&times;</span>
									    </button>						    			
						    		</div>
							      	<div class="modal-body text-center">
									<div class="container rounded bg-white p-3 m-2">
										<div class="row px-3">
											<table class="table table-striped table-responsive-lg mb-0" style="text-align: left;">
											    <tr>
											      <th scope="row">帳號</th>
											      <td>
											      	<?php echo "{$rowVol['Vol_Email']}"; ?>
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
										</div>
									</div>
							      	</div>
						    	</div>
							</div>
						</div>
					</div>	
				</div>
			</div>
			<div id="donmonedit" class="row px-4" style="display:none;">
				<div class="my-4 text-center justify-content-center align-items-center">
					<h4 class="text-center font-weight-bold">－捐款確認列表－</h4>
					<div class="row mt-4">
						<table class="table table-hover table-responsive-lg mx-2" style="text-align: center;">
						  <thead>
						    <tr>
						      <th scope="col" class="thinner2">項次</th>
						      <th scope="col" style="width:6rem;">捐款單位</th>
						      <th scope="col" style="width:5rem;">電子郵件</th>
						      <th scope="col" style="width:6rem;">捐款者地址</th>
						      <th scope="col" style="width:3rem;">電話</th>
						      <th scope="col" style="width:5rem;">匯款金額</th>
						      <th scope="col" style="width:6rem;">預計匯款日</th>
						      <th scope="col" style="width:5rem;">匯款帳戶</th>
						      <th scope="col" class="thinner2">統編</th>
						      <th scope="col" style="width:5rem;">備註</th>
						      <th style="width:5rem;"></th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php
						  		$sql="SELECT * FROM don";
					  			$rts = mysqli_query($conn,$sql);
					  			$cnt = 0;
					  			while($row=mysqli_fetch_array($rts)){
					  				$cnt+=1;
					  				$email=$row['Don_Email']==""?('－'):($row['Don_Email']);
					  				$addr=$row['Don_Address']==""?('－'):($row['Don_Address']);
					  				$edi=$row['Don_Editor']==""?('－'):($row['Don_Editor']);
					  				$rem=$row['Don_Remarks']==""?('－'):($row['Don_Remarks']);
					  				echo "<tr>
					  					<th>#$cnt</th>
					  					<td>{$row['Don_Name']}</td>
					  					<td class='limit2'>$email</td>
					  					<td class='limit2'>$addr</td>
					  					<td>{$row['Don_Tel']}</td>
					  					<td>{$row['Don_Money']}</td>
					  					<td>{$row['Don_Date']}</td>
					  					<td class='limit2'>{$row['Don_Account']}</td>
					  					<td class='limit2'>$edi</td>
					  					<td class='limit2'>$rem</td>
					  					<td><button class='btn btn-sm btn-outline-success' data-toggle='modal' data-target='#m_Don' onclick='passvalue_Dondata(\"{$row['Don_Name']}\",\"{$row['Don_Account']}\",\"{$row['Don_Tel']}\",\"{$row['Don_Money']}\",\"$email\",\"{$row['Don_Date']}\",\"$edi\",\"$addr\",\"$rem\")'>查看</button></td>
					  				</tr>";
					  			}
						  	?>
						  </tbody>
						</table>
						<!--秀出捐款單資料的modal-->
						<div class="modal fade bd-example-modal-lg" id="m_Don" tabindex="-1" role="dialog" aria-labelledby="showdata" aria-hidden="true">
						  	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						    	<div class="modal-content">
						    		<div class="text-center">	    			
						    			<br><h4 style='display:inline;padding-left:3rem;'><b id='b1'></b></h4>
								        <button type="button" class="close pt-1 pr-4" data-dismiss="modal" aria-label="Close" style="float:right;">
									        <span aria-hidden="true">&times;</span>
									    </button>						    			
						    		</div>
							      	<div class="modal-body text-center">
									<div class="container rounded bg-white p-3 m-2">
										<div class="row px-3">
											<table class="table table-striped table-responsive-lg mb-0" style="text-align: left;">
											    <tr>
											      <th scope="row">姓名</th>
											      <td id="d_name"></td>
											      <th scope="row">匯款帳戶</th>
											      <td id="d_acc"></td>
											    </tr>
											    <tr>
											      <th scope="row">連絡電話</th>
											      <td id="d_tel"></td>
											      <th scope="row">匯款金額</th>
											      <td id="d_money"></td>
											    </tr>
											    <tr>
											      <th scope="row">電子信箱</th>
											      <td id="d_email"></td>
											      <th scope="row">預計匯款日</th>
											      <td id="d_date"></td>
											    </tr>
											    <tr>
											      <th scope="row">統編</th>
											      <td id="d_edi"></td>
											      <th scope="row">捐款者地址</th>
											      <td id="d_addr"></td>				    	
											    </tr>
											    <tr>
											      <th scope="row">備註</th>
											      <td colspan="3" id="d_re"> </td>
											    </tr>
											</table>
										</div>
									</div>
							      	</div>
						    	</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="adoptedit" class="row px-4" style="display:block;">
				<div class="my-4 text-center justify-content-center align-items-center">
					<h4 class="text-center font-weight-bold">－領養意願列表－</h4>
					<div class="row mt-4">
						<table class="table table-hover table-responsive-lg mx-2" style="text-align: center;">
						  <thead>
						    <tr>
						      <th scope="col" class="thinner2">項次</th>
						      <th scope="col" style="width:6rem;">填寫人</th>
						      <th scope="col" class="thinner2">性別</th>
						      <th scope="col" style="width:6rem;">毛孩名</th>
						      <th scope="col" style="width:3rem;">電子郵件</th>
						      <th scope="col" style="width:6rem;">現居地址</th>
						      <th scope="col" class="thinner2">電話</th>
						      <th scope="col" style="width:5.5rem;">職業</th>
						      <th scope="col" style="width:6rem;">領養動機</th>						      
						      <th scope="col" style="width:5rem;">備註</th>
						      <th style="width:5rem;"></th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php
						  		$sql="SELECT * FROM ado";
					  			$rts = mysqli_query($conn,$sql);
					  			$cnt = 0;
					  			while($row=mysqli_fetch_array($rts)){
					  				$cnt+=1;
					  				echo "<tr>
					  					<th>#$cnt</th>
					  					<td>{$row['Ado_Name']}</td>
					  					<td class='limit2'>{$row['Ado_Sex']}</td>";
									$sql2="SELECT Pet_Name FROM pet WHERE Pet_ID='{$row['Pet_ID']}';";
					  				$rts2 = mysqli_query($conn,$sql2);
					  				while($row2=mysqli_fetch_array($rts2)){
					  					$pname=$row2[0];					  					
					  					echo "<td>$pname</td>";
					  				}
					  				$ado_rem=$row['Ado_Remarks']==""?('－'):($row['Ado_Remarks']);		  					
					  				echo "<td>{$row['Ado_Email']}</td>
					  					<td class='limit2'>{$row['Ado_Address']}</td>
					  					<td>{$row['Ado_Tel']}</td>
					  					<td>{$row['Ado_Work']}</td>
					  					<td class='limit2'>{$row['Ado_Mot']}</td>
					  					<td class='limit2'>$ado_rem</td>
					  					<td><button class='btn btn-sm btn-outline-success' data-toggle='modal' data-target='#m_Ado' onclick='passvalue_Adodata(\"{$row['Ado_Name']}\",\"{$row['Ado_Sex']}\",\"$pname\",\"{$row['Ado_Email']}\",\"{$row['Ado_Address']}\",\"{$row['Ado_Tel']}\",\"{$row['Ado_Work']}\",\"{$row['Ado_Mot']}\",\"$ado_rem\")'>查看</button></td>
					  				</tr>";
					  			}
						  	?>
						  </tbody>
						</table>
						<!--秀出領養人資料的modal-->
						<div class="modal fade bd-example-modal-lg" id="m_Ado" tabindex="-1" role="dialog" aria-labelledby="showadodata" aria-hidden="true">
						  	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						    	<div class="modal-content">
						    		<div class="text-center">	    			
						    			<br><h4 style='display:inline;padding-left:3rem;'><b id='b2'></b></h4>
								        <button type="button" class="close pt-1 pr-4" data-dismiss="modal" aria-label="Close" style="float:right;">
									        <span aria-hidden="true">&times;</span>
									    </button>						    			
						    		</div>
							      	<div class="modal-body text-center">
									<div class="container rounded bg-white p-3 m-2">
										<div class="row px-3">
											<table class="table table-striped table-responsive-lg mb-0" style="text-align: left;">
											    <tr>
											      <th scope="row">填寫人</th>
											      <td id="a_name"></td>
											      <th scope="row">毛孩名</th>
											      <td id="a_pname"></td>
											    </tr>
											    <tr>
											      <th scope="row">性別</th>
											      <td id="a_sex"></td>
											      <th scope="row">職業</th>
											      <td id="a_work"></td>
											    </tr>
											    <tr>
											      <th scope="row">連絡電話</th>
											      <td id="a_tel"></td>
											      <th scope="row">領養動機</th>
											      <td id="a_mov"></td>
											    </tr>
											    <tr>
											      <th scope="row">電子信箱</th>
											      <td id="a_email"></td>
											      <th scope="row">現居地址</th>
											      <td id="a_addr"></td>				    	
											    </tr>
											    <tr>
											      <th scope="row">備註</th>
											      <td colspan="3" id="a_re"> </td>
											    </tr>
											</table>
										</div>
									</div>
							      	</div>
						    	</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="touredit" class="row px-4" style="display: none;">
				<div class="my-4 text-center justify-content-center align-items-center">
					<h4 class="text-center font-weight-bold">－活動列表－</h4>
					<div class="row mt-4">
						<table class="table table-hover table-responsive-lg mx-2" style="text-align: center;">
						  <thead>
						    <tr>
						      <th scope="col" style="width:5rem;">編號</th>
						      <th scope="col" class="wider">活動名稱</th>
						      <th scope="col" class="wider">活動時間</th>
						      <th scope="col" style="width:6rem;">地點</th>
						      <th scope="col" style="width:18rem;">活動內容</th>
						      <th scope="col" style="width:6rem;">狀態</th>
						      <th scope="col" class="wider">報名截止</th>
						      <th scope="col" class="px-5"></th>
						      <th scope="col" class="px-5"></th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php
						  		$sql="SELECT * FROM news ORDER BY News_Date DESC";
					  			$rts = mysqli_query($conn,$sql);
					  			$cnt = 0;
					  			while($row=mysqli_fetch_array($rts)){
					  				$cnt+=1;
					  				$sql2="SELECT * FROM pic WHERE Pic_SourceID='{$row['News_ID']}'";
					  				$rts2 = mysqli_query($conn,$sql2);
					  				$pnum= mysqli_num_rows($rts2);
					  				$preg_word=preg_replace("/\r|\n/", "<br>", "{$row['News_Word']}");
					  				echo "<tr>
					  					<th>#$cnt</th>
					  					<td>{$row['News_Title']}</td>
					  					<td>2021-12-29 14:00~17:00</td>
					  					<td>狗場</td>
					  					<td class='limit'>$preg_word</td>
					  					<td>報名中</td>
					  					<td>2021-00-00 00:00</td>
					  					<td><button class='btn btn-sm btn-outline-success' data-toggle='modal' data-target='#m_edit' onclick='passvalue(\"$cnt\",\"{$row['News_ID']}\",\"{$row['News_Title']}\",\"$preg_word\")'>編輯</button></td>
					  					<td><button class='btn btn-sm btn-outline-danger' data-toggle='modal' data-target='#m_del' onclick='passvalue2(\"{$row['News_ID']}\",\"{$row['News_Title']}\")'>刪除</button></td>
					  				</tr>";
					  			}
						  	?>
						  </tbody>
						</table>
					</div>					
				</div>
			</div>
		</div>
	</div>
</div>

<!--以上是最新消息-->

<footer class="py-1">
	<div class="container-fluid">
		<div class="row text-center m-3">
			<div class="col-12 text-center">
				Copyright 2021 GouGouSuan Association. All rights reserved. Designed by AJTeam.
			</div>
		</div>
	</div>
</footer>
<!--以上是頁尾-->

</body>
</html>