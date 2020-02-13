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
class User {
  public $Name;
  public $Email;
  public $bday;
  public $gender;
  public $Degree;
  public $bg;

  function __construct($Name, $Email, $bday, $gender, $Degree, $bg) {
    $this->Name = $Name; 
    $this->Email = $Email;
    $this->bday = $bday; 
    $this->gender = $gender; 
    $this->Degree = $Degree; 
    $this->bg = $bg; 
  }
  function get_name() {
    return $this->Name;
  }
  function get_email() {
    return $this->Email;
  }
  function get_bday() {
    return $this->bday;
  }
  function get_gender() {
    return $this->gender;
  }
  function get_Degree() {
    return $this->Degree;
  }
  function get_bg() {
    return $this->bg;
  }
}

$apple = new User($Name, $Email, $bday, $gender, $Degree, $bg);
echo $apple->get_name();
echo "<br>";
echo $apple->get_email();
echo "<br>";
echo $apple->get_bday();
echo "<br>";
echo $apple->get_gender();
echo "<br>";
echo $apple->get_Degree();
echo "<br>";
echo $apple->get_bg();
?>
 
<?php

  $dom = new DOMDocument();

    $dom->encoding = 'utf-8';

    $dom->xmlVersion = '1.0';

    $dom->formatOutput = true;

  $xml_file_name = 'movies_list.xml';

    $root = $dom->createElement('Users');

    $movie_node = $dom->createElement('user');

    $attr_movie_id = new DOMAttr('user_id', '5467');

    $movie_node->setAttributeNode($attr_movie_id);

  $child_node_title = $dom->createElement('Name', $apple->get_name());

    $movie_node->appendChild($child_node_title);

    $child_node_year = $dom->createElement('Email', $apple->get_email());

    $movie_node->appendChild($child_node_year);

  $child_node_genre = $dom->createElement('Birthday', $apple->get_bday());

    $movie_node->appendChild($child_node_genre);

    $child_node_ratings = $dom->createElement('Gender', $apple->get_gender());

    

    $root->appendChild($movie_node);

    $dom->appendChild($root);

  $dom->save($xml_file_name);

  echo "$xml_file_name has been successfully created";
?>







<?php
$file = fopen("lab3-file.txt", "w") or die("Unable to open file!");
$Name;
$Email;
$bday;
$gender;
$Degree;
$bg;

fwrite($file, $Name); 
fwrite($file, $Email); 
fwrite($file, $bday);
fwrite($file, $gender);
fwrite($file, $Degree);
fwrite($file, $bg);



fclose($file);
?>

</body>
</html>
