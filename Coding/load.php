<?php 
include("dbcon.php");
ini_set('display_errors','off');

$sql="SELECT * FROM voljoin";
$rts=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($rts)){
	$data[] = array(
		'title'	=>	$row["VolJoin_Name"],
		'start'	=>	$row["VolJoin_StartDT"],
		'end'	=>	$row["VolJoin_EndDT"],
		'description'	=>	$row["VolJoin_Content"],
		'location'	=>	$row["VolJoin_Place"],
		'peoNum'	=>	$row["VolJoin_Num"],
		'icon'	=>	$row["VolJoin_Icon"],
		'vjid'  =>  $row["VolJoin_ID"]
	);
}
echo json_encode($data);
?>