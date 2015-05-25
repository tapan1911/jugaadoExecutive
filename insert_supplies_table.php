<?php

// include function files for this application
require_once('book_sc_fns.php');
session_start();
$html = "</br></br>";
$genre = $_POST['genre'];
$zone = $_POST['zone'];
$address = $_POST['address'];
$type = $_POST['type'];
//$html.=$genre;
//$html.=$zone;
//$html.=$address;

$conn = db_connect();
//$html.=$supplier;
//$html.=$name;

$query = "insert into `SUPPLY` (`GENRE`, `ZONE`, `ADDRESS`,`TYPE`) values ('".$genre."', '".$zone."', '".$address."', '".$type."')";

   $result = @$conn->query($query);
  /* 
   if (!$result) {
     return false;
   } else {
     return true;
   } 
    */  
  $query = "select * from `SUPPLY`";
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
  $html.= "<tr><td>Id</td><td>Genre</td><td>Zone</td><td>Address</td><td>Type</td></tr>";
  foreach ($cat_array as $row)  {
    $id = $row['ID'];
    $genre = $row['GENRE'];
    $zone = $row['ZONE'];
    $address = $row['ADDRESS'];
    $type = $row['TYPE'];

    $html.="<tr>";
    $html.="<td>"; $html.=$id; $html.="</td>";
    $html.="<td>"; $html.=$genre; $html.="</td>";
    $html.="<td>"; $html.=$zone; $html.="</td>";
    $html.="<td>"; $html.=$address; $html.="</td>";
    $html.="<td>"; $html.=$type; $html.="</td>";
    $html.="</tr>";
  }
  $html.="</table>";
  $html.="<hr />";
  
  echo $html;

?>
