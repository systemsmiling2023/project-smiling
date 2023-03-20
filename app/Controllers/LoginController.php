<?php

namespace App\Controllers;

use App\Models\LoginModel;
use CodeIgniter\Controller;

class LoginController extends BaseController
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

    public function home()
    {
        $title = [
            "titulo" => "Smiling | Home"
        ];
        return view('home', $title);
    }

    public function validar()
    {
        $usuario = $this->request->getPost('usuario');
        $clave = $this->request->getPost('clave');

        echo $this->db->validarLogin($usuario, $clave);
    }
}
