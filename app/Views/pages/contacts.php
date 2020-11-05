
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

        $sql = "SELECT * FROM contacts";
        $result = mysqli_query($conn, $sql);
 while($row = mysqli_fetch_assoc($result)) {
       echo "
            

<div class='row' style='justify-content: space-around; margin-top: 50px'>
  <div class='back column'>
    <div class='row'>
      <a class='korz_ico' href='www.facebook.com'><img src='http://yourpizza.com/img/icons/fb_ico.png' ></a> 
      <a class='korz_ico' href='instagram.com'><img src='http://yourpizza.com/img/icons/inst_ico.png' ></a> 
      <a class='korz_ico' href='telegram.com'><img src='http://yourpizza.com/img/icons/tlg_ico.png' ></a> 
    </div>
    <div style='margin-left: 40px;'>
    <h2>Телефон</h2>
    <p>{$row["tel_number"]}</p>
    
    <h2>Email</h2>
    <p>{$row["email"]}</p>
    <h2>Адреса</h2>
    <p>{$row["adres"]}</p>
  </div>
    <h2>Ваша думка важлива для нас!</h2>
    
  </div>
<div class='map-responsive'>
  <iframe src='{$row["geo_link"]}' width='600' height='450' frameborder='0' style='border:0;' allowfullscreen=' aria-hidden='false' tabindex='0'></iframe>
 </div>
</div> ";
}
?>
</body>
