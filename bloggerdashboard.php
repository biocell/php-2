<?php 
include_once('lib/header.php');
$userMessages = file_get_contents("db/messages/". ".json");
$messages = json_decode($userMessages);
      echo $messages;
?>

