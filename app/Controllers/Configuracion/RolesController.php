<?php

namespace App\Controllers\Configuracion;

use App\Controllers\BaseController;
use App\Models\Configuracion\RolModel;

class RolesController extends BaseController
{
    public function buscarRol()
    {
        $rol = new RolModel();
        $data['rol'] = $rol->findAll();
        return $this->response->setJSON($data);
        // return $data;
    }

    public function obtenerRolId()
    {
        $rol = new RolModel();
        $id = $this->request->getPost('id');
        $data['rol'] = $rol->find($id);
        return $this->response->setJSON($data);
    }

    public function almacenarRol()
    {
        $rol = new RolModel();
        $data = [
            'rol' => $this->request->getPost('rol'),
            'descripcion' => $this->request->getPost('descripcion'),
            'estado' => $this->request->getPost('estado')
        ];
        $rol->guardarRol($data);
        return $rol;
    }

    public function actualizarRol()
    {
        $rol = new RolModel();
        $id = $this->request->getPost('id');
        $data = [
            'rol' => $this->request->getPost('rol'),
            'descripcion' => $this->request->getPost('descripcion'),
            'estado' => $this->request->getPost('estado')
        ];
        $rol->actualizarRol($id, $data);
        return $rol;
    }

    public function eliminarRol()
    {
        $rol = new RolModel();
        $id = $this->request->getPost('id');
        $rol->eliminarRol($id);
        return $rol;
    }
}
