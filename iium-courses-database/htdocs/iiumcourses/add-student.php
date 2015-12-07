<?php
// This is initialized as null in case there is an error
$theMessage = null;

// If-Else block when user clicks the submit button
if (isset($_POST['submit'])){  
  // The following is required for DB connection
  // Specifically the $conn variable
  require ('connect-db.php');
  
  // Grab values from HTML form
  $stud_id = $_POST['stud_id'];
  $stud_name = $_POST['stud_name'];
  $stud_kulliyah = $_POST['stud_kulliyah'];
  $stud_country = $_POST['stud_country'];

  // Create the query
  $theQuery = "INSERT INTO studentszz VALUES ( '$stud_id' , '$stud_name' , '$stud_kulliyah' , '$stud_country' )";
  
  // Execute the query and generate error if it fails
  $result = mysqli_query($conn, $theQuery)
  or trigger_error("Query Failed! SQL: $theQuery - Error: ". mysqli_error($conn), E_USER_ERROR);
  
  // If query succeeded, create 'success' message
  if ($result)
    $theMessage = "You have successfully added student " . $stud_id . " whose name is " . $stud_name . ".";  
} // End of If-Else block
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add New Student</title>
</head>
<body>
  <h1>Add a new Student</h1>
  <!-- Simple menu -->
  <a href="index.php">View all Students</a>
  
  <?php
    // If the query succeeded, display success message
    if ($theMessage)
      echo $theMessage . "<br>" ;
  ?>
  <form method="POST">
    <p><label for="stud_id">Student Matric</label><br>
        <input type="text" name="stud_id">
    </p>
    <p><label for="stud_name">Student Name</label><br>
        <input type="text" name="stud_name">
    </p>
    <p><label for="stud_kulliyah">Student Kulliyah</label><br>        
        <input list="kulliyahs" name="stud_kulliyah"/>
        <datalist id="kulliyahs">
          <option value="AIKOL">
          <option value="KICT">
          <option value="ENGIN">
          <option value="ECONS">
        </datalist>
    </p>
    <p><label for="stud_country">Student Country</label><br>
        <input list="countries" name="stud_country"/></label>
        <datalist id="countries">
          <option value="Malaysia">
          <option value="Indonesia">
          <option value="Thailand">
          <option value="Yemen">
        </datalist>
    </p>
    <p><input type="submit" name="submit"></p>
  </form>
</body>
</html>