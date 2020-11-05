<body>

  <div class="container row">
    <div class="column" style="width: 40%">  
      <h1 class="ing_text">Інгрідієнти</h1>
      <div class="ingr">
      
 <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "yourpizza";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if($conn === false){
          die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM ingredients";
        $result = mysqli_query($conn, $sql);
        $currentType = '';
        $previewType = '';
        $product = '';
        $lengt = mysqli_num_rows($result);
        $iter=0;
          while($row = mysqli_fetch_assoc($result)) {
            
           $currentType=$row["type"];
           
           if (($currentType != $previewType && $previewType != '') || $lengt-1==$iter ){

            if($lengt-1==$iter){

                $product .="
         <label class='switch'>
            <div class='const_item'>
              <img src='{$row["block_img"]}'>
                  <div><h3>{$row["name"]}</h3>
                 <h3>{$row["gram"]}</h3></div>

                  <p style='display: none'>{$row["name"]}</p>
                    <input style='display:none' type='checkbox' class='ingredient checkbox' data-image='{$row["pizza_img"]}' data-ingredient-id='{$row["price"]}' class='hidden'>
                     </div>
                  </label>  
           " ; 


            }

            echo " 
              <div class='test'>
                <h2 style='text-align: center;width: 100%;'>{$previewType}</h2>
                  <div style='display: flex;flex-direction: row;flex-wrap: wrap;'> ". 
                  $product . " </div></div>";

            $product='';



           }
             $previewType=$row["type"];
         $product .="
         <label class='switch'>
            <div class='const_item'>
              <img src='{$row["block_img"]}'>
                <div><h3>{$row["name"]}</h3>
                <h3>{$row["gram"]}</h3></div>
                  <p style='display: none'>{$row["name"]}</p>
                    <input style='display:none' type='checkbox' class='ingredient checkbox' data-image='{$row["pizza_img"]}' data-ingredient-id='{$row["price"]}' class='hidden'>
                     </div>
                  </label>  
           " ; 
         
           $iter++;
          }
        ?>
</div>
    </div>  

      <div class="center" id="base"></div>
      <div class="column" style="margin-right: 50px; width: 20%;">
      <h1 class="sklad napys">Склад</h1>
      <div id="ajax_login">
      <form action="">
      <ul id="orderlist" class="list" name="sklad"></ul>
      <div id="buttons" class="button" ></div> 
      <a class="button zakaz total order_btn zakaz_btn" name="zakaz" id="zakaz" style="display: none">Замовити</a>
    </form>
  </div>
 </div>

     </div>

</body>


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
 <form action="">
  <h1>Для замовлення вкажіть будь-ласка свої дані</h1>
    Ім'я: <input type="text" name="name" id="name">
    Номер телефону: <input type="text" name="number" id="number"><br>
    Адреса: <input type="text" name="address" id="address"><br>
  <h2>Піца користувацька</h2>
  <h2 id="modal_price">Ціна:</h2>
  <ul id="modal_list" style="font-size: 25px">Склад:</ul>
      <a class="button zakaz total order_btn" name="send_data" id="send_data" style="    float: right;
    width: 6em;">Підтвердити замовлення</a>

  </form>  </div>

</div>


<script src="<?php echo JS;?>func.js" type="text/javascript"></script>
<script src="<?php echo JS;?>modal.js" type="text/javascript"></script>

<script type="text/javascript">
  $('.zakaz_btn').on('click', (function(){
     let ingredients = '';
    $('#orderlist > li').each(function(){
        str = $(this).text() 
        ingredients+=(str.substring(0,str.length-6) )  
    })
    let currentPrice = $('.total').data('total-price');
           
    $modal_list=$('#modal_list');
    $modal_list.text('Склад:'+ingredients);
    $modal_price=$('#modal_price');
    $modal_price.text('Ціна:'+currentPrice);
   
  
  
  }));
    $('#send_data').click(function () {
        let ingrid = $('#modal_list').text().substr(6);
        let price = $('#modal_price').text().substr(5);
      let user = $('#name').val();
      let address = $('#address').val();
      let number = $('#number').val();
    
      $.ajax({
            type: "POST",
            url: "http://yourpizza.com/yourpizza/index.php/ajax/const_order",
            data: ({
                'name' : user,
                'address' : address,
                'number' : number,
                'currentPrice' : price,
                'ingredients': ingrid
      }),
            dataType: "html",
            async: false
       
        })
            location.reload();
   alert('Замовлення виконано!');
    })
</script> 
