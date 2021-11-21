<?php

namespace App\Http\Controllers;

use App\Models\maintenance;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $count_main = 0;
        for ($i=1; $i <= 12; $i++) { 
            $main = maintenance::whereMonth('tanggal_maintenance' , "=" , $i)->whereYear('tanggal_maintenance' , '=' , date('Y'))->count();
            $data['main_'.$i] = $main;
            $count_main += $main;
        }
        $data['tahun'] = date('Y');
        $data['count'] = $count_main;
        return view('show' , $data);
    }
}
