<!DOCTYPE html>
<html>
<head>
	<title>Thêm khoa</title>
</head>
<body>
		<h2>Thêm mới thông tin khoa</h2>
		<?php
	$conn = mysqli_connect("localhost","root","","qlkhoa");
	if(!$conn){
		die("Kết nối thất bại".mysql_connect_error());
	}
	//echo "kết nối thành công";
	?>

	<form method="post">
		<table>
			<tr>
				<td>Tên khoa</td>
				<td><input type="text" name="TenKhoa"></td>
			</tr>	

			<tr>
				<td>Ghi chú</td>
				<td><input type="text" name="GhiChu"></td>
			</tr>	

				<tr>
					<td><input type="submit" name="btnGhi" value="Thêm"></td>
				</tr>

		</table>
	</form>
	<a href="/Demo_ThemSuaXoa/indexKhoa.php">Về trang chủ</a>

		<?php

			if($_SERVER['REQUEST_METHOD']=='POST'&& $_POST["btnGhi"]){
				insertKhoa();
			}

		function insertKhoa(){
			$_TenKhoa = $_POST['TenKhoa'];
			$_GhiChu = $_POST['GhiChu'];

			$conn = mysqli_connect("localhost","root","","qlkhoa");
			if(!$conn)
			{
				die("Kết nối thất bại".mysql_connect_error());
			}

			$query = "INSERT INTO tblkhoa1(TenKhoa, GhiChu) values('".$_TenKhoa."','".$_GhiChu."')";
			$result= mysqli_query($conn,$query);
			if($result == true){
				echo "Ghi thành công";
			}
			else{
				echo "Thất bại";
			}
			mysqli_close($conn);
		}
		?>
</body>
</html>