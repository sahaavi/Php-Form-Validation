<!DOCTYPE html>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
<title>Registration</title>
</head>
<body>

	<?php
// define variables and set to empty values
$NameErr = $EmailErr = $genderErr = $bdayErr = $DegreeErr = $bgErr = "";
$Name = $Email = $bday =$gender = $Degree = $bg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["Name"])) {
    $NameErr = "Name is required";
  } else {
    $Name = test_input($_POST["Name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$Name)) {
      $NameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["Email"])) {
    $EmailErr = "Email is required";
  } else {
    $Email = test_input($_POST["Email"]);
    // check if e-mail address is well-formed
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
      $EmailErr = "Invalid email format";
    }
  }
    

  
  if (empty($_POST["bday"])) {
    $bdayErr = "Birthday is required";
  } else {
    $bday = test_input($_POST["bday"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
  
  if (empty($_POST["Degree"])) {
    $DegreeErr = "Degree is required";
  } else {
    $Degree = test_input($_POST["Degree"]);
  }
  
  if ($_POST["bg"]=="null") {
    $bgErr = "Blood Group is required";
  } else {
    $bg = test_input($_POST["bg"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>



	<form method="post" action="<?php echo htmlspecialchars ($_SERVER["PHP_SELF"]); ?>" >
		Name <input type="text" name="Name" value="<?php echo $Name;?>">
  <span class="error">* <?php echo $NameErr;?></span> <br>
		Email <input type="text" name="Email" value="<?php echo $Email;?>">
  <span class="error">* <?php echo $EmailErr;?></span><br>
		Date Of Birth <input type="date" name="bday" value="<?php echo $bday;?>">
  <span class="error">* <?php echo $bdayErr;?></span><br>
		Gender  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  			    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  			    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other 
				<span class="error">* <?php echo $genderErr;?></span>
				<br>
  		Degree  <input type="checkbox" name="Degree" <?php if (isset($Degree) && $Degree=="SSC") echo "checked";?> value="SSC">SSC 
  				<input type="checkbox" name="Degree" <?php if (isset($Degree) && $Degree=="HSC") echo "checked";?> value="HSC">HSC 
  				<input type="checkbox" name="Degree" <?php if (isset($Degree) && $Degree=="BSc") echo "checked";?> value="BSc">BSc
  				<input type="checkbox" name="Degree" <?php if (isset($Degree) && $Degree=="MSc") echo "checked";?> value="MSc">MSc 
				<span class="error">* <?php echo $DegreeErr;?></span>
				<br>
  		Blood Group <br>
			    <select name="bg">
				<option <?php if (isset($bg) && $bg=="null") echo "selected";?> value="null">-</option>
			    <option <?php if (isset($bg) && $bg=="A+") echo "selected";?> value="A+">A+</option>
				<option <?php if (isset($bg) && $bg=="A-") echo "selected";?> value="A-">A-</option>
				<option <?php if (isset($bg) && $bg=="AB+") echo "selected";?> value="AB+">AB+</option>
				<option <?php if (isset($bg) && $bg=="AB-") echo "selected";?> value="AB-">AB-</option>
				<option <?php if (isset($bg) && $bg=="B+") echo "selected";?> value="B+">B+</option>
				<option <?php if (isset($bg) && $bg=="B-") echo "selected";?> value="B-">B-</option>
				<option <?php if (isset($bg) && $bg=="O+") echo "selected";?> value="O+">O+</option>
				<option <?php if (isset($bg) && $bg=="O-") echo "selected";?> value="O-">O-</option>
				</select> 
				<span class="error">* <?php echo $bgErr;?></span>
				<br><br>
		<input type="submit" value="Submit"> <br>
	</form>

	<?php
		echo "<h2>Your Input:</h2>";
		echo $Name;
		echo "<br>";
		echo $Email;
		echo "<br>";
		echo $bday;
		echo "<br>";
		echo $gender;
		echo "<br>";
		echo $Degree;
		echo "<br>";
		echo $bg;
	?>
</body>
</html>
