<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | GCU Service Subscription</title>
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
      <a href="login.php" style="cursor: pointer;margin-top: -20px; padding-right: 10px;padding-bottom:10px"></a>
    </div>
    <nav>
      <a href="index.php">Home</a>
      <a href="courses.php">Courses</a>
      <a href="checkout.php">Purchase</a>
      <a href="#">Faculties</a>
      <a href="#">Departments</a>
      <a href="#">Contact Us</a>
    </nav>
    <div class="container">
      <div class="messages" style="text-align:center">
        <?php
          if (isset($_GET["err_message"])) {
            $message = urldecode($_GET["err_message"]);
            echo '<span class="error-msg">'.$message.'</span>';
          } 
          if (isset($_GET["succ_message"])) {            
            $message = urldecode($_GET["succ_message"]);
            echo '<span class="success-msg">'.$message.'</span>';
          }            
      ?>
      </div>    
    <div class="row">
      
      <div class="login-box" action="">
        <h2>Login</h2>

        <form action="login-form.php" method="post">
          <div class="row-group">
            <input
              type="text"
              id="email"
              placeholder="Enter Email..."
              name="email"
            />
          </div>

          <div class="row-group">
            <input
              type="password"
              placeholder="Enter password..."
              id="password"
              name="password"
            />
          </div>

          <div class="row-group">
            <button type="reset">Reset</button>
            <button type="submit">Login</button>
          </div>
        </form>
      </div>
      <div class="login-box">
        <h2>Create Account</h2>
        <form action="register-form.php" method="post">          
          <div class="row-group">
            <label for="firstname">Firstname</label>
            <input type="text" id="firstname" name="firstname" />
          </div>

          <div class="row-group">
            <label for="lastname">Lastname</label>
            <input type="text" id="lastname" name="lastname" />
          </div>

          <div class="row-group">
            <label for="birthdate">Date of Birth</label>
            <input type="date" id="birthdate" name="birthdate" style="width: 100%; margin-bottom: 15px; padding-top:5px; padding-bottom:5px; outline:none; border: 0px; border-radius: 4px"/>
          </div>

          <div class="row-group">
            <label for="student_id">Student ID</label>
            <input type="text" id="student_id" name="student_id" />
          </div>

          <div class="row-group">
            <label for="post_code">Post Code</label>
            <input type="text" id="post_code" name="post_code" />
          </div>

          <div class="row-group">
            <label for="email">Student Email</label>
            <input type="text" id="email" name="email" />
          </div>

          <div class="row-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" />
          </div>

          <div class="row-group">
            <button type="reset">Reset</button>
            <button type="submit" name="submit">Register</button>
          </div>
        </form>
      </div>
    </div>
    </div>
  </body>
</html>
