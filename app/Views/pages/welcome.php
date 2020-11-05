<div id="slider">
  <a href="#" class="control_next"><img style="height: 50px; width: 50px;" src="<?php echo ICO;?>str.png"></a>
  <a href="#" class="control_prev"><img style="height: 50px; width: 50px;" src="<?php echo ICO;?>str2.png"></a>
  <ul>
   <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "yourpizza";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if($conn === false){
          die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM welcome";
        $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_assoc($result)) {
          
         echo "
          		
 					<li>   <div class='image'>
						<img class='picture' src='{$row["picture"]}'>
  						<h1  class='h1_class'>{$row["text"]}</h1>
						</div>
					</li>
				";      
          }
        ?>
</ul>

</div> 



