<?php
  $theMessage = null;
  
  if (isset($_POST['submit'])){  
    require ('connect-db.php');
    
    $stud_matric = $_POST['stud_id'];
    $stud_name = $_POST['stud_name'];
    $stud_kulliyah = $_POST['stud_kulliyah'];
    $stud_country = $_POST['stud_country'];
    
    $theQuery = "INSERT INTO students VALUES ('$stud_matric','$stud_name','$stud_kulliyah','$stud_country')";     
    
    if($result = $conn->query($theQuery)){
      $theMessage = "You have successfully added student " . $stud_matric . " whose name is " . $stud_name . ".";
    }
    else $theMessage = "There is some problem. Please call IT.";
  }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add New Student</title>
</head>
<body>
  <?php 
    if ($theMessage)
      echo $theMessage . "<br>" ;
  ?>
  <form method="POST">
    <p><label for="stud_id">Student Matric</label><br>
        <input type="text" name="stud_id">
    </p>
    <p><label for="stud_id">Student Name</label><br>
        <input type="text" name="stud_name">
    </p>
    <p><label for="stud_id">Student Kulliyah</label><br>        
        <input list="kulliyahs" name="stud_kulliyah"/></label>
        <datalist id="kulliyahs">
          <option value="AIKOL">
          <option value="KICT">
          <option value="ENGIN">
          <option value="ECONS">
        </datalist>
    </p>
    <p><label for="stud_id">Student Country</label><br>
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