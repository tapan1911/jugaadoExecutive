<?php

require_once('book_sc_fns.php');
session_start();

 do_html_header("Messages");

  //echo "<p>Showing all messages in the database:</p>";
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src='jquery-1.11.0.min.js'></script>
<script>
$(document).ready(function(){ 
 $(document).on('submit', '#input', function(){
     //alert($('#phnoid').val());
     var phno = $('#phnoid').val();
     //alert($("#zoneid option:selected").text());
     var status = $("#statusid option:selected").text(); 
     $.ajax({
	url: 'messages_table.php',
	data: { phno: phno, status:status},
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
<b>Phone No:</b><br>
<input type="text" name="phno" id="phnoid">
<p><b>Please choose message status:</b></p>
<select id='statusid'>
  <option value='OPEN'>OPEN</option>
  <option value='CLOSE'>CLOSE</option>
</select>
</br></br>
<input type="submit" value="Submit">
<div id='table'></br><b>Enter Phone No. and select message status to see the corresponding table</b></br></div>
</form>
</body>
</html>

<?php

  // get categories out of database
  //$cat_array = get_messages();

  // display as links to cat pages
  //display_messages($cat_array);
  // if logged in as admin, show add, delete, edit cat links
  if(isset($_SESSION['admin_user'])) {
    display_button("admin.php", "admin-menu", "Admin Menu");
  }
  do_html_footer();
?>
