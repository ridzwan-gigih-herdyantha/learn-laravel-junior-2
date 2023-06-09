<?php

namespace App\Exports;

use App\Models\City;
use Maatwebsite\Excel\Concerns\FromCollection;

class CitiesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return City::all();
    }
}
