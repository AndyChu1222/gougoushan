<?php 
include("dbcon.php");
ini_set('display_errors','off');

$sql="SELECT * FROM act";
$rts=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($rts)){
	$data[] = array(
		'title'	=>	$row["Act_Name"],
		'start'	=>	$row["Act_StartDT"],
		'end'	=>	$row["Act_EndDT"],
		'description'	=>	$row["Act_Content"],
		'location'	=>	$row["Act_Loc"],
		'icon'	=>	$row["Act_Icon"]
	);
}
echo json_encode($data);
?>