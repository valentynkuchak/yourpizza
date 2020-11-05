<?php namespace App\Controllers;
 
  use CodeIgniter\Controller;
 
  class Pages extends Controller {

      public function showme($page = 'welcome')
      {
        if ( !is_file(APPPATH.'/Views/pages/'.$page.'.php') )
          {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
          }
 
      $data['info'] = $page.'.php';
 
      echo view('templates/header');
      echo view('pages/'.$page, $data);
      echo view('templates/footer');
      }
  }