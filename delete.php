 <?php
$servername = "localhost:3306";
$username = "root";
$password = "root";
$db="employeeDB";
session_start();
try {

    $ssn=$_POST['ssn'];
    $salary=$_POST['salary'];
    $pdo = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    $sql = 'SELECT salary from empDetails where ssn='.$ssn;
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $count=0;
    while ($row = $q->fetch())
        {
            $count++;
        }
    if($count==0)
    {
        $_SESSION['SSN']=$ssn;
    $_SESSION['salary']=$salary;
    $_SESSION['error']="yes";
    $_SESSION['etype']="SSN does not exists";
    echo "invalid ssn";     
    }
    else
    {
        $_SESSION['SSN']=$ssn;
        $_SESSION['salary']=$salary;
        $_SESSION['error']="yes";
        $_SESSION['etype']="deleted";
        $statement = $pdo->prepare("delete from empDetails where ssn=:ss");
        $statement->execute(array(
            "ss" => $ssn
        ));
    }
    //echo "<script>alert('Inserted');</script>";
}
catch(PDOException $e)
    {
    $_SESSION['SSN']=0;
    $_SESSION['salary']=0;
    $_SESSION['error']="yes";
    $_SESSION['etype']="Cannot establish connection to database";
    }
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