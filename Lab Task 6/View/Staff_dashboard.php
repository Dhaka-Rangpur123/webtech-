<?php
include 'home.php';
include 'function.php';

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>


.search{

  padding: 20px 8px;
}

input[type=text], select {
  width: 15%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}


</style>
<script src="../JS/main.js"></script>
</head>
<body>

<div class="search">

<form action="ajax_search.php" method="post">
<label>Search for Books</label>
<input type="text"  class="search" name="search" placeholder="Search Here" >

</form>

<div class="success"></div>

</div>



<script>

$('document').ready(function(){

$('.search').keyup(function(){

var search=$(this).val();
$.post($('form').attr('action'),

{'search':search},

function(data){

$('.success').html(data);
}



)


})

})

</script>


</body>
</html> 

