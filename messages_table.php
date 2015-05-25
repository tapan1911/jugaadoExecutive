<?php
	require_once('book_sc_fns.php');
	session_start();
	$html = "</br></br>";
	$status = $_POST['status'];	
	$phno = $_POST['phno'];
	$html.= $status;
	$html.= $phno;		
	$conn = db_connect();
	  	
	$query = "select * from `MESSAGE` where STATUS='$status' and FROM_NUMBER='$phno'";
	$result = @$conn->query($query);
	if (!$result) {
	   $cat_array =  false;
	}
	$num_cats = @$result->num_rows;
	if ($num_cats == 0) {
	   $cat_array =  false;
	}
	$result = db_result_to_array($result);
	$cat_array = $result;
	if (!is_array($cat_array)) {
     		$html.= "<p>No orders currently available</p>";
     		//return;
  	}
  $html.= "<table style=\"width:100%\" border=\"1\">";
  $html.= "<tr><td>Id</td><td>Order Id</td><td>From</td><td>To</td><td>Timestamp</td><td>Message</td><td>Status</td><td>Source</td></tr>";
  foreach ($cat_array as $row)  {
    $id = $row['ID'];
    $orderid = $row['ORDER_ID'];
    $from = $row['FROM_NUMBER'];
    $to = $row['TO_NUMBER'];
    $timestamp = $row['TIMESTAMP'];
    $message = $row['MESSAGE'];
    $status = $row['STATUS'];
    $source = $row['SOURCE'];

    $html.="<tr>";
    $html.="<td>"; $html.=$id; $html.="</td>";
    $html.="<td>"; $html.=$orderid; $html.="</td>";
    $html.="<td>"; $html.=$from; $html.="</td>";
    $html.="<td>"; $html.=$to; $html.="</td>";
    $html.="<td>"; $html.=$timestamp; $html.="</td>";
    $html.="<td>"; $html.=$message; $html.="</td>";
    $html.="<td>"; $html.=$status; $html.="</td>";
    $html.="<td>"; $html.=$source; $html.="</td>";
    $html.="</tr>";
  }
  $html.="</table>";
  $html.="<hr />";
  echo $html;
?>
