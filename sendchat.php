<?php
include('dbconnect.php');


    if(empty($_POST['chattext'])){
        echo "Message not sent Try again?? <a href='index.php'>Home</a>";
        } else {
        $chat = mysqli_real_escape_string($connection,$_POST['chattext']);
        echo $chat;
        $chattype = 'sent';
        $query = "insert into chat(chattext, chattype) values ('$chat', '$chattype');";
        $result = mysqli_query($connection, $query);
        if($result){
            header('location: index.php');
        }
    }
?>