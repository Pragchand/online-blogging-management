<?php 
	require_once("serverside_validation.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Client & Server Side Validation</title>
	<style type="text/css">
		span{
			color: red;
		}
	</style>
	<script type="text/javascript" src="clientside_validation.js"></script>
</head>
<body>
	<center>
	<h1>Client Side Validation</h1>
	<hr/>
	<fieldset width="700px">
		<legend>Register Now</legend>
		<h3>Note: Required Fields Are Marked With (*)</h3>
		<form method="POST" action="" onsubmit="return validateForm()">
			<table border="0" cellpadding="5">
				<tr>
					<td>
						<label>First Name: <span>*</span></label>
					</td>
					<td>
						<input id="first_name" type="text" name="first_name" value="<?= $first_name??""; ?>" />
						<span id="first_name_msg"><?=  $first_name_msg??"";  ?></span>
					</td>
				</tr>
				<tr>
					<td>
						<label>Last Name:</label>
					</td>
					<td>
						<input id="last_name" type="text" name="last_name" value="<?= $last_name??""; ?>" />
						<span id="last_name_msg"><?=  $last_name_msg??"";  ?></span>
					</td>
				</tr>
				<tr>
					<td>
						<label>Email: <span>*</span></label>
					</td>
					<td>
						<input id="email" type="email" name="email" value="<?= $email??""; ?>" />
						<span id="email_msg"><?=  $email_msg??"";  ?></span>
					</td>
				</tr>
				<tr>
					<td>
						<label>Phone Number: <span>*</span></label>
					</td>
					<td>
						<input id="phone_number" type="text" name="phone_number" value="<?= $phone_number??""; ?>" />
						<span id="phone_number_msg"><?=  $phone_number_msg??"";  ?></span>
					</td>
				</tr>
				<tr>
					<td>
						<label>CNIC: <span>*</span></label>
					</td>
					<td>
						<input id="cnic" type="text" name="cnic" value="<?=  $cnic??"";  ?>" />
						<span id="cnic_msg"><?=  $cnic_msg??"";  ?></span>
					</td>
				</tr>
				<tr>
					<td>
						<label>Country: <span>*</span></label>
					</td>
					<td>
						<select id="country" name="country">
							<option value="">--Select Country--</option>
							<option value="PAK" <?= (isset($country) && $country == "PAK")?'selected':'';  ?> >PAK</option>
							<option value="AUS" <?= (isset($country) && $country == "AUS")?'selected':'';  ?>>AUS</option>
							<option value="USA" <?= (isset($country) && $country == "USA")?'selected':'';  ?>   >USA</option>
						</select>
						<span id="country_msg"><?=  $country_msg??"";  ?></span>
					</td>
				</tr>
				<tr>
					<td>
						<label>Gender: <span>*</span></label>
					</td>
					<td>
						<input type="radio" name="gender" value="Male" <?= (isset($gender) && $gender == "Male")?'checked':'';  ?> /> Male
						<input type="radio" name="gender" value="Female" <?= (isset($gender) && $gender == "Female")?'checked':'';  ?> /> Female
						<span id="gender_msg"><?=  $gender_msg??"";  ?></span>
					</td>
				</tr>
				<tr>
					<td>
						<label>Policies: <span>*</span></label>
					</td>
					<td>
						<input class="policies" type="checkbox" name="policies[]" value="Attendance">
						Attendance
						<br/>
						<input class="policies" type="checkbox" name="policies[]" value="Assignment">
						Assignment
						<br/>
						<input class="policies" type="checkbox" name="policies[]" value="Test">
						Test
						<br/>
						<input class="policies" type="checkbox" name="policies[]" value="Stipend">
						Stipend
						<br/>
						<span id="policies_msg"><?=  $policies_msg??"";  ?></span>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input type="submit" name="submit" value="Register" />
						<input type="reset" name="cancel" value="Cancel" />
					</td>
				</tr>
			</table>
		</form>
	</fieldset>
	</center>
</body>
</html>