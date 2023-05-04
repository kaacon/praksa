<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodajanje</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body></body>
    
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
    
    <div>
     <div id="forma"> 
       <a href="main.php"><i class="fa fa-arrow-circle-left"></i></a>
    <form class="Najdi knjigo" action="dodaj.php" method="post">
        <input placeholder="Ime knjige" type="text" name="ime" id="iskanje"><br><br>
        <input placeholder="Avtor" type="text" name="avtor" id="iskanje"><br><br>
        <input placeholder="Leto izdaje" type="number" name="izdaja" id="iskanje">
        <br><br>
        <button type="submit" name="gumb">Dodaj knjigo</button>
    </form>
    </div>
    <?php

if(isset($_POST["ime"]) && isset($_POST["avtor"]) && isset($_POST["izdaja"])){
    $ime = $_POST['ime'];
    $avtor = $_POST['avtor'];
    $izdaja = $_POST["izdaja"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "knjiznica";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    $sql = "SELECT count(*) as n FROM knjiga where naslov = '$ime'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {

    if ( intval($row["n"]) == 0 ) {

        $sql = "INSERT INTO knjiga values (NULL, '$ime', '$avtor', '$izdaja') ";

        if ($conn->query($sql) === TRUE) {
            echo "Knjiga je dodana";
        } else {
            echo "Knjiga ni dodana";
        }

    } else {
        echo "Knjiga že obstaja";
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


