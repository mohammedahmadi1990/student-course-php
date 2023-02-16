<?php
  session_start();
  if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit;
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout | GCU Service Subscription</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
  <body>
  <header>
      <img src="images/logo.png" alt="Logo" class="logo" />
      <div class="search-box">
        <input id="input-search" type="text" placeholder="Search..." />
        <button id="btn-search" type="submit">Search</button>
      </div>
    </header>
    <div style="background-color: #f2f2f2; display: flex; flex-direction: row-reverse;">
      <a href="logout.php" style="cursor: pointer;margin-top: -20px; padding-right: 10px;padding-bottom:10px">Logout</a>
    </div>
    <nav>
    <a href="index.php">Home</a>
      <a href="courses.php">Courses</a>
      <a href="checkout.php">Purchase</a>
      <a href="#">Faculties</a>
      <a href="#">Departments</a>
      <a href="#">Contact Us</a>
    </nav>
    <div class="row">
      <div class="checkout-table-box">
        <h1>Final Checkout</h1>        
        <table>
          <thead>
            <tr>
              <th>Item</th>
              <th>Course</th>
              <th>Price</th>
              <th>Description</th>
            </tr>
          </thead>
          <tbody>
          <?php                      
            @include 'config.php';            
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }  
            if($_SESSION['cart']){
            $cart = $_SESSION['cart'];
            $placeholders = implode(',', $cart);
            
            $sql = "SELECT * FROM courses WHERE id IN (".$placeholders.")";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {                  
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr id=course'.$row['id'].' >
                        <td>' . $row['id'] . '</td>
                        <td>' . $row['Course'] . '</td>
                        <td>' . $row['Price'] . '</td>
                        <td>' . $row['Description'] . '</td>
                      </tr>';                 
              }
            } else {  
              echo '<tr><td colspan="4">No courses found.</td></tr>';
            }
          }else{
            echo '<tr><td colspan="4">No courses found.</td></tr>';
          }
        ?>
        
          </tbody>
        </table>
        <div>
          <div
            class="final-price"
            style="text-align: right; padding-top: 10px; font-size: 22px"
          >
            <span>TOTAL: </span>
            <span>
              <?php 
                @include 'config.php';            
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }  
                if($_SESSION['cart']){
                $cart = $_SESSION['cart'];
                $placeholders = implode(',', $cart);
                
                $sql = "SELECT SUM(Price) FROM courses WHERE id IN (".$placeholders.")";
                $result = mysqli_query($conn, $sql);
                $sum = mysqli_fetch_array($result)[0];  
                if (mysqli_num_rows($result) > 0) {  
                  echo "$".$sum;
                }else{
                  echo "$0.00";
                }
              }else{
                echo "$0.00";
              }
              ?>
            </span>
          </div>
          <div class="button-group">
            <input onclick="window.location.href='courses.php'" type="button" value="+ Add More" />
            <input type="button" value="Subscribe" onclick="bankterminal()"/>
          </div>
        </div>
      </div>
    </div>
    <script>
      function bankterminal(){        
        document.body.innerHTML = "Connecting to Payment Gateway...";        
      }
    </script>
  </body>
</html>
