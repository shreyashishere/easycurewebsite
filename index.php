<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variable
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $weight = $_POST['weight'];
    $blood pressure = $_POST['blood pressure'];
    $symptoms = $_POST['symptoms'];
   $sql = "INSERT INTO easycure.easycure ( gender, age, weight, blood_pressure, symptoms) VALUES (`$gender`, `$age`, `$weight`, `$blood_pressure`, `$symptoms`);";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EASYCURE.COM</title>
<style>
  body {
    font-family: 'futura', futura;
    background-color: #FEFA59;
    margin: 4;
    padding: 3;
  }
  .container {
    width: 90%;
    margin: auto;
    overflow: hidden;
  }
  header {
    background: #921A0D;
    color: #9DF6E4;
    padding-top: 20px;
    min-height: 20px;
    border-bottom: #FEFA59 4px solid;
  }
  header a {
    color: #ffff00;
    text-decoration: bold;
    text-transform: uppercase;
    font-size: 20px;
  }
  header ul {
    padding: 4;
    list-style: none;
  }
  header li {
    float: left;
    display: inline;
    padding: 0 40px 0 40px;
  }
  header #branding {
    float: left
  }
  header #branding h1 {
    margin: 0;
  }
  header nav {
    float: left;
    margin-top: 0px;
  }
  header .highlight, header .current a {
    color: #ffff00;
    font-weight: bold;
  }
  header a:hover {
    color:#FEFA59 ;
    font-weight: bold;
  }
</style>
</head>
<body>
  <header>
    <div class="container">
      <div id="branding">

        <h1> <img src="EASYCURELOGO.png" alt ="logo" width="100px" height="100px"> <span class="highlight">EASY</span> CURE</h1>
      </div>
      <nav>
        <ul>
          <li class="current"><a href="index.html">Home</a></li>
          <li><a href="about.html">About</a></li>
  
        </ul>
      </nav>
    </div>
  </header>
          <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. </p>";
        }
    ?>

  <div class="container">
    <form action="index.php" method="post">
<br>
<label for="radio">GENDER</label>
<input type="radio" name="gender" value="male"> Male
<input type="radio" name="gender" value="female"> Female

<br>
      <label for="age">AGE :-</label>
      <input type="number" name="age" id="age" placeholder="enter your age " required>
<br>
       
<br>

      <label for="weight">WEIGHT:</label>
      <input type="number" id="weight" name="weight" placeholder="enter your weight">
<br>
<br>

      <label for="date" >Blood Pressure:</label>
      <input type="number" id="date" name="date" placeholder="enter your blood Pressure" required>
      <br> 
       
      <label for="d"><br>your symptoms </label>
 <textarea name="d" id="d" placeholder="enter your symtoms"></textarea>
  
    

    <br>
<br>

      <input type="submit" value="Submit">
    </form>

  </div>
<br>
<marquee behavior="scroll"direction="right" >Designed By Shreyash And Deep </marquee>
</body>
</html>
