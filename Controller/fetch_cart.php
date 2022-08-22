<?php

//fetch_cart.php

session_start();

$total_price = 0;
$total_item = 0;

$output = '
<div class="table-responsive" id="order_table">
 <table class="table table-bordered table-striped">
  <tr>  
            <th width="40%">Product Name</th>  
            <th width="10%">Quantity</th>  
            <th width="20%">Price</th>  
            <th width="15%">Total</th>  
            <th width="5%">Action</th>  
        </tr>
';

if(!empty($_SESSION["shopping_cart"]))
{
 foreach($_SESSION["shopping_cart"] as $keys => $values)
 {
  $output .= '
  <tr>
   <td>'.$values["pro_name"].'</td>
   <td>'.$values["quantity"].'</td>
   <td align="right">$ '.$values["price"].'</td>
   <td align="right">$ '.number_format($values["quantity"] * $values["price"], 2).'</td>
   <td><button name="delete" class="btn btn-danger btn-xs delete" id="'. $values["pro_id"].'">Remove</button></td>
  </tr>
  ';
  $total_price = $total_price + ($values["quantity"] * $values["price"]);


 }
 $output .= '
 <tr>  
        <td colspan="3" align="right">Total</td>  
        <td align="right">$ '.number_format($total_price, 2).'</td>  
        <td></td>  
    </tr>
 ';
}
else
{
 $output .= '
    <tr>
     <td colspan="5" align="center">
      Your Cart is Empty!
     </td>
    </tr>
    ';
}
$output .= '</table></div>';

$data = array(
 'cart_details'  => $output,
 'total_price'  => '$' . number_format($total_price, 2),

);

echo json_encode($data);

?>