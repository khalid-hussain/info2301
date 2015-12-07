<?php
  require ('connect-db.php');
  
  $theQuery = "SELECT * FROM students ORDER BY stud_name";
  
  if($result = $conn->query($theQuery)){
    if ($result->num_rows > 0){
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
          while ($row = $result->fetch_object()){
            ?>
              <tr>
                <td><?php echo $row->stud_id; ?></td>
                <td><?php echo $row->stud_name;?></td>
                <td><?php echo $row->stud_kulliyah;?></td>
                <td><?php echo $row->stud_country;?></td>            
              </tr><?php
          }
          ?>
        </tbody>
        </table>
      <?php
    }
  }
?>