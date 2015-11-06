<?php

include('connection_class.php');

$connect = new mySQL();
$connect2 = new mySQL();
$connect->connect('localhost','root','root','user_registration');
//testing the connection class to see if it works I should be able to initiate two or more connections
//$connect2->connect('localhost','roots','root','guestbook');

?>