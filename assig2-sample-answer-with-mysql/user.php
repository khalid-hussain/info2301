<?php  
  if (isset($_POST['submit'])){
    require('connect-db.php');
    $theEmail = $_POST['email'];
    $thePassword = $_POST['password'];
    
    $theQuery = "SELECT user_name, user_kulliyah, user_country, user_image_link FROM users WHERE user_email = '". $theEmail . "' AND user_password = '". $thePassword . "' LIMIT 1";        
    
    if ($result = $conn->query($theQuery)){
      if ($result->num_rows > 0){        
        ?>
      <table border="1" cellpadding="10" cellspacing="0">
        <thead>
          <tr>
            <td>Name</td>
            <td>Kulliyah</td>
            <td>Country</td>
            <td>Image Link</td>
            <td>The Image</td>
          </tr>
        </thead>
        <tbody>
    <?php while ($row = $result->fetch_object()){?>
      <tr>
      <td><?php echo $row->user_name; ?></td>
      <td><?php echo $row->user_kulliyah; ?></td>
      <td><?php echo $row->user_country; ?></td>
      <td><?php echo $row->user_image_link; ?></td>
      <td><img src="<?php echo $row->user_image_link; ?>"></td>      
    </tr>
      <?php
    }
    ?>
  </tbody>
  </table>
      <?php
      }
      else {
        echo "You don't exist in our database.";
      }
  }
 }
?>
  