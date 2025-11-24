<?php

namespace App\Controllers;

class Home extends BaseController
{
  public function index()
  {
    echo view('layout_user/header');
    echo view('layout_user/index');
    echo view('layout_user/footer');
  }

  public function index()
    {
        return view('home'); // pastikan viewnya ada
    }
}
