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
$isValid = true;


if (isset($_POST['submit'])) {
    $name =  htmlspecialchars(trim($_POST['name']));
    $email =  htmlspecialchars(trim($_POST['email']));
    $number =  htmlspecialchars(trim($_POST['number']));
    $gst = htmlspecialchars(trim ($_POST['gst']));
    $address =  htmlspecialchars(trim($_POST['address']));
    $customer =  htmlspecialchars(trim($_POST['customer']));
    $booking = htmlspecialchars(trim ($_POST['booking']));
    $payment = htmlspecialchars(trim ($_POST['payment']));
    // $isValid = true;
   
    // Validations
    if(empty($name)) {
        $errorMsg = "name is required!";
        $isValid = false;
    }
     else if(empty($email)) {
        $errorMsg = "Email is required!";
        $isValid = false;
    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = "Email is invalid!";
        $isValid = false;
    } else if(empty($number)) {
        $errorMsg = "number is required!";
        $isValid = false;
    } else if(empty($gst)) {
        $errorMsg = "gst is required!";
        $isValid = false;
    } else if(empty($address)) {
        $errorMsg = "address is required!";
        $isValid = false;
    } else if(empty($customer)){
         $errorMsg = "customer is required!";
         $isValid = false;   
    }   else if(empty($booking)) {
        $errorMsg = "booking is required!";
        $isValid = false;
    }   else if(empty($payment)){
        $errorMsg = "payment is required!";
        $isValid = false;
    }
 
}
    if($isValid) {

    $sql = "Insert into resturent(name , email, number, gst, address, customer, booking, payment) values('{$name}', '{$email}', '{$number}', '{$gst}', '{$address}', '{$customer}', '{$booking}', '{$payment}')";

    $result = mysqli_query($con, $sql);
    
    if ($result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong>
        Your Entry succesfully!
         <button type="button" class="close" dta-dismiss="alert" arial-label="close">
         <span arial-hidden="true">&time</span>
         </button>
        </div>';
    } 
        else {
         die(mysqli_error($con));
        
    }
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
    <title>Crude Operation</title>
</head>

<body>
    <section class="form-connection">
        <div class="container py-5">
        <a href="index.php"><button class="btn btn-primary float-end">View Records</button></a>
            <h1>Resturant</h1>
            <form method="post" action="">
                <div class="form-group">
                    <label for="fname" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Your First Name" autocomplete="off" required>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Your Email" autocomplete="off" required>
                </div>

                <div class="form-group">
                    <label for="number" class="form-label">Number</label>
                    <input type="number" name="number" class="form-control" placeholder="Enter your number" autocomplete="off" required>
                </div>

                <div class="form-group">
                    <label for="gst" class="form-label">gst</label>
                    <input type="text" name="gst" class="form-control" placeholder="Enter Your gst number" autocomplete="off" required>
                </div>

                <div class="form-group">
                    <label for="address" class="form-label">Address</label>
                    <input type="address" name="address" class="form-control" placeholder="Enter Your Address" autocomplete="off" required>
                </div>

                <div class="form-group">
                    <label for="customer" class="form-label">Customer</label>
                    <input type="text" name="customer" class="form-control" placeholder="Enter Your Review" autocomplete="off" required>
                </div>

                <div class="form-group">
                    <label for="booking" class="form-label">Booking</label>
                    <input type="text" name="booking" class="form-control" placeholder="Enter your Order" autocomplete="off" required>
                </div>

                <div class="form-group">
                    <label for="payment" class="form-label">Payment</label>
                    <input type="text" name="payment" class="form-control" placeholder="Please pay your payment" autocomplete="off" required>
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