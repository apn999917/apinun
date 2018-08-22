<?php
require('./db/connect-db.php'); //เรียกใช้ไฟล์
$sql_office="select * from tbl_office where office_name like '%เชียง%'";
$query_office=mysqli_query($conn,$sql_office);
while($obj=mysqli_fetch_array($query_office))
{
	echo "รหัสการไฟฟ้า".$obj["office"]."  "."ชื่อการไฟฟ้า".$obj["office_name"]."<br>"; //
}

?>