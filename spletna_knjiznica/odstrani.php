<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odstranjevanje</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="obroba">
    <?php
        session_start();
        if(isset($_SESSION["id"]) || isset($_SESSION["uporabnisko_ime"])){
            if($_SESSION["uporabnisko_ime"] != "admin"){
                header("Location: main.php");
            }
        }else{
            header("Location: main.php");
        }
    ?>
     <div id="forma"> 
       <a href="main.php"><i class="fa fa-arrow-circle-left"></i></a>
    <form action="odstrani.php" method="post">
        <input placeholder="Ime knjige" type="text" name="ime" id="iskanje"><br><br>
        <br>
        <button type="submit" name="gumb">Odstrani knjigo</button>
    </form>
    </div>
    
    <?php

    if(isset($_POST["ime"])){
    $ime = $_POST['ime'];


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "knjiznica";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    $sql = "SELECT * FROM knjiga where naslov = '$ime';";
    $result = $conn->query($sql);

    if (!empty($result)) {
        $sql = "DELETE FROM knjiga where naslov = '$ime' ";

        if ($conn->query($sql) === TRUE) {
            echo "Knjiga je bila odstranjena";
        } else {
            echo "Knjiga ni bila dodana";
        }

    }

    $conn->close();

    }
    ?>
    
    </div>
</div>



</body>
</html>




