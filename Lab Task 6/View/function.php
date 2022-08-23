<?php

//include  '../Model/db_config.php';



function get_user_count(){

    $connection=mysqli_connect("localhost","root","");
    $db=mysqli_select_db($connection,"library");
    
    $user_count="";
  
    
    
    $query="Select count(*) as users_count from users";
    
    $query_run=mysqli_query($connection,$query);
    while ($row=mysqli_fetch_assoc($query_run)){
    
          $user_count=$row['users_count'];
        
    }

    return $user_count;

}






?>