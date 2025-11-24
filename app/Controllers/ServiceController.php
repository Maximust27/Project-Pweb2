<?php

namespace App\Controllers;

class ServiceController extends BaseController
{
    public function edit()
    {
        return view('admin/edit_service', ['service' => $service]);
    }
}
