<div id="ajax_login">
  <form action="">
    Login: <input type="text" name="user_login" id="user_login"><br>
    Password: <input type="password" name="user_password" id="user_password"><br>
    <input type="button" name="send_data" id="send_data" value="Send">
  </form>
</div>




<script type="text/javascript">
  $('#send_data').on('click', (function(){
    // Сначала присваеваем переменным значения из наших полей ввода
    // Доступ к полям по их ID
    var user_login = $("#user_login").val();
    var user_password = $("#user_password").val();
    
    // Это функция запроса ajax, в переменной html
    // мы сможем получить обратный текст после обработки
    var html = $.ajax({
      type: "POST",
      // Тут в качестве параметра url мы указываем на
      // controller который будет обрабатывать наши данные
      url: "http://yourpizza.com/yourpizza/index.php/ajax/login",
            data: ({
        // Перечесляем передаваемые переменные
        // Сначала идёт название которое получит controller
        // через метод post, следом наша переменная с данными
        'user_login' : user_login,
        'user_password' : user_password
      }),
            dataType: "html",
            async: false
        }).responseText;

    // Здесь мы просто перезаписываем div с id="ajax_login" данными
    // которые вернул наш controller
    $("#ajax_login").empty().append(html);
  }));
</script>
