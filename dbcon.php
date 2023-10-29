
<?php

$dsn="mysql:host=localhost;dbname=blog";
$user="root";
$password="";
try {
$con=new PDO($dsn,$user,$password);
$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

} catch (PDOException $ex)
{
echo $ex->getMessage();
}

?>
















