<?php
@include 'config.php';

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

  // Retrieve form inputs
$select = " SELECT * FROM user_form WHERE email = '$email' && password = '$password' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['cart'] = [];
        header("location:courses.php");
        exit;
   }else{    
    $err_message = 'Invalid user/password!';
    $redirect_url = "login.php?err_message=" . urlencode($err_message);
    header("location:".$redirect_url);
    }
}

// Close database connection
mysqli_close($conn);
?>
