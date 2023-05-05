<?php

namespace App\Controllers\Configuracion;

use App\Controllers\BaseController;
use App\Models\SistemaModel;
use App\Models\Configuracion\UsuariosModel;


class UsuariosController extends BaseController
{

    public function buscar()
    {
        $usuarios = new UsuariosModel();
        $data['usuarios'] = $usuarios->mostrar();
        return $this->response->setJSON($data);
    }

    
   public function almacenar()
   {
        $usuarios = new UsuariosModel();
        $sistema = new SistemaModel();


        $username = $this->request->getPost('usuario');
        $roles = $this->request->getPost('rol');
        $clave = $this->request->getPost('clave');
        $persona = $this->request->getPost('persona');
        $clave1 = $sistema->encriptarClave($clave);

        $userExists = $usuarios->user($username);
        $userRol = $usuarios->roles($roles, $persona);
        $userclave = $usuarios->clave($clave1);

        if ($userRol){
        $result = array("ERROR" => true, "data" => 'No se permite registrar un mismo rol para este usuario');
        }else{
        if ($userExists){
            $result = array("ERROR" => true, "data" => 'No se permite registrar un mismo usuario');
        }else{

            $data = [
                'usuario' => $username,
                'clave' => $clave1,
                'intentosfallidos' => 0,
                'limiteIntentosFallidos' => 3,
                'personaId' => $persona ,
                'rolId'=> $this->request->getPost('rol')
    
            ];  
            $usuarios->guardarUsuario($data);

            $result = array("ERROR" => false, "data" => 'Usuario agregado con éxito');   
            }

            // if ($userclave){
            //     $result = array("ERROR" => true, "data" => 'No se permite registrar una misma clave');
            // }else{
               
            // }
        }
        return $this->response->setJSON($result);
    }

    

    public function obtenerId()
    {
        $usuarios = new UsuariosModel();
        $id = $this->request->getPost('id');
        $data['personas'] = $usuarios->find($id);
        return $this->response->setJSON($data);
    }

    public function eliminar()
    {
        $usuarios = new UsuariosModel();
        $id = $this->request->getPost('id');
        $usuarios->eliminarUsuarios($id);
        return $usuarios;
    }

    public function actualizar()
    {
        $usuarios = new UsuariosModel();
        $sistema = new SistemaModel();

        $username = $this->request->getPost('usuario');
        $clave = $this->request->getPost('clave');
        $clave = $sistema->encriptarClave($clave);
        $id = $this->request->getPost('id');
        $rol = $this->request->getPost('rol');
        $persona = $this->request->getPost('persona');

        $data = [
            'rolId' => $rol,
            'usuario' => $username,
            'clave' => $clave,

        ];  
        $usuarios->actualizarUsuario($id,$data);
        

 
        return $usuarios;
    }


    public function persona()
    {
        $usuarios = new UsuariosModel();
        $data['personas'] = $usuarios->mostrarPersona();
        return $this->response->setJSON($data);
    }

    public function rol()
    {
        $usuarios = new UsuariosModel();
        $data['roles'] = $usuarios->mostrarRol();
        return $this->response->setJSON($data);
    }

    public function verificarUsuario()
    {
        $usuarios = new UsuariosModel();
        $userVe = $this->request->getPost('usuario');

        if($usuarios->user($userVe)){
            $result = array("data" => 'Existe');
        } else {
            $result = array("data"  => 'Agregar');
        }
        return $this->response->setJSON($result);

    }
}