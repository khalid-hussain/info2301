<?php
// The following is required for DB connection
// Specifically the $conn variable
require ('connect-db.php');

// Create the query
$theQuery = "SELECT * FROM students ORDER BY stud_name";

// Execute the query and generate error if it fails
$result = mysqli_query($conn, $theQuery)
or trigger_error("Query Failed! SQL: $theQuery - Error: ". mysqli_error($conn), E_USER_ERROR);

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Students</title>
</head>
<body>
  <h1>All Students</h1>
  <!-- Simple Menu -->
  <a href="add-student.php">Add a new Student</a>
  <br><br>
  <?php
  // If $result has values, display table of students
  if($result) {
    // Check if we have more than zero students, otherwise display a notice.
    if (mysqli_num_rows($result) > 0){
      ?>
      <table border="1" cellpadding="10" cellspacing="0">
        <thead>
          <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Kulliyah</td>
            <td>Country</td>
          </tr>
        </thead>
        <tbody><?php
        // Retrieve results and loop through each row by storing it in $row
        // and calling the associative key related to column values.
        while($row = mysqli_fetch_assoc($result)) {?>
          <tr>
            <td><?php echo $row['stud_id']; ?></td>
            <td><?php echo $row['stud_name'];?></td>
            <td><?php echo $row['stud_kulliyah'];?></td>
            <td><?php echo $row['stud_country'];?></td>
          </tr>
          <?php
        }?>
        </tbody>
        </table>
      <?php
    } // If there are no students, jump to 'else' block.
    else {
      echo "There are no student details to display.";
    }
  } // End of if($result){} block.
  ?>
</body>
</html>