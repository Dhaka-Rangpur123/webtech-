<?php
require_once '../Model/db_config.php';

   $book_name="";
  $booknameErr="";


  $author_name="";
  $author_nameErr="";


  
  $book_purchase_date="";
  $purchase_dateErr="";

  $book_price="";
  $priceErr="";

 
  $book_qty="";
  $book_qtyErr="";

  
  $available_qty="";
  $available_qtyErr="";

  $book_image="";
  $book_imageErr="";

  $err_db="";
  $hasError=false;


  if(isset($_POST["add_book"]))
  {
    if(empty($_POST["book_name"])){
      $hasError=true;
      $booknameErr="&nbsp;&nbsp;*Book Name name Required";
    }

    else{
        $book_name = htmlspecialchars($_POST["book_name"]); 
    }

    if(empty($_POST["author_name"])){
        $hasError=true;
        $author_nameErr="&nbsp;&nbsp;*Author Name Required";
      }
  
      else
      {
        $author_name = $_POST["author_name"];
      }


    if(empty($_POST["purchase_date"]))
    {
      $hasError=true;
      $purchase_dateErr="&nbsp;&nbsp;*Purchase Date Required";
    }
    
    else
    {
      $book_purchase_date = htmlspecialchars($_POST["purchase_date"]);
    }

   

    if(empty($_POST["book_price"]))
    {
      $hasError=true;
      $priceErr="&nbsp;&nbsp;*Price Required";
    }
   
    else
    {
      $book_price = htmlspecialchars($_POST["book_price"]);
    }



    if(empty($_POST["book_qty"]))
    {
      $hasError=true;
      $book_qtyErr="&nbsp;&nbsp;*Book quantity Required";
    }
   
    else
    {
      $book_qty = htmlspecialchars($_POST["book_qty"]);
    }

    if(empty($_POST["available_qty"]))
    {
      $hasError=true;
      $available_qtyErr="&nbsp;&nbsp;*Available quantity Required";
    }
   
    else
    {
      $available_qty = htmlspecialchars($_POST["available_qty"]);
    }

 
    if($_FILES["book_image"]["name"]==""){
      // echo "string";
       $hasError=true;
       $book_imageErr="&nbsp;&nbsp;*Image Required";
     }
 
 
 
 
 else{
     //doo validations
     //if no error
     
     /*$name = basename($_FILES["p_image"]["name"]);
     $ext = strtolower(pathinfo($name,PATHINFO_EXTENSION));
     $myfilename=uniqid().".$ext";
     $target = "storage/product_images/$myfilename";
     $tmp_path = $_FILES["p_image"]["tmp_name"];
     move_uploaded_file($tmp_path,$target);*/
     
     $fileType = strtolower(pathinfo(basename($_FILES["book_image"]["name"]),PATHINFO_EXTENSION));
     $target = "../storage/book_images/".uniqid().".$fileType";
     move_uploaded_file($_FILES["book_image"]["tmp_name"],$target);
 }
   



if(!$hasError){
    
$rs = insertBook($_POST["book_name"],$_POST["author_name"],$_POST["purchase_date"],$_POST["book_price"],$_POST["book_qty"],$_POST["available_qty"],$target);
    if($rs === true){
        header("Location: All_Books.php");
    }
    $err_db = $rs;

}
}





function insertBook($book_name,$author_name,$book_purchase_date,$book_price,$book_qty,$available_qty,$book_image){
    $query="insert into library_books  values (NULL,'$book_name','$author_name','$book_purchase_date','$book_price','$book_qty','$available_qty','$book_image')";
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
