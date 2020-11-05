<footer class="back" >

	<div class="row" style="justify-content: space-around;opacity: 0.6">
		<div class="column">
			<h3>Навігація</h3>
			 <p><a href="welcome">Головна</a></p>
			 <p><a href="pizza">Піца</a></p>
			 <p><a href="constructor">Констркуктор піци</a></p>
			 <p><a href="contacts">Контакти</a></p>

		</div>
		<div class="column">
			<h3>Контакти<br></h3>
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
			<h4>Телефон</h4>
    <p>{$row["tel_number"]}</p>
    <h4>Email</h4>
    <p>{$row["email"]}</p>
    <h4>Адреса</h4>
    <p>{$row["adres"]}</p>"; }?>

		</div>
		<div class="column">
			<h3>Соціальні мережі</h3>
			<p> facebook.com<br></p>
			<p>instagram.com<br></p>
			<p>telegram.com</p>
		</div>
	</div>




</footer>
</html>