<?php
   $title = "Manage Requests"; 
   include ('header.php') ;
  ?>
 
<div class="container">
	<div class="col-lg-8">
		<br>
	<table class="table table-bordered">

		<?php
		
		function get_list_view_html($product_id, $product) {
		    $output = '
		    	<tr class="warning">
					<td>
						<div class="col-lg-12">




							<div class="col-lg-8"> 
				      			<a href="http://localhost/assginment3/product.php?id=' . $product["id"] . '">
	              					
	            				</a>
								
					            <p><strong>Mechanic Requested On : </strong>' . $product["date"] . '<br><strong>Requested by: </strong>' . $product["person"] . '<br>
					            <strong>Car License Number : </strong>' . $product["carlicense"] .  ' <br>
					            <strong>Engine License Number : </strong>' . $product["enginelicense"] .  ' 
					            </p>
					            <p><strong>Desired Appointment Date : </strong>' . $product["appointment"] . '</p>
					            <p><strong>Address : </strong>' . $product["address"] . '</p>
								<p><strong>Request Status: </strong>' . $product["orderStatus"] . '
									
									<br><strong>Request ID: </strong>' . $product["orderID"] . '
					            </p>
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

	    


	    $query = 'SELECT * from orderItems, orders where orders.id = orderItems.orderid';
	    $result = mysqli_query($db,$query);

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
			 		

			foreach ($items as $product_id => $product) {
				 echo get_list_view_html($product_id,$product);
			}

	if (isset($_POST['modify_order'])) {
		// connect to database
		include ('connection.php');

		$get_order_id = $_POST['order-id-input'];

		$newOrderStatus = $_POST['order-status-input'];
		$newAppointmentStatus = $_POST['order-appointment-input'];
		$newMechanicStatus = $_POST['order-mechanic-input'];

		$sql = "UPDATE orders SET orderStatus = '$newOrderStatus', appointment = '$newAppointmentStatus', mechanic = '$newMechanicStatus'  WHERE id = '$get_order_id'";




		$modifyAQuery = mysqli_query($db, $sql); // store the submitted data to the database..
		if ($modifyAQuery) {
			echo '<div class="alert alert-success">';
  			echo "<strong>Success!</strong> Modified.";
			echo "</div>";
		}
	}

	if (isset($_POST['delete_order'])) {
		// connect to database
		include ('connection.php');

		$get_order_id = $_POST['order-id-input'];
		
		$sql = "DELETE orders, orderItems FROM orders INNER JOIN orderItems WHERE orders.id = orderItems.orderid and orders.id = '$get_order_id'";

		$deleteQuery = mysqli_query($db, $sql); // store the submitted data to the database..
		if ($deleteQuery && $id) {
			echo '<div class="alert alert-success">';
  			echo "<strong>Success!</strong> Item deleted.";
			echo "</div>";
		}
		
			
	}
		?>
	</table>
	</div>
	<br>
	<div class="col-lg-4">
	<form method="post" enctype="multipart/form-data">
	    <table class="table table-bordered">
	      <thead>
	        <tr class="warning">
	          <td><b>Request ID</b></td>
	          <td><input type="text" name="order-id-input" class="form-control"></td>
	        </tr>
	      </thead>
	      <tbody>
	      	<tr class="warning">
	          <td>
	            Update Appointment Time
	          </td>
	          <td>
	            <input type="date" name="order-appointment-input"  class="form-control">
	          </td>
	        </tr>

	      	<tr class="warning">
	          <td>
	            Update Mechanic
	          </td>
	          <td>

              <select name="order-mechanic-input" class="form-control">
                <option value="Please Select">Please Select</option>

                <?php 
                  $avaiableMechanic = array();
                  for ($i=1; $i < 6; $i++) { 
                    $mechanicQuery = 'SELECT COUNT(*) from orders where mechanic = ' . $i . '';
                    $mechanicQuery = mysqli_query($db,$mechanicQuery);

                    $mechanicCount = 100; //trubolshooting

                    $mechanicRow = mysqli_fetch_array($mechanicQuery, MYSQLI_ASSOC);
                    $mechanicCount = $mechanicRow["COUNT(*)"];

                    $mechanicCount = (int) $mechanicCount;
                    $avaiableMechanic[$i] = $mechanicCount;

                    if ($mechanicCount>4) {
                      echo '<option value="' . $i . '" disabled>Mechanic ' . $i . ' Unavaiable</option>';
                    }
                    else{
                      echo '<option value="' . $i . '">Mechanic ' . $i . '</option>';
                    }
                  }
               ?>
            </select>
	          </td>
	        </tr>

	        <tr class="warning">
	          <td>
	            Request Status
	          </td>
	          <td>
	            <input type="text" name="order-status-input"  class="form-control">
	          </td>
	        </tr>

	        <tr class="warning">
	          <td>
	            <button type="submit" name="delete_order" class="btn btn-danger">Delete Request</button>
	          </td>
	          <td>
	            <button type="submit" name="modify_order" class="btn btn-info">Update Request</button>
	          </td>
	        </tr>
	      </tbody>
	    </table>
    </form>
   
<div>
<h1 style="text-align: center;" class="adminlay">Available Mechanic</h1>
<p  class="adminlay">Each mechanic are allowed to have 5 appointments.<br>Please Check the list of avilable mechanic before re-assiging.</p>
    <?php 
        for ($i=1; $i < 6; $i++) { 
          echo '
            <div class="progress" style="background-color: #85E4F0;">
              <div class="progress-bar progress-bar-striped" role="progressbar" style="color:white; background-color:#01bacf; width: ' . $avaiableMechanic[$i]*20 . '%" aria-valuenow="' . $avaiableMechanic[$i]*20 . '" aria-valuemin="0" aria-valuemax="100">Mechanic ' . $i . '
              </div>
            </div>
          ';
        }

     ?>

</div>  
    	






  </div>
</div>

