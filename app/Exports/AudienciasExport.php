<?php

namespace App\Exports;

use App\Models\Audiencia;
use Maatwebsite\Excel\Concerns\FromCollection;

class AudienciasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Audiencia::all();
    }
}
