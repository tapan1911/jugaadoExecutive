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
<style>
div.leftcolumn
{
  height: 100%;
  width: 100px;  
  margin-left:1em;
  overflow-y:visible;
  padding-bottom:1px;
  border-right:solid #000000;
}  
div.rightcolumn
{
  padding:200px 0 0 ;
  height: 100%;
  width: 500px;
  text-align: right;
}
</style>
</head>
<body>
<div>
  <div class="leftcolumn">
    <a href="messages.php">Messages</a><br />
    <a href="items.php">Items</a><br />
    <a href="search.php">Search</a><br />
    <a href="supplies.php">Supplies</a><br />
    <a href="orders.php">Orders</a><br />
    <a href="cancelOrder.php">Cancel Order</a></br>
  </div>
  <div class="right column">
    <p>
      wassup
    </p>
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
