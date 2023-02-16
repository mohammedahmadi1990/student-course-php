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
    <title>Courses | GCU Service Subscription</title>
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
      <div class="filter-box">
        <h4>Filter</h4>
        <ul>
          <li id="program">Program</li>
          <li id="department">Department</li>
          <li id="level">Level</li>
          <li id="essentials">Essentials</li>
        </ul>
      </div>
      <div class="table-box">
        <h1>Courses Offered</h1>        
        <table>
          <thead>
            <tr>
              <th>Item</th>
              <th>Course</th>
              <th>Program</th>
              <th>Department</th>
              <th>Level</th>
              <th>Essentials</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            <?php              
              @include 'config.php';
              
              // Check connection
              if (!$conn) {
                  die("Connection failed: " . mysqli_connect_error());
              }    
              unset($_SESSION['cart']);  
              $cart =[]; 
              $_SESSION['cart'] = $cart;                     

              if (isset($_GET["filterby"])) {
                $filter = urldecode($_GET["filterby"]); 
                switch($filter){
                  case "program":
                    $sql = "SELECT * FROM courses ORDER BY ".$filter;  
                    break;
                  case "department":
                    $sql = "SELECT * FROM courses ORDER BY ".$filter;  
                    break;
                  case "level":
                    $sql = "SELECT * FROM courses ORDER BY ".$filter;  
                    break;
                  case "essentials":
                    $sql = "SELECT * FROM courses ORDER BY ".$filter;  
                    break;
                  default:
                    $sql = "SELECT * FROM courses";  
                    break; 
                } 
                                        
              }else{
                $sql = "SELECT * FROM courses";                                
              }
              
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {                  
                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<tr id=course'.$row['id'].' onclick="toggleCourse('.$row['id'].')">
                          <td>' . $row['id'] . '</td>
                          <td>' . $row['Course'] . '</td>
                          <td>' . $row['Program'] . '</td>
                          <td>' . $row['Department'] . '</td>
                          <td>' . $row['level'] . '</td>
                          <td>' . $row['Essentials'] . '</td>
                          <td>' . $row['Date'] . '</td>
                        </tr>';                 
                }
              } else {  
                echo '<tr><td colspan="7">No courses found.</td></tr>';
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <script>      
           
      document.getElementById('program').addEventListener('click',(e) =>{
        e.preventDefault();    
        window.location = 'courses.php?filterby=program';
      });
      document.getElementById('department').addEventListener('click',(e) =>{
        e.preventDefault();    
        window.location = 'courses.php?filterby=department';
      });
      document.getElementById('level').addEventListener('click',(e) =>{
        e.preventDefault();    
        window.location = 'courses.php?filterby=level';
      });
      document.getElementById('essentials').addEventListener('click',(e) =>{
        e.preventDefault();    
        window.location = 'courses.php?filterby=essentials';
      });
      const toggleCourse = (courseNo) =>{   
        const url = 'cart.php?courseNo=' + courseNo;
        const xhr = new XMLHttpRequest();
        xhr.open("GET", url, true);
        xhr.send();
        if(document.getElementById('course'+courseNo).style.backgroundColor === "rgb(144, 214, 116)"){
          document.getElementById('course'+courseNo).style.backgroundColor = "#f2f2f2";          
        }else{          
          document.getElementById('course'+courseNo).style.backgroundColor = "rgb(144, 214, 116)";        
        }
       
      };    
      
    </script>
  </body>
</html>
