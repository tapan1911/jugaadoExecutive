<?php
  include ('book_sc_fns.php');
  // The shopping cart needs sessions, so start one
  session_start();
  do_html_header("Cancel An Order");
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src='jquery-1.11.0.min.js'></script>
<script>
$(document).ready(function(){ 
 $(document).on('submit', '#input', function(){
    // alert($('#orderid').val());
     var orderid = $('#orderid').val();
     $.ajax({
	url: 'cancel_order_table.php',
	data: { orderid: orderid},
	type: "POST",
	}).done(function(response){
		$('#table').html(response);
	});
     return false;
 });
});
</script>
<body>
<form id="input" name="input"  method="post">
<b>Order Id:</b><br>
<input type="text" name="order" id="orderid">
<input type="submit" value="Submit">
<div id='table'></br></br></div>
</form>
</body>
</html>
<?php
  // get categories out of database
  //$cat_array = get_categories();

  // display as links to cat pages
  //display_categories($cat_array);

  // if logged in as admin, show add, delete, edit cat links
  if(isset($_SESSION['admin_user'])) {
    display_button("admin.php", "admin-menu", "Admin Menu");
  }
  do_html_footer();
?>
