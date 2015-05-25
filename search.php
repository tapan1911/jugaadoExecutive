<?php
  include ('book_sc_fns.php');
  // The shopping cart needs sessions, so start one
  session_start();
  do_html_header("Search for Items/Supplies");
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src='jquery-1.11.0.min.js'></script>
<script>
$(document).ready(function(){ 
 $(document).on('submit', '#input', function(){
     //alert($('#itemid').val());
     var item = $('#itemid').val();
     //alert($("#zoneid option:selected").text());
     var zoneChosen = $("#zoneid option:selected").text(); 
     $.ajax({
	url: 'search_table.php',
	data: { item: item, zone:zoneChosen},
	type: "POST",
	}).done(function(response){
		$('#table').html(response);
	});
     return false;
 });
});
</script>
<body>
<p><b>Please choose a zone:</b></p>
<form id="input" name="input"  method="post">
<select id='zoneid'>
  <option value='Zone1'>Zone1</option>
  <option value='Zone2'>Zone2</option>
  <option value='Zone3'>Zone3</option>
  <option value='Zone4'>Zone4</option>
</select>
</br></br>
<b>Item:</b><br>
<input type="text" name="item" id="itemid">
<input type="submit" value="Submit">
<div id='table'></br><b>Select Zone and input Item to see the corresponding table</b></br></div>
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
