<?php
include '../connect.php';

$name = "";
$email = "";
$number = "";
$gst = "";
$address = "";
$customer = "";
$booking = "";
$payment = "";
$userId = $_GET['id'];

if (isset($_POST['submit'])) {
    $name = ($_POST['name']);
    $email =  ($_POST['email']);
    $number =  ($_POST['number']);
    $gst =  ($_POST['gst']);
    $address =  ($_POST['address']);
    $customer =  ($_POST['customer']);
    $booking =  ($_POST['booking']);
    $payment =  ($_POST['payment']);
 
    $updateSql = "update resturent set  name = '{$name}', email = '{$email}', number = '{$number}', gst = '{$gst}', address = '{$address}', customer = '{$customer}', booking = '{$booking}', payment = '{$payment}' where id = $userId";

    $updateResult = mysqli_query($con, $updateSql);

    if ($updateResult) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong>
        Your Entry Updated succesfully!
         <button type="button" class="close" dta-dismiss="alert" arial-label="close">
         <span arial-hidden="true">&time</span>
         </button>
        </div>';
    } else {
        die(mysqli_error($con));
    }
}

if(isset($userId) && !empty($userId)) {
    $sql = "SELECT * FROM `resturent` where id = {$userId} LIMIT 1";
    $result = mysqli_query($con, $sql);
    $record = mysqli_fetch_object($result);
    if(!$record) {
        echo "Please go away!"; exit;
    }
    // print_r($record); exit;
} else {
    echo 'Please go away!'; exit;
}


?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Edit</title>
</head>

<body>
    <section class="form-connection">
        <div class="container py-5">
        <a href="index.php"><button class="btn btn-primary float-end">View Records</button></a>
            <h1>Resturant</h1>
            <form method="post" action="">
                <div class="form-group">
                    <label for="fname" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Your First Name" autocomplete="off"value="<?php echo $record->name; ?>">
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Your Email" autocomplete="off"value="<?php echo $record->email; ?>">
                </div>

                <div class="form-group">
                    <label for="number" class="form-label">Number</label>
                    <input type="number" name="number" class="form-control" placeholder="Enter your number" autocomplete="off"value="<?php echo $record->number; ?>">
                </div>

                <div class="form-group">
                    <label for="gst" class="form-label">gst</label>
                    <input type="text" name="gst" class="form-control" placeholder="Enter Your gst number" autocomplete="off"value="<?php echo $record->gst; ?>">
                </div>

                <div class="form-group">
                    <label for="address" class="form-label">Address</label>
                    <input type="address" name="address" class="form-control" placeholder="Enter Your Address" autocomplete="off"value="<?php echo $record->address; ?>">
                </div>

                <div class="form-group">
                    <label for="customer" class="form-label">Customer</label>
                    <input type="text" name="customer" class="form-control" placeholder="Enter Your Review" autocomplete="off"value="<?php echo $record->customer; ?>">
                </div>

                <div class="form-group">
                    <label for="booking" class="form-label">Booking</label>
                    <input type="text" name="booking" class="form-control" placeholder="Enter your Order" autocomplete="off"value="<?php echo $record->booking; ?>">
                </div>

                <div class="form-group">
                    <label for="payment" class="form-label">Payment</label>
                    <input type="text" name="payment" class="form-control" placeholder="Please pay your payment" autocomplete="off"value="<?php echo $record->payment; ?>">
                </div>

                <a href="index.php"><button type="submit" class="btn btn-primary my-3" name="submit" value="add_user">Submit</button></a>
                
            </form>
        </div>  
    </section>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>