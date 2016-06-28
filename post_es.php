<?php
$data = json_decode(file_get_contents("php://input"));
//print_r($data);
if($data->operation == "insert"){
$usrname = $data->uname;
$upswd = $data->pswd;
$uemail =$data->email;
mysql_connect("localhost","root","root");
mysql_select_db("yourdatabasename");
$n=mysql_query("insert into login (uname,pass,email) values('".$usrname."','".$upswd."','".$uemail."')");
if($n == 1){
	$arr['msg']="Record Inserted";
	$arr['error']="";	
}
else
{
	$arr['msg']="";
	$arr['error']="Record not inserted";
}

echo json_encode($arr);
}
else if($data->operation == "disp"){
	
	mysql_connect("localhost","root","root");
	mysql_select_db("yourdatabasename");
	$res = mysql_query("select * from login");
	$outp = "";
	while($row = mysql_fetch_assoc($res)){
		 $arr[] = $row; 
	}	
	echo  json_encode($arr);

}
?>