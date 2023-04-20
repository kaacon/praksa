<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iskanje</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="ena">
        <ul id="meni">
            <li><a href="main.php">Začetna stran</a></li>
            <li><a href="izposoja.php">Izposoja</a></li>
            <li><a href="odjava.php">Odjava</a></li>
        </ul>
    </div>
    <br>
    
    <form action="isciknjigo.php" method="post">
    <input type="text" name="iskanje">
    <button type="submit" name="gumb" value="ena">Prikaži knjigo</button>
    <button type="submit" name="gumb" value="dva">Prikaži celotno zbirko</button>
    </form>
    <br>
   

    <?php
     if(isset($_POST['iskanje'])&&isset($_POST['gumb']))
     {
        if($_POST['gumb']=="ena"){
            $text = $_POST['iskanje'];
            $conn = new mysqli('localhost','root','','knjiznica');
     
            $sql = "SELECT id_knjige, naslov, avtor, leto_izdaje FROM knjiga where naslov like '%$text%'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {
            echo "Naslov: " . $row["naslov"]. "<br>" . " Avtor: " . $row["avtor"]. "<br>" . "Leto izida:  " . $row["leto_izdaje"]. "";
            }
        } else {
            echo "Napačen vnos.";
        }
            $conn->close();
        } else{
            $conn = new mysqli('localhost','root','','knjiznica');
     
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
          
          $sql = "SELECT id_knjige, naslov, avtor, leto_izdaje FROM knjiga";
          $result = $conn->query($sql);
          
          if ($result->num_rows > 0) {
            echo "<table><tr><th>ID</th><th>Naslov</th><th>Avtor</th><th>Leto izdaje</th></tr>";
            
            while($row = $result->fetch_assoc()) {
              echo "<tr><td>".$row["id_knjige"]."</td><td>".$row["naslov"]."</td><td>".$row["avtor"]."</td><td>".$row["leto_izdaje"]."</td></tr>";
            }
            echo "</table>";
          } else {
            echo "0 results";
          }
          $conn->close();
        }
        
    }
    else{
            $conn = new mysqli('localhost','root','','knjiznica');
     
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
          
          $sql = "SELECT id_knjige, naslov, avtor, leto_izdaje FROM knjiga";
          $result = $conn->query($sql);
          
          if ($result->num_rows > 0) {
            echo "<table><tr><th>ID</th><th>Naslov</th><th>Avtor</th><th>Leto izdaje</th></tr>";
            
            while($row = $result->fetch_assoc()) {
              echo "<tr><td>".$row["id_knjige"]."</td><td>".$row["naslov"]."</td><td>".$row["avtor"]."</td><td>".$row["leto_izdaje"]."</td></tr>";
            }
            echo "</table>";
          } else {
            echo "0 results";
          }
          $conn->close();
    }

     ?>
     
</body>
</html>