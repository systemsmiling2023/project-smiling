<?php

namespace App\Models;

// use App\Models\SistemaModel;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class LoginModel extends Model
{

    protected $request;
    protected $model;
    protected $db;
    protected $builder;
    // protected $bitacora;

    public function __construct()
    {

        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('co_usuarios');
    }

    // FUNCION PARA VALIDAR LOS DATOS DE LOGIN
    public function validarLogin($usuario, $clave)
    {
        // CONSULTANDO SI ESTÁ BLOQUEADO EL USUARIO
        $this->builder->select('intentosFallidos, limiteIntentosFallidos');
        $this->builder->where('usuario', $usuario);
        $this->builder->limit(1);

        $get = $this->builder->get();


        $intentos = $get->getFirstRow();
        $intentos = json_decode(json_encode($intentos), true);

        // VALIDANDO LOS INTENTOS FALLIDOS
        if (intval($intentos['intentosFallidos']) >= intval($intentos['limiteIntentosFallidos'])) {
            $result = array('ERROR' => true, 'dato' => 'USUARIO BLOQUEADO');
        } else {
            // SI NO ESTÁ BLOQUEADO CONSULTAR LOS DATOS PARA ACCEDER
            $this->builder->select('clave');
            $this->builder->where('usuario', $usuario);
            $this->builder->orwhere('clave', $clave);
            $this->builder->limit(1);

            $query = $this->builder->get();

            // SI LA CONSULTA NO DEVUELVE RESULTADO, PROBLEMA DE CREDENCIALES
            if ($query->getNumRows() == 0) {
                $result = array('ERROR' => true, 'dato' => 'CREDENCIALES INCORRECTAS');
            } else {

                $row   = $query->getFirstRow();
                $array = json_decode(json_encode($row), true);

                // SI LA CLAVE ENCRIPTADA ES VERIFICADA
                if (password_verify($clave, $array["clave"])) {
                    $result = array('ERROR' => false, 'dato' => 'BIENVENIDO');
                } else {
                    // SI LA CLAVE NO ES, AUMENTAR UN INTENTO FALLIDO
                    $this->builder->set('intentosFallidos', 'intentosFallidos+1', false);
                    $this->builder->where('usuario', $usuario);
                    $this->builder->update();

                    // GUARDAR DETALLE EN BITACORA
                    // $this->bitacora->bitacora(3, 1, 'Intento fallido al iniciar sesión', 1, 'co_usuarios');
                    // var_dump($this->bitacora);

                    $result = array('ERROR' => true, 'dato' => 'ACCESO DENEGADO');
                }
            }
        }

        return json_encode($result);
    }

    // FUNCION PARA AGREGAR UN USUARIO AL SISTEMA
    public function addUser($data)
    {
        $this->builder->insert($data);
    }
}
