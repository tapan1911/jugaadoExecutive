<?php

// include function files for this application
require_once('book_sc_fns.php');
session_start();
$html = "</br></br>";
$supplier = $_POST['supplier'];
$name = $_POST['name'];
$brand = $_POST['brand'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$genre = $_POST['genre'];
$type = $_POST['type'];
$rarity = $_POST['rarity'];
$conn = db_connect();
//$html.=$supplier;
//$html.=$name;
 
$query = "insert into `ITEM` (`SID`, `NAME`, `BRAND`,`QUANTITY`,`PRICE`,`GENRE`,`TYPE`,`RARITY`) values ('".$supplier."', '".$name."', '".$brand."', '".$quantity."', '".$price."', '".$genre."', '".$type."', '".$rarity."')";

   $result = @$conn->query($query);
   /*
   if (!$result) {
     return false;
   } else {
     return true;
   } 
    */  
  $query = "select * from `ITEM`";
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
  $html.= "<tr><td>Id</td><td>Sid</td><td>Name</td><td>Brand</td><td>Quantity</td><td>Price</td><td>Genre</td><td>Type</td><td>Rarity</td></tr>";
  foreach ($cat_array as $row)  {
    $id = $row['ID'];
    $sid = $row['SID'];
    $name = $row['NAME'];
    $brand = $row['BRAND'];
    $quantity = $row['QUANTITY'];
    $price = $row['PRICE'];
    $genre = $row['GENRE'];
    $type = $row['TYPE'];
    $rarity = $row['RARITY'];

    $html.="<tr>";
    $html.="<td>"; $html.=$id; $html.="</td>";
    $html.="<td>"; $html.=$sid; $html.="</td>";
    $html.="<td>"; $html.=$name; $html.="</td>";
    $html.="<td>"; $html.=$brand; $html.="</td>";
    $html.="<td>"; $html.=$quantity; $html.="</td>";
    $html.="<td>"; $html.=$price; $html.="</td>";
    $html.="<td>"; $html.=$genre; $html.="</td>";
    $html.="<td>"; $html.=$type; $html.="</td>";
    $html.="<td>"; $html.=$rarity; $html.="</td>";
    $html.="</tr>";
  }
  $html.="</table>";
  $html.="<hr />";
  
  echo $html;

?>
