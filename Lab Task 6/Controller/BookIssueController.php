<?php
require_once '../Model/db_config.php';

   
   $faculty_id="";
   $book_id="";
   $issue_date="";
 



 



  $err_db="";
  $hasError=false;


  if(isset($_POST["issue_book"]))
  {
    
        $faculty_id = $_POST["faculty_id"]; 
        $book_id = $_POST["book_id"]; 
        $issue_date= $_POST["issue_date"]; 
    

    
   

    

   

 
  




    
$rs = issueBook($_POST["faculty_id"],$_POST["book_id"],$_POST["issue_date"]);
    if($rs === true){
        header("Location: Book_Issue_History.php");
    }
    $err_db = $rs;

}






function issueBook($faculty_id,$book_id,$issue_date){
    $query="insert into issue_book  values (NULL,'$faculty_id','$book_id','$issue_date')";
    return execute($query);
}
function getBooks(){
    $query= "select * from library_books";
    $rs = get($query);
    return $rs;
}
function getProduct($id){
    $query="select * from employee_product where id=$id";
    $rs = get($query);
    return $rs[0];
}






function getReview(){
    $query="select * from review";
    $rs = get($query);
    return $rs;
}

function searchProduct($key){
    $query = "select p.id,p.product_name from employee_product p left join categories c on p.c_id=c.id where p.product_name like '%$key%' or c.name like '%$key%'";
    $rs = get($query);
    return $rs;
}

 ?>
