<?php
   $title = "Book Mechanics"; 
   include ('header.php') ;
?>
<style type="text/css">
.adminlay {
    background-color: white;
    color: #01bacf;
}

.adminlay:hover {
    color: black;
}

.adminlays {
    background-color: #01bacf;
    color: black;
}

.adminlays:hover {
    color: black;
}
</style>
<div style="margin: 50px;"></div>




<?php
  include ('connection.php');


  $userID = -1;

  if (isset($_SESSION['username'])){
    $userQuery = 'SELECT * from users where username = "' . $_SESSION['username'] . '"';
    $userIDresult = mysqli_query($db,$userQuery);
    while ($userIDrow = mysqli_fetch_array($userIDresult, MYSQLI_ASSOC)) {
      $userID = $userIDrow["id"];
    };
    $userID = (int) $userID;
  }
  

    
   
   $btn_action = "payment.php";
   $btn_name = "Proceed to Checkout";
   include ('connection.php');
   $order_id = mysqli_insert_id($db);

   if (isset($_POST['place_order'])) {

    // connect to database
    $mechanic=$_POST['mechanic'];
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $address = $_POST['address'];
    $address2 = $_POST['address2'];
    $carlicense = $_POST['carlicense'];
    $enginelicense = $_POST['enginelicense'];
    $appointment = $_POST['appointment'];
    $telephone = $_POST['telephone'];
    $phone = $_POST['phone'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $postCode = $_POST['postCode'];
    //$item = $product_id;
    

    $sql = "INSERT INTO orders (user,mechanic, firstName, lastName, address, address2, carlicense,enginelicense,appointment,telephone, phone, state, city, postCode, orderStatus) 
    VALUES ('$userID','$mechanic', '$firstName', '$lastName','$address','$address2','$carlicense','$enginelicense','$appointment','$telephone','$phone','$state','$city','$postCode','Processing')";

    $Query = mysqli_query($db, $sql); // store the submitted data to the database..

    $newOrderID = mysqli_insert_id($db);
    
    
    $sql = "INSERT INTO orderItems (userID,  orderID) 
    VALUES ('$userID', '$newOrderID')";

    $Query = mysqli_query($db, $sql);
    

    if ($Query) {
      header('Location: http://' . $_SERVER['HTTP_HOST'] . '/Assignment/RequestRegisterComplete.php?id=' . mysqli_insert_id($db));
    }
    echo' <h1>Your Request ID : ' . mysqli_insert_id($db) .'</h1>' ;
    
  }



  ?>

<div class="container">

    <form method="post" enctype="multipart/form-data">
        <div class="col-lg-8">
            <table class="table table-bordered">
                <tr class="adminlay">

                    <td>
                        <h2>Book Your Desired Mechanics</h2>
                    </td>
                </tr>

                <tr class="adminlays">
                    <td>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <p>List of Mechanics : </p>
                            <select name="mechanic" class="form-control">
                                <option value="Select Here">Select Here</option>
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
                        </div>
                    </td>
                </tr>

                <tr class="adminlay">
                    <td>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <p>First Name:</p>
                            <input type="text" name="first-name" class="form-control">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <p>Last Name:</p>
                            <input type="text" name="last-name" class="form-control">
                        </div>
                    </td>
                </tr>

                <tr class="adminlays">
                    <td>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <p>Telephone:</p>
                            <input type="text" name="telephone" class="form-control">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <p>Cell Phone:</p>
                            <input type="text" name="phone" class="form-control">
                        </div>
                    </td>
                </tr>

                <tr class="adminlay">
                    <td>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <p>Address:</p>
                            <input type="text" name="address"
                                class="col-lg-12 col-md-12 col-xs-12 col-sm-12 form-control">
                        </div>
                    </td>
                </tr>

                <tr class="adminlays">
                    <td>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <p>Address 2:</p>
                            <input type="text" name="address2"
                                class="col-lg-12 col-md-12 col-xs-12 col-sm-12 form-control">
                        </div>
                    </td>
                </tr>
                <tr class="adminlay">
                    <td>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <p>Car License Number :</p>
                            <input type="text" name="carlicense"
                                class="col-lg-12 col-md-12 col-xs-12 col-sm-12 form-control">
                        </div>
                    </td>
                </tr>

                <tr class="adminlays">
                    <td>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <p>Engine License Number:</p>
                            <input type="text" name="enginelicense"
                                class="col-lg-12 col-md-12 col-xs-12 col-sm-12 form-control">
                        </div>
                    </td>
                </tr>

                <tr class="adminlay">
                    <td>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <p>Desired Appointment Date :</p>
                            <input type="date" name="appointment"
                                class="col-lg-12 col-md-12 col-xs-12 col-sm-12 form-control">
                        </div>
                    </td>
                </tr>



                <tr class="adminlays">
                    <td>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <p>State:</p>
                            <select name="state" class="form-control">
                                <option value="Please Select">Please Select</option>
                                <option value="Dhaka">Dhaka</option>
                                <option value="Chittagong">Chittagong</option>
                                <option value="Khulna">Khulna</option>
                                <option value="Barishal">Barishal</option>
                                <option value="Mymensingh">Mymensingh</option>
                                <option value="Sylhet">Sylhet</option>
                                <option value="Rajshahi">Rajshahi</option>
                                <option value="Rangpur">Rangpur</option>
                            </select>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <span>City: </span>
                            <input type="text" name="city" class="form-control">
                            <br>
                            <span>Post Code: </span>
                            <input type="text" name="postCode" class="form-control">
                        </div>
                    </td>
                </tr>
            </table>
            <button type="submit" name="place_order"
                class="btn btn-primary center-block"><?php echo "Confirm"?></button>
        </div>

        <div>
            <h1 style="text-align: center;" class="adminlay">Available Mechanic</h1>
            <p class="adminlay">Each mechanic are allowed to have 5 appointments.<br>Please Check the list of avilable
                mechanic before placing your request.</p>
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





        <?php
   include ('footer.php') ;
?>