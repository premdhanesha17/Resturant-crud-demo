<?php

include("../connect.php");

    if(isset($_GET['id']) && isset($_GET['action'])) {
        $id = $_GET["id"];
        // delete
        // echo $result; exit;
        if($_GET['action'] == "delete") {
            // delete query run
            $deleteSql = "delete from resturent where id = {$id}";
            $deleteResult = mysqli_query($con, $deleteSql);
            if($deleteResult) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong>
                Record deleted succesfully!
                 <button type="button" class="close" dta-dismiss="alert" arial-label="close">
                 <span arial-hidden="true">&time</span>
                 </button>
                </div>';
            } else {
                die(mysqli_error($con));
            }
        } else if($_GET['action'] == "block") {
            // block update query 
        }
    }

    $sql = "SELECT id, name, email, number, gst, address, customer, booking, payment FROM `resturent`";
    $result = mysqli_query($con, $sql);

    // find the number of returns record

    $num = mysqli_num_rows($result); // specified row in table
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>index</title>
</head>

<body>

    <div class="container-fluid p-5">
        <h1>Apple Bite Resturent</h1>
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Number</th>
                    <th scope="col">GST</th>
                    <th scope="col">Address</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Booking</th>
                    <th scope="col">Payment</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            <a href="add.php"><button class="btn btn-primary float-end mx-2">Back</button></a>
            <a href="add.php"><button class="btn btn-primary float-end">Add Row</button></a>
                <?php
                    if($num > 0) {
                        $i = 1;
                        while($row=mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $row["name"]; ?></td>
                            <td><?= $row["email"]; ?></td>
                            <td><?= $row["number"]; ?></td>
                            <td><?= $row["gst"]; ?></td>
                            <td><?= $row["address"]; ?></td>
                            <td><?= $row["customer"]; ?></td>
                            <td><?= $row["booking"]; ?></td>
                            <td><?= $row["payment"]; ?></td>
                            <td>
                                <a class="btn btn-sm" href="edit.php?id=<?= $row["id"]; ?>">Edit</a>  
                                <a 
                                    class="btn btn-sm btn-danger"
                                    href="index.php?action=delete&id=<?= $row["id"]; ?>"
                                    onclick="if (confirm('Are you sure?')){return true;}else{event.stopPropagation(); event.preventDefault();};"
                                >Delete</a>    
                                <a class="btn btn-sm btn-danger block" href="edit.php?action=block&id=<?= $row["id"]; ?>">Block</a>    
                            </td>
                        </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
    <!-- <script>
// function add() {
//   var table = document.getElementById("myTable");
//   var row = table.insertRow(0);
//   cell1.innerHTML = "Add";
  
// }
</script> -->
</body>

</html>