<?php
	require_once('book_sc_fns.php');
	session_start();
	$html = "</br></br>";
	$zone = $_POST['zone'];
	$item = $_POST['item'];
	$html.= $zone;
	$html.= $item;	
	$conn = db_connect();	
		
	$query = "select ITEM.ID,ITEM.SID,ITEM.NAME from `ITEM`,((select * from `SUPPLY` where ZONE='$zone') as `SUPPLY`) where ITEM.SID = SUPPLY.ID and ITEM.NAME like '%$item%'";

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
  $html.= "<tr><td>Item Id</td><td>Supplies Id</td><td>Name</td></tr>";
  foreach ($cat_array as $row)  {
    $itemId = $row['ID'];
    $suppliesId = $row['SID'];
    $itemName = $row['NAME'];
   // $phone = $row['PHONE'];
   // $status = $row['STATUS'];
   // $orderTime = $row['TIME_OF_ORDER'];
   // $deliveryTime = $row['TIME_OF_DELIVERY'];

    $html.="<tr>";
    $html.="<td>"; $html.=$itemId; $html.="</td>";
    $html.="<td>"; $html.=$suppliesId; $html.="</td>";
    $html.="<td>"; $html.=$itemName; $html.="</td>";
    $html.="</tr>";
  }
  $html.="</table>";
  $html.="<hr />";
  echo $html;
?>
