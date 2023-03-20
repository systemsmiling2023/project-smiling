<?php

namespace App\Controllers;

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

    public function tipodocumento()
    {
        $title = [
            "titulo" => "Smiling | Tipo de Documento"
        ];
        return view('modulos/configuracion/tipodocumento', $title);
    }
}
