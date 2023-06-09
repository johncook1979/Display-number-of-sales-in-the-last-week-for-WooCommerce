/**
  * Display the total number of sales for a product in the custom timeframe
  *
  * Place in your theme functions.php file
  *
*/

add_action( 'woocommerce_single_product_summary', 'my_product_sold_count_custom', 11 );
  
function my_product_sold_count_custom() {
   global $product;
    
   // Get all of the orders for the last week
   $all_orders = wc_get_orders(
      array(
         'limit' => -1,
         'status' => array_map( 'wc_get_order_status_name', wc_get_is_paid_statuses() ),
         'date_after' => date( 'Y-m-d H:i:s', strtotime( '-1 hour' ) ), // change this to suit. You can use -1 day, -2 day, -3 day etc for days and -1 hour, -4 hour, -6 hour etc for hours
         'return' => 'ids',
      )
    );
     
    // Set the count to 0
    $count = 0;

    // Loop through the orders and add up the sales    
    foreach ( $all_orders as $orders ) {
  
      // Get the order
      $order = wc_get_order( $orders );

      // Get the items in the order
      $items = $order->get_items();

      // Loop through the items purchased
      foreach ( $items as $item ) {
  
          // get the product id
          $product_id = $item->get_product_id();

          // check if the product id in the order matches the product id
          if ( $product_id == $product->get_id() ) {

            // add the quantity of items sold to the count of products
            $count = $count + absint( $item['qty'] ); 
          }
      }
    }
    

    // conditionally dislay the total sold in the past custom time
    if ( $count > 10 && $count < 50){ 
	    echo '<p><span class="dashicons dashicons-chart-line"></span>' . $count . ' sold in the last week</p>';
	  } elseif ( $count >= 50 ) {
	    echo '<p class="hotline"><span class="dashicons dashicons-awards"></span> Hot product! Already <span class="highlight">' . $count . '</span> sold in the last 7 days</p>';
    }
}
