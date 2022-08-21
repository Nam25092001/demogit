<!DOCTYPE html>
<html>
<head>
	<title>Sửa thông tin khoa</title>
</head>
<body>
	<h2>Sửa thông tin khoa</h2>
		<?php
		$_ID = $_GET["ID"];
		$conn = mysqli_connect("localhost","root","","qlkhoa");
	if(!$conn){
		die("Kết nối thất bại".mysql_connect_error());
	}

		$query="SELECT * from tblkhoa1 where ID ='".$_ID."'";
			$result= mysqli_query($conn, $query);

			if(mysqli_num_rows($result)){
		
				while ($row= mysqli_fetch_assoc($result)) {
				$TenKhoa = $row["TenKhoa"];
				$GhiChu = $row["GhiChu"];
			}
		}
		?>
	<form method="post">
		
		<table>
			<tr>
				<td>Tên khoa</td>
				<td><input type="text" name="TenKhoa" value=" <?php echo $TenKhoa ?>"></td>
			</tr>	

			<tr>
				<td>Ghi chú</td>
				<td><input type="text" name="GhiChu" value=" <?php echo $GhiChu ?>" ></td>
			</tr>	

				<tr>
					<td><input type="submit" name="btnSua" value="Sửa"></td>
				</tr>

		</table>

	</form>

		<?php 
		if($_SERVER['REQUEST_METHOD']=='POST'&& $_POST["btnSua"]){
				updateKhoa();
			}

		function updateKhoa(){
			$_ID = $_GET["ID"];
			$_TenKhoa = $_POST['TenKhoa'];
			$_GhiChu = $_POST['GhiChu'];

			$conn = mysqli_connect("localhost","root","","qlkhoa");
			if(!$conn)
			{
				die("Kết nối thất bại".mysql_connect_error());
			}

			$query = "UPDATE tblkhoa1 set TenKhoa='".$_TenKhoa."',GhiChu = '".$_GhiChu."' WHERE ID='".$_ID."'";
			$result= mysqli_query($conn,$query);
			if($result == true){
				echo "Cập nhật dữ liệu thành công";
			}
			else{
				echo "Thất bại";
			}
			mysqli_close($conn);
		}

		?>
	<a href="/Demo_ThemSuaXoa/indexKhoa.php">Về trang chủ</a>
</body>
</html>