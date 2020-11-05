<!DOCTYPE html>
<html>
<head>
    <title>Your`s Pizza</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="toogle.css">

</head>

   <div class="header row">
       <div class="column" >
           <a href="index.php"><img src="logo.gif" style="width: 150px;height:100px"></a>
           <div style="background-color: #f46534; border-radius: 20px; font-size: 25px">Готувати онлайн </div>
           <div style="background-color: #f46534; border-radius: 20px;font-size: 25px">набагато приємніше!</div>
       </div>
    <div class="row h_center">
      <a class="h_item" href="pizza.html">Піца</a>
      <a class="h_item" href="constructor.html">Конструктор піци</a>
      <a class="h_item" href="contacts.html">Про нас</a> 
   </div>
    <a class="korz_ico" href="korz.html"><img src="korz.ico" ></a>   
   </div>
<body>

       <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "yourpizza";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    
    $sklad = mysqli_real_escape_string($conn, $_REQUEST['sklad']);
   
    $sql = "INSERT INTO zakaz (sklad) VALUES ('$sklad')";
    if(mysqli_query($conn, $sql)){
        echo '<h1>Замовлення Виконано</h1>';
        echo '<a href="index.php" class="button" style="width: 30%;">На гловну</a>';
    } else{
        echo '<h1>Error!</h1>' . mysqli_error($conn);
    }

    mysqli_close($conn);
    ?>
 </body>
</html>
<script src="https://semantic-ui.com/dist/semantic.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="func.js" type="text/javascript"></script>