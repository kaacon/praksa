<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Fake COBISS</title>
    
</head>
<body>
    <!-- <?php
        session_start();
        if(!isset($_SESSION["id"])){
            header("Location: index.php");
        }
    ?> -->

    
    <div class="wrapper">
        <div class="meni">
            
            <img src="logo.png" alt="">
           
            <ul class="nav2">

                <?php
                    if($_SESSION["uporabnisko_ime"] == "admin"){
                        echo "<li><a href='dodaj.php'>Dodajanje</a></li>";
                    }
                ?>

                <li><a href="odjava.php">Odjava</a></li>
            </ul>
        </div>    

        <div class="clear"></div>

        
        <div class="mainWrap">
            <div class="novice">
               
                    <div class="novica">
                        <img class="novicaIMG" src="https://cataas.com/cat">
                        <div class="novicaTXT">
                            <h3> <a href="#">Lorem ipsum dolor sit</h3></a>
                                  <br>
                            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="novica">
                        <img class="novicaIMG" src="https://cataas.com/cat">
                        <div class="novicaTXT">
                            <h3> <a href="#">Lorem ipsum dolor sit</h3></a>
                                  <br>
                            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="novica">
                        <img class="novicaIMG" src="https://cataas.com/cat">
                        <div class="novicaTXT">
                            <h3> <a href="#">Lorem ipsum dolor sit</h3></a>
                                  <br>
                            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="novica">
                        <img class="novicaIMG" src="https://cataas.com/cat">
                        <div class="novicaTXT">
                            <h3> <a href="#">Lorem ipsum dolor sit</h3></a>
                                  <br>
                            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="novica">
                        <img class="novicaIMG" src="https://cataas.com/cat">
                        <div class="novicaTXT">
                            <h3> <a href="#">Lorem ipsum dolor sit</h3></a>
                                  <br>
                            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    

            </div>
    
            <div class="main">
                
            <form class="Najdi knjigo" action="main.php" method="post" id="vrstica">
            <input placeholder="Ime knjige" type="text" name="iskanje" id="iskanje">
            <button type="submit" name="gumb" value="ena">Prikaži knjigo</button>
            <button type="submit" name="gumb" value="dva">Prikaži celotno zbirko</button>
            </form>
            <br>

            <table class='tabelaKnjig'><tr><th>ID</th><th>Naslov</th><th>Avtor</th><th>Leto izdaje</th></tr>
            <?php
                if(isset($_POST['iskanje'])&&isset($_POST['gumb']))
                {
                    if($_POST['gumb']=="ena"){
                        $text = $_POST['iskanje'];
                        $conn = new mysqli('localhost','root','','knjiznica');
                
                        $sql = "SELECT id_knjiga, naslov, avtor, leto_izdaje FROM knjiga where naslov like '%$text%'";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {

                            while($row = $result->fetch_assoc()) {
                                echo "<tr><td>".$row["id_knjiga"]."</td><td>".$row["naslov"]."</td><td>".$row["avtor"]."</td><td>".$row["leto_izdaje"]."</td></tr>";
                            }
                            } 
                        else{
                                echo "Napačen vnos.";
                            }
                             $conn->close();
                    }
                    
                    else{
                        $conn = new mysqli('localhost','root','','knjiznica');
                
                    
                        $sql = "SELECT id_knjiga, naslov, avtor, leto_izdaje FROM knjiga";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                            echo "<tr><td>".$row["id_knjiga"]."</td><td>".$row["naslov"]."</td><td>".$row["avtor"]."</td><td>".$row["leto_izdaje"]."</td></tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                    }
                    
                    }else{
                            $conn = new mysqli('localhost','root','','knjiznica');
                    
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        
                        $sql = "SELECT id_knjiga, naslov, avtor, leto_izdaje FROM knjiga";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {      
                            while($row = $result->fetch_assoc()) {
                            echo "<tr><td>".$row["id_knjiga"]."</td><td>".$row["naslov"]."</td><td>".$row["avtor"]."</td><td>".$row["leto_izdaje"]."</td></tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                    }

                ?>

            </table>

            <div class="clear"></div>
            <br>
        </div>
    </div>




</body>
</html>


