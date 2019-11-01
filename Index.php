<?php
$servername = "198.91.81.7";
$username = "ninefrmx_root";
$password = "Samuel20";
$mydb = "ninefrmx_libreria";

try{
    $conn = new PDO("mysql:host=$servername;dbname=$mydb", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Connected successfully";
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
?>
<html>
<body>

<?php include 'Visual/Plantilla/Header.php'; ?>

<table>
    <thead>
    <tr>
        <th class="card blue-grey darken-1">TOP #</th>
    </tr>
    </thead>
    <tbody>
    <div class="container">
        <td>
            <div class="carousel">
                <a class="carousel-item" href="#one!"><img src="https://lorempixel.com/250/250/nature/1"></a>
                <a class="carousel-item" href="#two!"><img src="https://lorempixel.com/250/250/nature/2"></a>
                <a class="carousel-item" href="#three!"><img src="https://lorempixel.com/250/250/nature/3"></a>
                <a class="carousel-item" href="#four!"><img src="https://lorempixel.com/250/250/nature/4"></a>
                <a class="carousel-item" href="#five!"><img src="https://lorempixel.com/250/250/nature/5"></a>
            </div>
        </td>

    </div>
    </tbody>
</table>

<table>
    <thead>
    <tr>
        <th class="card blue-grey darken-1">TOP #</th>
    </tr>
    </thead>
    <tbody>
    <td>
        <div class="container">
            <div class="carousel">
                <a class="carousel-item" href="#one!"><img src="https://lorempixel.com/250/250/nature/1"></a>
                <a class="carousel-item" href="#two!"><img src="https://lorempixel.com/250/250/nature/2"></a>
                <a class="carousel-item" href="#three!"><img src="https://lorempixel.com/250/250/nature/3"></a>
                <a class="carousel-item" href="#four!"><img src="https://lorempixel.com/250/250/nature/4"></a>
                <a class="carousel-item" href="#five!"><img src="https://lorempixel.com/250/250/nature/5"></a>
            </div>
        </div>
    </td>
    </tbody>
</table>


</body>
<?php include 'Visual/Plantilla/PieDePagina.php'; ?>
</html>

