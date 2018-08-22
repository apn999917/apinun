<?php
require('./db/connect-db.php'); //เรียกใช้ไฟล์
$sql_office="select * from tbl_office ";
$query_office=mysqli_query($conn,$sql_office);
while($obj=mysql_fetch_array($query_office))
{
	echo $obj["office_name"]."<br>"; //
}

?>