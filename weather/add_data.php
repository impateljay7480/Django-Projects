<?php
    // Connect to MySQL
    include 'controller/lib_include.php';

    // Prepare the SQL statement
      date_default_timezone_set('Europe/Athens');
     $dateS = date('m/d/Y h:i:s', time());
    echo $dateS;
    $SQL = "INSERT INTO pi_data (date,Temperature,Humidity,Pressure) VALUES ('$dateS','".$_GET["temp"]."','".$_GET["hum"]."','".$_GET["press"]."')";     

    // Execute SQL statement
    mysql_query($SQL);

    // Go to the review_data.php (optional)
    header("location:index.php");
?>