<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr= $DOBErr= $genderErr = $DEGREEErr= $DEGREEErr1="";
$name = $email = $DOB= $gender = $DEGREE= $DEGREE1= $BLOOD="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = $_POST["name"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = $_POST["email"];
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  if (empty($_POST["DOB"])) {
    $DOBErr = "DOB is required";
} else {
    $DOB = $_POST["DOB"];
    // check if e-mail address is well-formed
    if (!filter_var($DOB, FILTER_VALIDATE_EMAIL)) {
        $DOBErr = "";
    }
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = $_POST["gender"];
  }
  
  if (empty($_POST["DEGREE"])) {
    $DEGREEErr = " DEGREE is required";
} else {
    $DEGREE = $_POST["DEGREE"];
    // check if e-mail address is well-formed
    if (!filter_var( $DEGREE, FILTER_VALIDATE_EMAIL)) {
        $DEGREEErr = "";
    }

}
if (empty($_POST["DEGREE1"])) {
    $DEGREEErr1 = " DEGREE is required";
} else {
    $DEGREE1 = $_POST["DEGREE1"];
    // check if e-mail address is well-formed
    if (!filter_var( $DEGREE1, FILTER_VALIDATE_EMAIL)) {
        $DEGREEErr1 = "";
    }

}
if (empty($_POST["BLOOD"])) {
    $BLOOD = "";
  } else {
    $BLOOD = $_POST["BLOOD"];
  }


}


?>

<h2>PHP Form Validation Task</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
<fieldset>
    <legend>NAME</legend>
    <input type="text" id="fname" name="name" required><hr><br>
</fieldset><?php echo $name;?>
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
<fieldset>
    <legend>EMAIL</legend>
    <input type="text" id="email" name="email"><hr><br>
</fieldset><?php echo $email;?>
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  <fieldset>
    <legend>DATE OF BIRTH</legend>
    <input type="date" id="DOB" name="DOB" required><hr><br>
 </fieldset><?php echo $DOB;?>
 <span class="error">* <?php echo  $DOBErr;?></span>
 <br><br>
 <fieldset>
    <legend>GENDER</legend>
                
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
    <span class="error">* <?php echo $genderErr;?></span>
    <hr><br>
</fieldset>
<fieldset>
    <legend>DEGREE</legend>
    <input type="checkbox" id="ssc" name="DEGREE"<?php if (isset($DEGREE) && $DEGREE=="ssc") echo "checked";?> value="ssc">SSC
    <input type="checkbox" id="hsc" name="DEGREE1"<?php if (isset($DEGREE) && $DEGREE=="hsc") echo "checked";?> value="hsc">HSC
    <input type="checkbox" id="bsc" name="DEGREE"<?php if (isset($DEGREE) && $DEGREE=="bsc") echo "checked";?> value="bsc">BSc
    <input type="checkbox" id="msc" name="DEGREE"<?php if (isset($DEGREE) && $DEGREE=="msc") echo "checked";?> value="msc">MSc
    <span class="error">* <?php echo $DEGREEErr;?></span>
    <hr><br>
</fieldset>
<fieldset>
    <legend>BLOOD GROUP</legend>
    <select name="BLOOD">
			<option value="NULL">Select the Blood Group </option>
			<option value="A+">A+</option>
			<option value="A-">A-</option>
			<option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
		</select>
        <hr><br>
        <input type="submit" name="submit" value="Submit">
</fieldset>

</form>
<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $DOB;
echo "<br>";
echo $gender;
echo "<br>";
echo $DEGREE;
echo $DEGREE1;
echo "<br>";
echo $BLOOD;
?>

</body>
</html>