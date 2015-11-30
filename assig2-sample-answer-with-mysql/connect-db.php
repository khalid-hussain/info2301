<?php

  $host = 'localhost';
  $user = 'root';
  $pass = '';
  $db   = 'assignment2';
  
  $conn = mysqli_connect($host, $user, $pass, $db);
  
  if (mysqli_connect_errno()){
    printf("Connection failed: %s", mysqli_connect_error());
    exit();
  }  
  