<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijava</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body></body>
    
<div class="obroba">
    
    <div>
    <div id="forma"> 
    <a href="main.php" id="userGumb"><i class="fa fa-arrow-circle-left"></i></a>
    <br><br>   
    <form class="Najdi knjigo" action="#" method="post">
        <input placeholder="Uporabniško ime" type="text" name="ime" id="iskanje"><br><br>
        <input placeholder="Geslo" type="password" name="geslo" id="iskanje"><br><br>
        <br><br>
        <button type="submit" name="gumb">Dodaj uporabnika</button>
    </form>
    </div>
    <?php

    if(isset($_POST["ime"]) && isset($_POST["geslo"])){
    $ime = $_POST['ime'];
    $geslo = $_POST['geslo'];


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "knjiznica";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    $sql = "SELECT count(*) as n FROM uporabniki where uporabnisko_ime = '$ime'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {

    if ( intval($row["n"]) == 0 ) {

        $sql = "INSERT INTO uporabniki values (NULL, '$ime', '$geslo') ";

        if ($conn->query($sql) === TRUE) {
            echo "Uporabnik je dodan";
        } else {
            echo "Uporabnik ni dodan";
        }

    } else {
        echo "Uporabnik že obstaja";
    }
    }
    $conn->close();
    }
    }
    ?>

    </div>
</div>
</body>
</html>
