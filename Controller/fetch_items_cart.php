<?php 
session_start();

$total_price = 0;
$total_item = 0;
if(!empty($_SESSION["shopping_cart"]))
{
 foreach($_SESSION["shopping_cart"] as $keys => $values)
 {
  $total_item = $total_item + 1;
 }

}

$data = array(
    'total_item'  => $total_item
   );
   
   echo json_encode($data);