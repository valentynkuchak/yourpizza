<body>
<div class="pizzas">
 <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "yourpizza";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

     

        $sql = "SELECT * FROM recepts";
        $result = mysqli_query($conn, $sql);
        
          while($row = mysqli_fetch_assoc($result)) {
            
           
       echo "
       
        <div class='pizza_item'>
            <img src='{$row["picture"]}'>
            <h3> Піца: <span class='pizza_name'>{$row["name"]} </span>
              Ціна: <span class='pizza_price'>{$row["price"]}</span>грн
            </h3>
            <h3 class='order_list'>Склад: {$row["ingredients"]}</h3>
            <a class='order_btn' >Замовити</a>           
        </div>" ; 
      } ?>

        </div> 



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
  <h2 id="modal_list"></h2>
   <h2 id="modal_order"></h2>
      <a class="button zakaz total" name="send_data" id="send_data" style="    float: right;
    width: 6em;">Підтвердити замовлення</a>

  </form>  </div>

</div>



</body>


<script type="text/javascript">

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var bucket = document.getElementById("bucket");


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// When the user clicks on the button, open the modal

bucket.onclick = function() {
  modal.style.display = "block";
}


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
 $('.order_btn').on('click', (function(){

        let pizza_name = $(this).parent().find('.pizza_name').text();
        let pizza_price = $(this).parent().find('.pizza_price').text();
        let order_list = $(this).parent().find('.order_list').text();

        let block = '<div class="order"><p>Піца: <span class = "order_name">'+pizza_name+'</span> Ціна: <span class="order_price">'+pizza_price+'</span></p><p class="order_sklad"> '+ order_list+'</p></div>'
        $modal_list=$('#modal_order');
        $modal_list.append(block);


        console.log(pizza_name);
        alert('Додано в корзину!');
    }));

    $('#send_data').click(function () {
        $('#modal_order').children().each(function () {
            let name = $(this).find('.order_name').text();
            let price = $(this).find('.order_price').text();
            let sklad = $(this).find('.order_sklad').text().substr(7);
            let user = $('#name').val();
            let address = $('#address').val();
            let number = $('#number').val();
            console.log(price);
            $.ajax({
                
                    type: "POST",
                    url: "http://yourpizza.com/yourpizza/index.php/ajax/pizza_order",
                    data: ({
                        'name' : user,
                        'address' : address,
                        'number' : number,
                        'ingredients' : sklad,
                        'pizza_name': name,
                        'currentPrice': price
                    }),
                    dataType: "html",
                    async: false

            })
        })
        
    })
</script> 