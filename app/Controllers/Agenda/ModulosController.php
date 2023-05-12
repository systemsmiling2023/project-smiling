<?php

namespace App\Controllers\Agenda;
use App\Controllers\BaseController;

class ModulosController extends BaseController
{
    public function dashboard()
    {
        $title = [
            "titulo" => "Smiling | Dashboard"
        ];
        return view('pages/dashboard', $title);
    }

    public function agenda()
    {
        $title = [
            "titulo" => "Smiling | Agenda"
        ];
        return view('modulos/agenda/calendar', $title);
    }

    public function cumpleanero()
    {
        $title = [
            "titulo" => "Smiling | Cumpleañeros"
        ];
        return view('modulos/agenda/cumpleaneros', $title);
    }

    
}
