<?php
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";

	//khai bao biến lỗi và thành công
	$error = '';
	$result = '';

	//kiểm tra xem user đã submit form hay chưa
	if(isset($_POST['submit']))
	{
		//gán dữ liệu từ mảng $_POST cho các biến
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$url = $_POST['url'];
		$message = $_POST['message'];

		//Validate dữ liệu
		if(empty($name) || empty($email) || empty($phone) || empty($url) || empty($message))
		{
			$error = 'Tất cả các trường không được để trống';
		}
		else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error = 'Trường email phải có định dạng email';
		}
		else if (!is_numeric($phone)) {
			$error = 'Trường phone number chỉ được nhập số';
		}
		else if(!preg_match("/^(?:(?:https):\/\/)[-a-z0-9+&@#\/%?=~_|!:,.;]*$/", $url))
			$error = 'url cần phải đúng định dạng';

	}

	if(empty($error))
	{
			$result .= " you given details are as: <br />";
			$result .= "Name: $name <br />";
			$result .= "Email: $email <br />";
			$result .= "phone: $phone <br />";
			$result .= "website: $url <br />";
			$result .= "message: $message <br />";
	}


 ?>
<h3 style="color: red;">
	<?php echo $error; ?>
</h3>
<h3 style="color: green;">
	<?php echo $result ?>
</h3>
<form action="" method="post" >
	<table style="margin: auto;">
		<tr>
			<td><input type="text" name="name" placeholder="your name" style="width: 200px;" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>"></td>
		</tr>
		<tr>
			<td>
				<input type="text" name="email" placeholder="your email address" style="width: 200px;" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
			</td>
		</tr>
		<tr>
			<td>
				<input type="int" name="phone" placeholder="your phone number" style="width: 200px;" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : '' ?>">
			</td>
		</tr>
		<tr>
			<td>
				<input type="text" name="url" placeholder="your website starts with http://" style="width: 200px;" value="<?php echo isset($_POST['url']) ? $_POST['url'] : '' ?>" >
			</td>
		</tr>
		<tr>
			<td>
				<textarea name="message" style="width: 200px;"><?php echo isset($_POST['message']) ? $_POST['message'] : '' ?></textarea>
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="submit"  value="submit" style="background-color: red; font-weight: bold; color: white;width: 200px;">
			</td>
		</tr>
	</table>	
</form>