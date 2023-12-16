<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Image:</label>
                        <input type="file" class="form-control" name="Image" placeholder="Enter your Image">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">First Name:</label>
                        <input type="text" class="form-control" name="fname" placeholder="Enter your first name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Last Name:</label>
                        <input type="text" class="form-control" name="lname" placeholder="Enter your last name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Date Of Birth:</label>
                        <input type="date" class="form-control" name="dob">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email:</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter your email address">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Password:</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter your password">
                    </div>
                    <button type="submit" name="btn" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</body>
<?php
include("connection.php");
if (isset($_POST["btn"])) {
    $Image = $_FILES["Image"]["name"];
    $tmpImage = $_FILES["Image"]["tmp_name"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $password = $_POST["password"];


    if (!is_dir("./image"))
        mkdir("image");

    $ext_array = explode(".", $Image);
    $ext = end($ext_array);

    $allowed_ext = array("gif", "jpeg", "jpg", "png", "mp4");
    if (in_array($ext, $allowed_ext)) {
        if (move_uploaded_file($tmpImage, "./image/" . $Image)) {
            mysqli_query($con, "insert into profile (Image,fname,lname,dob,email,password) values('$Image','$fname','$lname','$dob','$email','$password')") or die(mysqli_error($con));
            echo "<script>alert('Record has been inserted')</script>";
        } else {
            echo "<script>alert('Please upload image')</script>";
        }
    }
    
}

?>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>