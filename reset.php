 <?php
session_start();
$_SESSION['SSN']=0;
$_SESSION['salary']=0;
$_SESSION['error']="no";
$_SESSION['etype']="no errors";
    function Redirect($url, $permanent = false)
{
    if (headers_sent() === false)
    {
        header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }

    exit();
}

Redirect('http://localhost/ex6/q3.php', false);
?> 