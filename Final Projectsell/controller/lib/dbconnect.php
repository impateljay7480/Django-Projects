<?php
class dbconnect
{
    function connect()
    {
        $connection=mysqli_connect("localhost","root","impateljay","project");
			return $connection;	
    }
}
?>