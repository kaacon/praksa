<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijava</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<?php
    session_start();
    if(isset($_SESSION["id"])){
        header("Location: main.php");
    }
?>

<body>
    <div class="container">
        <div id="prijava">
        <a href="prijava.php" id="userGumb"><i class="fa fa-user-plus"></i></a>
        <form action="index.php" method="post" >
            <input type="text" placeholder="Uporabniško ime" name="ime"><br><br>
            <input type="password" placeholder="Geslo" name="geslo"><br><br>
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
    </div>

</body>
</html>
