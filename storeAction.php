  
<?php 
$name = $_POST['name']; 
$email = $_POST['email'];
$username = $_POST['username'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
if(empty($name) or empty($email) or empty($username) or empty($gender) or empty($dob)) {
    echo "Fill up the form properly";
}
else {
    $name = sanitize($name);
    $email = sanitize($email);
    $username = sanitize($username);
    $gender = sanitize($gender);
    $dob = sanitize($dob);



    $handle1 = fopen("data.json", "a");
    
      $arr1 = array( 'name' =>$name, 'email' =>$email, 'username' =>$username, 'gender' =>$gender,'dob' =>$dob);
      $encode = json_encode($arr1);

      $res = fwrite($handle1, $encode . "\n");

      if ($res) {
           echo "Successfully saved";
      }
      else {
           echo "Error while saving";
      }
 }

      function sanitize($data) {
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
      }
      $nameErr = $usernameErr= $emailErr= $passwordErr= $conpasswordErr = $DOBErr= $genderErr ="";
$name = $username= $email = $password= $conpassword = $DOB= $gender ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
     
  }
   else {
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
  if (empty($_POST["username"])) {
    $usernameErr = "username is required";
  } else {
    $username = $_POST["username"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
      $usernameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["password"])) {
    $passwordErr = "password is required";
  } else {
    $password = $_POST["password"];
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $passwordErr = "wrong password";
    }
  }
  if (empty($_POST["conpassword"])) {
    $conpasswordErr = "give your password ";
  } else {
    $conpassword = $_POST["conpassword"];
    // check if e-mail address is well-formed
    if (!filter_var($conpassword, FILTER_VALIDATE_EMAIL)) {
      $conpasswordErr = "check your password";
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
}
 
   
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
  <h1>Registration</h1>
  <form method = "POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <fieldset>
          <legend>NAME</legend>
            <input type="text" id="fname" name="name" required><hr><br><?php echo $name;?>
            <span class="error">* <?php echo $nameErr;?></span>
          <legend>EMAIL</legend>
            <input type="text" id="email" name="email"><hr><br><?php echo $email;?>
            <span class="error">* <?php echo $emailErr;?></span>
          <legend>username</legend>
            <input type="text" id="username" name="username"><hr><br><?php echo $username;?>
            <span class="error">* <?php echo $usernameErr;?></span>
          <legend>password</legend>
               <input type="password" id="pwd" name="password"><hr><br><?php echo $password;?>
               <span class="error">* <?php echo $passwordErr;?></span>
          <legend>Confirm password</legend>
               <input type="conpassword" id="pwd" name="conpassword"><hr><br><?php echo $conpassword;?>
               <span class="error">* <?php echo $conpasswordErr;?></span>
               
          <legend>GENDER</legend>
                
                <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
                <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
                <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
                <span class="error">* <?php echo $genderErr;?></span>
                <hr><br>
          <legend>DATE OF BIRTH</legend>
                <input type="date" id="DOB" name="DOB" required><hr><br><?php echo $DOB;?>
                <span class="error">* <?php echo  $DOBErr;?></span><br>
                <input type="submit" name="submit" value="Submit">
                <input type="Reset" name="Reset" value="Reset">

    </fieldset>

  </form>
</body>
</html>
   
