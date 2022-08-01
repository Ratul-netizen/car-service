<?php
	
	function get_list_view_html($product_id, $product) {
	    $output = '
	    	<tr class="warning">
				<td>
					<div class="col-lg-12">


						<div class="col-lg-8"> 
			      <a href="http://localhost/Assignment3/product.php?id=' . $product["id"] . '"> </a>
							
              <br><strong>Requested by: </strong>' . $product["person"] . '
              <p><strong>Mechanic Requested On :</strong> ' . $product["date"] . '</p>
              <p><strong>Desired Appointment Date : </strong>' . $product["appointment"] . '</p>
              <p><strong>Order Status: </strong>' . $product["orderStatus"] . '</p>
              <br><strong>Request ID: </strong>' . $product["orderID"] . '
						  </div>

						<div class="col-lg-1">
            <p><strong>Desired Mechanic ' . $product["mechanic"] . '</strong></p>
						</div>
					</div>
				</td>
			</tr>
	    ';
	    
        return $output;
    }

	  $items = array();

    include ('connection.php');

    $userQuery = 'SELECT * from users where username = "' . $_SESSION['username'] . '"';
    $userIDresult = mysqli_query($db,$userQuery);
    while ($userIDrow = mysqli_fetch_array($userIDresult, MYSQLI_ASSOC)) {
    	$userID = $userIDrow["id"];
    };

    $userID = (int) $userID;



    if ($userID== 1) {
      # code...
      $query = 'SELECT * from orderItems, orders where orders.id = orderItems.orderid';
    }
    else{
      $query = 'SELECT * from orderItems, orders where orders.id = orderItems.orderid AND orders.user = ' . $userID; 
    }



    //$query = 'SELECT * from orderItems, orders where orders.id = orderItems.orderid';
      $result = mysqli_query($db,$query);

      $orderCnt = 0;
    $orderCnt = 0;
      while ($item_row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $mechanic = $item_row["mechanic"];
        $product_id = $item_row["productID"];
        $timestamp = $item_row["somoy"];
        $orderStatus = $item_row["orderStatus"];
        $appointment = $item_row["appointment"];
        $carlicense = $item_row["carlicense"];
        $enginelicense = $item_row["enginelicense"];
        $user = $item_row["user"];
        $order_id = $item_row["id"];
        $person = $item_row["firstName"];
        $person = $person . ' ' . $item_row["lastName"];
        $address = $item_row["address"];
        $address = $address . '<br>' . $item_row["address2"] . ' ';
        $address = $address . '<br>State: ' . $item_row["state"] . '<br> City: ' . $item_row["city"];
        $address = $address . '<br>Telephone: ' . $item_row["telephone"];
        $address = $address . '<br>Phone: ' . $item_row["phone"];

        $productQuery = 'SELECT * from products where id = ' . $product_id;
        $product_result = mysqli_query($db,$productQuery);
        $row = mysqli_fetch_array($product_result, MYSQLI_ASSOC);


      $cnt = 0;
      $imageArray = array();



       $items[$orderCnt] = array(
        "mechanic" => $mechanic,
        "date" => $timestamp,
        "orderStatus" => $orderStatus,
        "appointment" => $appointment,
        "carlicense" => $carlicense,
        "enginelicense" => $enginelicense,
        "person" => $person,
        "address" => $address,
        "orderID" => $order_id,
        "id" => $product_id

      );
       $orderCnt = $orderCnt + 1;
    }
		 		
?>












<!-- //////////////Total Items///////////////  -->