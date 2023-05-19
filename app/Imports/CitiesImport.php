<?php

namespace App\Imports;

use App\Models\City;
use App\Models\Country;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;

class CitiesImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            $country = Country::where('name', $row[1])->first();

            if($country != NULL){
                City::create([
                    'name' => $row[0],
                    'country_id' => $country['id']
                ]);
            }
        }
    }
}