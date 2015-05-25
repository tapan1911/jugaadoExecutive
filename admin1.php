<?php

// include function files for this application
require_once('book_sc_fns.php');
session_start();


if (($_POST['username']) && ($_POST['passwd'])) {
	// they have just tried logging in

    $username = $_POST['username'];
    $passwd = $_POST['passwd'];

    if (login($username, $passwd)) {
      // if they are in the database register the user id
      $_SESSION['admin_user'] = $username;

   } else {
      // unsuccessful login
      do_html_header("Problem:");
      echo "<p>You could not be logged in.<br/>
            You must be logged in to view this page.</p>";
      do_html_url('login.php', 'Login');
      do_html_footer();
      exit;
    }
}

do_html_header("Hi! Admin");
if (check_admin_user()) {
  //display_admin_menu();
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src='jquery-1.11.0.min.js'></script>
<script>
$(document).ready(function(){ 
 $("#message").click(function() {
 // alert( "Handler for .click() called." );
  $('.rightcolumn').load('messages.php');
  return false;
});
 $("#items").click(function() {
 // alert( "Handler for .click() called." );
  $('.rightcolumn').load('items.php');
  return false;
});
 $("#search").click(function() {
 // alert( "Handler for .click() called." );
  $('.rightcolumn').load('search.php');
  return false;
});
 $("#supplies").click(function() {
 // alert( "Handler for .click() called." );
  $('.rightcolumn').load('supplies.php');
  return false;
});
 $("#orders").click(function() {
 // alert( "Handler for .click() called." );
  $('.rightcolumn').load('orders.php');
  return false;
});
 $("#cancelorder").click(function() {
 // alert( "Handler for .click() called." );
  $('.rightcolumn').load('cancelOrder.php');
  return false;
});
});
</script>
<style>
div.leftcolumn
{
  float:left;
  height: 100%;
  width: 70px;  
  margin-left:1em;
  overflow-y:visible;
  padding-bottom:1px;
  border-right:solid #000000;
}  
div.rightcolumn{
  float:right;
  padding-right: 300px;
}
</style>
</head>
<body>
<div>
  <div class="rightcolumn"></div>
  <div class="leftcolumn">
    <a href="messages.php" id='message'>Messages</a><br />
    <a href="items.php" id ='items'>Items</a><br />
    <a href="search.php" id='search'>Search</a><br />
    <a href="supplies.php" id='supplies'>Supplies</a><br />
    <a href="orders.php" id='orders'>Orders</a><br />
  </div>
</div>
</body>
</html>
<?php 
} else {
  echo "<p>You are not authorized to enter the administration area.</p>";
}
//do_html_footer("YO");
?>
