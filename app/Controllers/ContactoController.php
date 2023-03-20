<?php

namespace App\Controllers;

class ContactoController extends BaseController
{
    public function index()
    {
        // Parámetros
        $params = [
            'titulo' => 'Codeigniter | Contacto'
        ];

        // Múltiples vistas
        $vista =
            view('contacto/header', $params) .
            view('contacto/navegacion') .
            view('contacto/inicio') .
            view('contacto/footer');
        return $vista;
    }

    public function documentacion()
    {
        // Parámetros
        $params = [
            'titulo' => 'Codeigniter | Documentación'
        ];

        $numero = rand(5, 15);

        $params2 = [
            'numero' => $numero
        ];

        // Múltiples vistas
        $vista =
            view('contacto/header', $params) .
            view('contacto/navegacion') .
            view('contacto/documentacion', $params2) .
            view('contacto/footer');
        return $vista;
    }

    public function recibirDatos()
    {
        $nombre = $_POST['nombre'] . ' ' . $_POST['apellido'];
        // Parámetros
        $params = [
            'titulo' => 'Codeigniter | Datos POST',
            'nombre' => $nombre
        ];

        // Múltiples vistas
        $vista =
            view('contacto/header', $params) .
            view('contacto/navegacion') .
            view('contacto/recibiendoDatos', $params) .
            view('contacto/footer');
        return $vista;
    }
}
