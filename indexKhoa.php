<!DOCTYPE html>
<html>
<head>
	<title>Danh sách khoa</title>
	<meta charset="utf-8">
	<style type="text/css">
		table{
		border: 1px solid black;
		border-collapse: collapse; 
		border-spacing: 10px;

	}
	th, td{
		padding: 8px;
	}
	</style>
</head>
<body>
	<h2>Danh sách khoa</h2>
	<?php
	$conn = mysqli_connect("localhost","root","","qlkhoa");
	if(!$conn){
		die("Kết nối thất bại".mysql_connect_error());
	}
	//echo "kết nối thành công";
	?>
	<table border="1">
		<thead>
			<tr>
				<td>ID</td>
				<td>Tên khoa</td>
				<td>Ghi chú</td>
				<td>Thao tác</td>
			</tr>
		</thead>

		<tbody>
			<?php
			$query="SELECT * from tblkhoa1";
			$result= mysqli_query($conn, $query);

			if(mysqli_num_rows($result)){
				while ($row= mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$row["ID"]."</td>";
					echo "<td>".$row["TenKhoa"]."</td>";
					echo "<td>".$row["GhiChu"]."</td>";
					echo "<td>".
					"<a href='/Demo_ThemSuaXoa/updateKhoa.php?ID=".$row["ID"]."'>Sửa</a>".
					"<a href='/Demo_ThemSuaXoa/deleteKhoa.php?ID=".$row["ID"]."'>Xóa</a>"
					
					."<td>";
					echo "</tr>";
				}
			}
			?>
		</tbody>
	</table>
	<a href="/Demo_ThemSuaXoa/insertKhoa.php">Thêm</a>
</body>
</html>