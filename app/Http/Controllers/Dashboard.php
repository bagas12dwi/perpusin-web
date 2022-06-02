<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    //
    public function indexAdminPerpus()
    {
        # code...
        return view('adm-perpus.dashboard', [
            'title' => 'Dashboard'
        ]);
    }
}
