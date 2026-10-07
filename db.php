<?php 

$dsn = 'mysql:host=localhost;dbname=crud_php';
$username = 'tchali';
$password = '12345';
$options = [];

try {
    $connection = new PDO($dsn, $username, $password, $options);
    # echo 'connection succeful'; 

} catch (PDOException $e) {
    echo 'error' . $e->getMessage();
}
?>
