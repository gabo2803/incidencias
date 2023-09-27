<?php
namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class EquiposExport implements FromView
{
    public $equipos;

    public function __construct($equipos)
    {
        $this->equipos = $equipos;
    }

    public function view(): View
    {
        return view('equipos.export', [
            'equipos' => $this->equipos,
        ]);
    }
}
