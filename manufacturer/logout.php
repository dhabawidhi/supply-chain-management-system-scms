<?php 
session_start();
session_unset();
session_destroy();
function Redirect($url, $permanent = false)
{
    if (headers_sent() === false)
    {
    	header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }

    exit();
}
Redirect('../index.php',false);
?>