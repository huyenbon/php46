<?php 
	echo "<pre>";
	print_r($_GET);
	echo "</pre>";

	$error = '';
	$result = '';

	if(isset($_GET['btnsubmit'])){
		$soa = $_GET['soa'];
		$sob = $_GET['sob'];

		if(empty($soa) || empty($sob))
			$error = 'Không được bỏ trống các trường';
		else if(!is_numeric($soa) || !is_numeric($sob))
			$error ='Số a hoặc b phải là số';

		if($_GET['btnsubmit'] == 'a+b')
		{ 
			$tinh = $soa +$sob;
			$result .= "a + b = $tinh";
		}
		else if($_GET['btnsubmit'] == 'a-b')
		{ 
			$tinh = $soa - $sob;
			$result .= "a - b = $tinh";
		}
		else if($_GET['btnsubmit'] == 'a*b')
		{ 
			$tinh = $soa * $sob;
			$result .= "a * b = $tinh";
		}
		else if($_GET['btnsubmit'] == 'a/b')
		{ 
			$tinh = $soa / $sob;
			$result .= "a / b = $tinh";
		}

	}
 ?>

 <h3>
 	<?php echo $result; ?>
 </h3>
<form action="" method="get">
	<table>
		<tr>
			<td>Nhập số a: </td>
			<td>
				<input type="text" name="soa">
			</td>
		</tr>
		<tr>
			<td>Nhập số b: </td>
			<td>
				<input type="text" name="sob">
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="btnsubmit" value="a+b" style="background-color: green;">
			</td>
			<td>
				<input type="submit" name="btnsubmit" value="a-b" style="background-color: blue;">
			</td>
			<td>
				<input type="submit" name="btnsubmit" value="a*b" style="background-color: pink;">
			</td>
			<td>
				<input type="submit" name="btnsubmit" value="a/b" style="background-color: yellow;">
			</td>
		</tr>
	</table>
</form>