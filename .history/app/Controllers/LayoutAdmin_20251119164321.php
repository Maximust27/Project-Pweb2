<?php

namespace App\Controllers;

class LayoutAdmin extends BaseController
{
    public function sidebar()
    {
        return view('layout_admin/sidebar');
    }

    public function service()
    {
        return view('layout_admin/service');
    }
}
