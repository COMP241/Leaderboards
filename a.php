<?php
$game = $_POST['game'];
$user = $_POST['user'];
$score = $_POST['score'];
$mapid = $_POST['mapid'];
$servername = "localhost";
$username = "score";
$password = "scores11";
$dbname = "highscores";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $conn->prepare("INSERT INTO scores(game,username,score,mapid) VALUES(:game,:user,:score,:map)");
    $sql->bindParam(':game', $game);
    $sql->bindParam(':user', $user);
    $sql->bindParam(':score', $score);
    $sql->bindParam(':map', $mapid);
    $sql->execute();

    echo "Inserted Successfully";
}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
?>
