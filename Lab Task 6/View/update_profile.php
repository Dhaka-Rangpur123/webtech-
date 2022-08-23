<?php
$connection=mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,"library");


$query="update users set username='$_POST[username]',email='$_POST[email]',mobile='$_POST[mobile]',address='$_POST[address]'";

$query_run=mysqli_query($connection,$query);

?>


<script type="text/javascript">

alert("Updated Successfully");

window.location.href="home.php";

</script>