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
$NameErr = $EmailErr = $genderErr = $DegreeErr = $bgErr = "";
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
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
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
		Name <input type="text" name="Name" required><br>
		Email <input type="text" name="Email" required><br>
		Date Of Birth <input type="date" name="bday"><br>
		Gender  <input type="radio" name="gender" value="male">Male
  			    <input type="radio" name="gender" value="female">Female
  			    <input type="radio" name="gender" value="other">Other <br>
  		Degree  <input type="checkbox" name="Degree" value="SSC">SSC 
  				<input type="checkbox" name="Degree" value="HSC">HSC 
  				<input type="checkbox" name="Degree" value="BSc">BSc
  				<input type="checkbox" name="Degree" value="MSc">MSc <br>
  		Blood Group <br>
			    <select name="bg">
			    <option value="A+">A+</option>
				<option value="A-">A-</option>
				<option value="AB+">AB+</option>
				<option value="AB-">AB-</option>
				<option value="B+">B+</option>
				<option value="B-">B-</option>
				<option value="O+">O+</option>
				<option value="O-">O-</option>
				</select> <br><br>
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
