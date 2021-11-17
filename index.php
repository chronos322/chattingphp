<?php
    include('dbconnect.php');
    $query = "SELECT * from chat;";
    $result = mysqli_query($connection, $query);

    // if (mysqli_num_rows($result) > 0) {
    //     // output data of each row
    //     while($row = mysqli_fetch_assoc($result)) {
    //       echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    //     }
    //   } else {
    //     echo "0 results";
    //   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
</head>
<body>
<div class="container d-flex justify-content-center">
    <div class="card mt-5">
    <div class="d-flex flex-row justify-content-between p-3 adiv text-white"> <i class="fas fa-chevron-left"></i> <span class="pb-3">Live chat</span> <i class="fas fa-times"></i> </div>
    <?php if(mysqli_num_rows($result) > 0) { ?>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <?php if($row['chattype']==='income'){ ?>
        <div class="d-flex flex-row p-3"> <img src="https://img.icons8.com/color/48/000000/circled-user-female-skin-type-7.png" width="30" height="30">
            <div class="chat ml-2 p-3"><?php echo $row['chattext']; ?></div>
        </div>
        <?php } else { ?>
        <div class="d-flex flex-row p-3">
            <div class="bg-white mr-2 p-3"><span class="text-muted"><?php echo $row['chattext']; ?></span></div> <img src="https://img.icons8.com/color/48/000000/circled-user-male-skin-type-7.png" width="30" height="30">
        </div>
        <?php }}} ?>
        <form action="sendchat.php" method="POST">
        <input class="form-control" name="chattext" placeholder="Type your message">
        <input type="submit" value="Send message" name='submit'>
        </form>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>