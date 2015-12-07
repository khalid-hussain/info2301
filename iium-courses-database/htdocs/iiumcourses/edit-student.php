<?php
$theMessage = null;
  
  if (isset($_POST['submit'])){  
    require ('connect-db.php');
    
    $stud_matric = $_POST['stud_id'];
    // $stud_name = $_POST['stud_name'];
    $stud_kulliyah = $_POST['stud_kulliyah'];
    // $stud_country = $_POST['stud_country'];
    
    $theQuery = "UPDATE students
                 SET stud_kulliyah = '$stud_kulliyah'
                 WHERE stud_id = '$stud_matric'";
    
    if($result = $conn->query($theQuery)){
      $theMessage = "You have successfully updated the kulliyah for student " . $stud_matric . ".";
    }
    else $theMessage = "There is some problem. Please call IT.";
  }
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Student</title>
</head>
<body>
  <?php
    if ($theMessage) {
      echo $theMessage . "<br>";
    }
  ?>
  <form method="POST">
    <p>
      <label for="stud_id">Student ID</label>
      <input type="text" name="stud_id">
    </p>
    
    <p>
      <label for="stud_id">Student Kulliyah</label>
      <input type="text" name="stud_kulliyah">
    </p>
    <p><input type="submit" name="submit"></p>
  </form>
</body>
</html>