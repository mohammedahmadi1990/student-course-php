<?php
@include 'config.php';

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Retrieve form inputs
  $firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
  $lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
  $birthdate = date("Y-m-d", strtotime(mysqli_real_escape_string($conn, $_POST["birthdate"])));
  $student_id = mysqli_real_escape_string($conn, $_POST["student_id"]);
  $post_code = intval(mysqli_real_escape_string($conn, $_POST["post_code"]));
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $password = mysqli_real_escape_string($conn, $_POST["password"]);

  $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$password' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

  // Insert data into user_form table
  $sql = "INSERT INTO user_form (firstname, lastname, birthdate, student_id, post_code, email, password)
          VALUES ('$firstname', '$lastname', '$birthdate', $student_id, $post_code, '$email', '$password')";

  if (mysqli_query($conn, $sql)) {
      $succ_message = "User created successfully!"; 
      $redirect_url = "login.php?succ_message=" . urlencode($succ_message);
      header("location:".$redirect_url);
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
}

// Close database connection
mysqli_close($conn);
?>
