<?php namespace App\Controllers;
 
  use CodeIgniter\Controller;
 
  class Ajax extends Controller {
  	
  	public function const_order() {
	
		$ingredients=isset($_POST['ingredients']) ? $_POST['ingredients'] : NULL;
		$currentPrice=isset($_POST['currentPrice']) ? $_POST['currentPrice'] : NULL;
    $user=isset($_POST['name']) ? $_POST['name'] : NULL;
    $address=isset($_POST['address']) ? $_POST['address'] : NULL;
    $number=isset($_POST['number']) ? $_POST['number'] : NULL;
    $date=date('Y-m-d H:i:s');
    $pizza_name='Конструктор';
		$db = db_connect();

		$data = [
        'name' => $user,
        'address' => $address,
        'number' => $number,
        'ingredients' => $ingredients,
        'price' => $currentPrice,
        'pizza_name' => $pizza_name, 
        'date' => $date
       ];
		$db->table('orders')->insert($data);
	}
  public function pizza_order() {
  
    $ingredients=isset($_POST['ingredients']) ? $_POST['ingredients'] : NULL;
    $currentPrice=isset($_POST['currentPrice']) ? $_POST['currentPrice'] : NULL;
    $pizza_name=isset($_POST['pizza_name']) ? $_POST['pizza_name'] : NULL;
    $user=isset($_POST['name']) ? $_POST['name'] : NULL;
    $address=isset($_POST['address']) ? $_POST['address'] : NULL;
    $number=isset($_POST['number']) ? $_POST['number'] : NULL;
    $date=date('Y-m-d H:i:s');

    $db = db_connect();

    $data = [
        'name' => $user,
        'address' => $address,
        'number' => $number,
        'ingredients' => $ingredients,
        'price' => $currentPrice,
        'pizza_name' => $pizza_name, 
        'date' => $date
       ];
    $db->table('orders')->insert($data);
  }
  }