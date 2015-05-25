<?php

require_once('book_sc_fns.php');
session_start();

  do_html_header("Supplies");
?>

<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src='jquery-1.11.0.min.js'></script>
<script>
$(document).ready(function(){
  $(document).on('submit', '#input', function(){
  //   alert($('#genreid').val());
     var genre = $('#genreid').val();
     var zone = $('#zoneid').val();
     var address = $('#addressid').val();
     var type = $('#typeid').val();
     //alert($("#zoneid option:selected").text());
     $.ajax({
  url: 'insert_supplies_table.php',
  data: { genre: genre, zone:zone, address:address, type:type},
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
  <b>Genre:</b>
<input type="text" name="genre" id="genreid">
  <br><b>Zone:</b>
<input type="text" name="zone" id="zoneid">
  <br><b>Address:</b>
<input type="text" name="address" id="addressid">
  <br><b>Type:</b>
<input type="text" name="type" id="typeid">
<br><input type="submit" value="Submit">
<div id='table'></br></br></div>
</form>
</body>
</html>

<?php
//  echo "<p>Showing all supplies in the database:</p>";

  // get categories out of database
//  $cat_array = get_supplies();

  // display as links to cat pages
//  display_supplies($cat_array);

  // if logged in as admin, show add, delete, edit cat links
  if(isset($_SESSION['admin_user'])) {
    display_button("admin.php", "admin-menu", "Admin Menu");
  }
  do_html_footer();
?>
