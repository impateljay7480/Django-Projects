<?php
class dbconnect
{
    function connect()
    {
        $connection=mysqli_connect("localhost","root","impateljay","pi_weather");
				return $connection;
    }
}
?>