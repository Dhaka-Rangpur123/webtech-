
function read() {
    var read = "";
    $.ajax({
        method: "POST",
        url: "all_books_by_ajax_db.php",
        data: { read: read },
        success: function (data) {

            $("#tbody").html(data);
        }



    })



}

  $(".read ").click(function (){

    var book_name = $("#book_name").val();
    var author_name = $("#author_name").val();
    var purchase_date = $("#purchase_date").val();
    var book_price = $("#book_price").val();
    var book_qty = $("#book_qty").val();
    var available_qty = $("#available_qty").val();
    var book_image = $("#book_image").val();
  
   

    $.ajax({

        method: "POST",
        url: "all_books_by_ajax_db.php",
        data: { book_name: book_name, author_name:author_name, purchase_date:purchase_date, book_price:book_price,book_qty:book_qty,available_qty:available_qty,book_image:book_image},
        success: function () {
            read();
        }

    });




});


function Delete(id){

    $.ajax({
        url: "DeleteDeliveryman.php",
        method: "POST",
      
        data: { id: id },
        success: function () { 
        
            read()
            
        }



    })




}
