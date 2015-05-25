<?php
	require_once('book_sc_fns.php');
	session_start();
	$html = "</br></br>";
	$status = $_POST['status'];	
	$conn = db_connect();
	  	
	$query = "select * from `ORDER` where STATUS='$status'";
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
  $html.= "<tr><td>Order Id</td><td>Item name</td><td>Zone</td><td>Address</td><td>Phone</td><td>Status</td><td>Order time</td><td>Delivery time</td></tr>";
  foreach ($cat_array as $row)  {
    $id = $row['ID'];
    $item = $row['ITEM'];
    $zone = $row['ZONE'];
    $address = $row['ADDRESS'];
    $phone = $row['PHONE'];
    $status = $row['STATUS'];
    $orderTime = $row['TIME_OF_ORDER'];
    $deliveryTime = $row['TIME_OF_DELIVERY'];

    $html.="<tr>";
    $html.="<td>"; $html.=$id; $html.="</td>";
    $html.="<td>"; $html.=$item; $html.="</td>";
    $html.="<td>"; $html.=$zone; $html.="</td>";
    $html.="<td>"; $html.=$address; $html.="</td>";
    $html.="<td>"; $html.=$phone; $html.="</td>";
    $html.="<td>"; $html.=$status; $html.="</td>";
    $html.="<td>"; $html.=$orderTime; $html.="</td>";
    $html.="<td>"; $html.=$deliveryTime; $html.="</td>";
    $html.="</tr>";
  }
  $html.="</table>";
  $html.="<hr />";
  
  echo $html;
?>
