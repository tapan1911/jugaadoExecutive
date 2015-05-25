<?php
require_once('book_sc_fns.php');
session_start();

  do_html_header("Orders");
  //echo "<br><a href=\"insert_order_form.php\"><h2><b>Insert Order</b></h2></a><br>";
  //echo "<p><b>Choose from the dropdown the orders you want to see:</b></p>";
  //$value_dropdown = do_html_dropdown('new','open','close');
  // get orders out of database
  //$selected_value = $_POST['option'];
  //header("Content-Type: application/json", true);
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src='jquery-1.11.0.min.js'></script>
<script>
$(document).ready(function(){
  $(document).on('submit', '#input', function(){
    // alert($('#itemid').val());
     var item = $('#itemid').val();
     var zone = $('#zoneid').val();
     var address = $('#addressid').val();
     var phone = $('#phoneid').val();
     
     //alert($("#zoneid option:selected").text());
     $.ajax({
  url: 'insert_order_table.php',
  data: { item: item, zone:zone, address:address, phone:phone},
  type: "POST",
  }).done(function(response){
    $('#table').html(response);
  });
     return false;
 }); 
  $('#statusid').change(function(){ 
     var statusChosen = $("#statusid option:selected").text();
     $.ajax({
       type: "POST",
       url: "orders_table.php",
       data: { status: statusChosen},
     }).done(function(response){
	     $('#table').html(response);
	     });  
 });
});
</script>
</head>
<body>
<form id="input" name="input"  method="post"> 
  <b>Item:</b>
<input type="text" name="item" id="itemid">
  <br><b>Zone:</b>
<input type="text" name="zone" id="zoneid">
  <br><b>Address:</b>
<input type="text" name="address" id="addressid">
  <br><b>Phone:</b>
<input type="text" name="phone" id="phoneid">
<br><input type="submit" value="Submit">
</form>
<select id='statusid'>
  <option value='NEW'>NEW</option>
  <option value='OPEN'>OPEN</option>
  <option value='CLOSE'>CLOSE</option>
</select>

<div id='table'></br><b></b></br></div>
</body>
</html>
<?php
//if(isset($_POST["name"]))
//{
  //  echo $_POST["name"];
    //header('HTTP/1.1 200 OK');
//}
//else
//{
 //   echo "ERROR";
    //header('HTTP/1.1 500 Internal Server Error');
//}
  //echo "<br></br>";
  //$cat_array = get_orders($value_dropdown);

  // display as links to cat pages
  //display_orders($cat_array);

  // if logged in as admin, show add, delete, edit cat links
  if(isset($_SESSION['admin_user'])) {
    display_button("admin.php", "admin-menu", "Admin Menu");
  }
  do_html_footer();
?>
