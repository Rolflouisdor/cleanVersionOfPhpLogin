<?php

// start session 

session_start();
session_destroy();

//display logout page

include('views/v_logout.php');


?>