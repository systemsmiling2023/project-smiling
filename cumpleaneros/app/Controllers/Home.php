<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Home extends BaseController
{
    protected $request;
    protected $db;

    public function __construct()
    {
        $this->db = new LoginModel();
    }

    public function index()
    {
        return view('login');
    }

    public function contacto()
    {
        return view('contacto');
    }

    public function addUser()
    {
        $usuario = $this->request->getPost('usuario');
        $clave = $this->request->getPost('clave');

        $data = [
            'nombreUsuario' => $usuario,
            'claveUsuario' => password_hash($clave, PASSWORD_DEFAULT),
            'fechaCreaUsuario' => date('Y-m-d H:i:s'),
            'idPersona' => 1,
            'idRol' => 1,
            'estadoUsuario' => 'ACTIVO'
        ];

        echo $this->db->addUser($data);
    }
}
