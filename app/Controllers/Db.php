<?php namespace App\Controllers;
 
  use CodeIgniter\Controller;
 
  class Db extends Controller {

//   	public function table()
//       {

// $db = db_connect();
//       	$query = $db->table('ingredients')->get();

// foreach ($query->getResult() as $row)
// {
//         echo $row->id;
//         echo $row->name;
//         echo $row->type;
//         echo $row->price;
// }
// }
	public function new() {
$db = db_connect();
$ingredients='ingredients';
$price='price';

$data = [
        'ingredients' => $ingredients,
        'price'  => $price,
];
print_r($data);
// $db->table('orders')->insert($data);
}















  }
