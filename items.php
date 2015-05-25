<?php

require_once('book_sc_fns.php');
session_start();

 do_html_header("Items");
?>
 
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src='jquery-1.11.0.min.js'></script>
<script>
$(document).ready(function(){
  $(document).on('submit', '#input', function(){
    // alert($('#supplierid').val());
     var supplier = $('#supplierid').val();
     var name = $('#nameid').val();
     var brand = $('#brandid').val();
     var quantity = $('#quantityid').val();
     var price = $('#priceid').val();
     var genre = $('#genreid').val();
     var type = $('#typeid').val();
     var rarity = $('#rarityid').val();
     //alert($("#zoneid option:selected").text());
     $.ajax({
  url: 'insert_item_table.php',
  data: { supplier: supplier, name:name, brand:brand, quantity:quantity, price:price, genre:genre, type:type, rarity:rarity},
  type: "POST",
  }).done(function(response){
    $('#table').html(response);
  });
  return false;
 });
});
</script>
</head>
<body>
<form id="input" name="input"  method="post"> 
  <b>Supply Id:</b>
<input type="text" name="supplier" id="supplierid">
  <br><b>Name:</b>
<input type="text" name="name" id="nameid">
  <br><b>Brand:</b>
<input type="text" name="brand" id="brandid">
  <br><b>Quantity:</b>
<input type="text" name="quantity" id="quantityid">
  <br><b>Price:</b>
<input type="text" name="price" id="priceid">
  <br><b>Genre:</b>
<input type="text" name="genre" id="genreid">
  <br><b>Type:</b>
<input type="text" name="type" id="typeid">
  <br><b>Rarity:</b>
<input type="text" name="rarity" id="rarityid">
<br><input type="submit" value="Submit">
<div id='table'></br></br></div>
</form>
</body>
</html>
<?php
// echo "<p>Showing all items in the database:</p>";

  // get categories out of database
 // $cat_array = get_items();

  // display as links to cat pages
 // display_items($cat_array);

  // if logged in as admin, show add, delete, edit cat links
  if(isset($_SESSION['admin_user'])) {
    display_button("admin.php", "admin-menu", "Admin Menu");
  }
  do_html_footer();
?>