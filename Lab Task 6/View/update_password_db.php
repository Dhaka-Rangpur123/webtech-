<?php

session_start();
$connection=mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,"library");
//session_start();
//include '../Model/conn.php';


$password="";


$query="select * from users where id = '$_SESSION[id]'";



$query_run=mysqli_query($connection,$query);


while ($row=mysqli_fetch_assoc($query_run)){

      $password=$row['password'];
}

if($password == $_POST['old_password']){

    $query="update  users set password = '$_POST[new_password]' where id ='$_SESSION[id]'";
}


?>

<script>

alert("Password Updated Successfully");

window.location.href="home.php";

</script>




