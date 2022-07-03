<?php

$server="sql101.epizy.com";
$username="epiz_32089765";
$password="4gsmcSUuynp";
$dbname="epiz_32089765_data";
$con=mysqli_connect($server,$username,$password,$dbname);
if(mysqli_connect_error())
{
    echo"<script>alert('cannot connect to the database');
    </script>";
    exit();
}