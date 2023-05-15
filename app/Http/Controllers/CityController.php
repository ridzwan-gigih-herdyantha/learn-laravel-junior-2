<?php

namespace App\Http\Controllers;

use App\Exports\CitiesExport;
use App\Models\City;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        $active = 'city';
        $title = 'city';
        return view('cities', compact('cities', 'active', 'title'));
    }

    public function export() 
    {
        return Excel::download(new CitiesExport, 'city.xlsx');
    }
}
