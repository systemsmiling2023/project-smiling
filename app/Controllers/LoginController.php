<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\SistemaModel;
use CodeIgniter\Controller;

class LoginController extends BaseController
{
    protected $request;
    protected $db;
    protected $bitacora;

    public function __construct()
    {
        $this->db = new LoginModel();
        $this->bitacora = new SistemaModel();
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

        $respuesta = $this->db->validarLogin($usuario, $clave);
        // $datos = (array) json_decode($respuesta);

        $data['idMovimiento'] = 1;
        $data['fechaHora'] = date('Y-m-d H:i:s');
        $data['idTabla'] = 0;
        $data['tablaRelacionada'] = 'co_usuarios';
        $data['usuario'] = $usuario;
        $data['detalle'] = 'Iniciamos';
        // $this->bitacora->bitacora($data);

        echo $respuesta;
    }
}
