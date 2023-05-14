<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\SessionModel;
use App\Models\SistemaModel;
use CodeIgniter\Controller;



class LoginController extends BaseController
{
    protected $request;
    protected $db;
    protected $bitacora;
    

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

    public function registro()
    {
        $title = [
            "titulo" => "Smiling | Registro"
        ];
        return view('registro', $title);
    }

    public function validar()
    {
        $usuario = $this->request->getPost('usuario');
        $clave = $this->request->getPost('clave');

        $login = new LoginModel();
        $sesion = new SessionModel();
        $sistema = new SistemaModel();

        $dat['cantidad'] = $login->buscarUsuario($usuario);
        $cantUsuario = intval($dat['cantidad'][0]['usuario']);

        if($cantUsuario==1){
            $data['usuario'] = $login->validarLogin($usuario);
            $usuario = $data['usuario'][0];
    
            // Saber si está bloqueado
            if ($usuario['intentosFallidos'] >= $usuario['limiteIntentosFallidos']) {

                // GUARDAR EN BITACORA COMO USUARIO BLOQUEADO
                $regBitacora = array(
                    'idMovimiento' => 4,
                    'fechaHora' => date('Y-m-d H:i:s'),
                    'idTabla' => 0,
                    'tablaRelacionada' => 'co_usuarios',
                    'usuario' => $usuario['usuarioId'],
                    'detalle' => 'Usuario Bloqueado'
                );
    
                $sistema->guardarBitacora($regBitacora);
                $result = array('ERROR' => true, 'dato' => 'ACCESO DENEGADO: USUARIO BLOQUEADO <br> [Por favor comuníquese con el administrador del sistema]');
            } else {
                // SI LA CLAVE ENCRIPTADA ES VERIFICADA
                if ($sistema->verificarClave($clave, $usuario['clave'])) {
    
                    // Aqui ya hemos accedido, creamos variables de sesion
                    $persona  = $usuario['nombres'] . ' ' . $usuario['primerApellido'];
                    $userName = $usuario['usuario'];
                    $usuarioId = $usuario['usuarioId'];
                    $personaId = $usuario['personaId'];
                    $rolId = $usuario['rolId'];
                    $sexo = $usuario['sexo'];
    
                    $sesionData = array(
                        'usuario' => $userName,
                        'persona' => $persona,
                        'usuarioId' => $usuarioId,
                        'personaId' => $personaId,
                        'rolId' => $rolId,
                        'sexo' => $sexo
                    );
                    $sesion->crearSesion($sesionData);
    
                    // GUARDAR EN BITACORA COMO INICIO DE SESION
                    $regBitacora = array(
                        'idMovimiento' => 1,
                        'fechaHora' => date('Y-m-d H:i:s'),
                        'idTabla' => 0,
                        'tablaRelacionada' => 'co_usuarios',
                        'usuario' => $usuario['usuarioId'], 
                        'detalle' => 'Inicio de sesión'
                    );
    
                    // Guardarmos bitacora y devolvemos el resultado para la vista
                    $sistema->guardarBitacora($regBitacora);
                    $login->reiniciarIntentosFallidos($usuario['usuario']);
                    $result = array('ERROR' => false, 'dato' => 'BIENVENIDO');
                } else {
                    // SI LA CLAVE NO ES, AUMENTAR UN INTENTO FALLIDO
                    $login->intentoFallido($usuario['usuario']);
    
                    // GUARDAR EN BITACORA COMO INTENTO FALLIDO
                    $regBitacora = array(
                        'idMovimiento' => 3,
                        'fechaHora' => date('Y-m-d H:i:s'),
                        'idTabla' => 0,
                        'tablaRelacionada' => 'co_usuarios',
                        'usuario' => $usuario['usuarioId'],
                        'detalle' => 'Intento fallido'
                    );
    
                    $sistema->guardarBitacora($regBitacora);
                    $result = array('ERROR' => true, 'dato' => 'DATOS INCORRECTOS, POR FAVOR VERIQUE CREDENCIALES');
                }
            }
        }else{
            $result = array('ERROR' => true, 'dato' => 'USUARIO NO ENCONTRADO, POR FAVOR VERIQUE CREDENCIALES');
        }

        echo json_encode($result);
    }

    public function salir()
    {
        $sesion = new SessionModel();
        $sistema = new SistemaModel();

        // GUARDAR EN BITACORA COMO INTENTO FALLIDO
        $regBitacora = array(
            'idMovimiento' => 2,
            'fechaHora' => date('Y-m-d H:i:s'),
            'idTabla' => 0,
            'tablaRelacionada' => 'co_usuarios',
            'usuario' => session('usuarioId'),
            'detalle' => 'Salida del sistema'
        );


        $sistema->guardarBitacora($regBitacora);

        $sesion->eliminarSesion();
        return redirect()->to('login');
    }
}
