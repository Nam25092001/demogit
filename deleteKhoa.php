<?php
	$_ID = $_GET["ID"];
	$conn = mysqli_connect("localhost","root","","qlkhoa");
	if(!$conn){
		die("Kết nối thất bại".mysql_connect_error());
	}

	$query = "DELETE FROM tblkhoa1 where ID ='".$_ID."'";
			$result= mysqli_query($conn,$query);
			if($result == true){
				echo "Xóa thành công";
			}
			else{
				echo "Thất bại";
			}
			mysqli_close($conn);
?>
	<br>
	<a href="/Demo_ThemSuaXoa/indexKhoa.php">Về trang chủ</a>
