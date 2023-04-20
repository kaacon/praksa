<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijava</title>
    <link rel="stylesheet" href="style.css">
</head>

<?php
    session_start();
    if(isset($_SESSION["id"])){
        header("Location: main.php");
    }
?>

<body>
    <div id="prijava">
        <form action="index.php" method="post" >
            <input type="text" placeholder="Uporabniško ime" name="ime"><br>
            <input type="password" placeholder="Geslo" name="geslo"><br>
            <button type="submit">Prijava</button>
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
            
            $sql = "SELECT id, uporabnisko_ime, geslo FROM uporabniki WHERE uporabnisko_ime = '$ime' and geslo = '$geslo'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $_SESSION["id"] = $row["id"];
                $_SESSION["uporabnisko_ime"] = $row["uporabnisko_ime"];
                header("Location: main.php");
              }
            } else {
              echo "Prijava ni uspela.";
            }
            $conn->close();


        }    
    ?>


</body>
</html>
