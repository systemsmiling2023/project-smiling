<?php

namespace App\Controllers;

use App\Models\ProfesionesModel;

class ProfesionesController extends BaseController
{
    public function buscar()
    {
        $profesiones = new ProfesionesModel();
        $data['profesiones'] = $profesiones->findAll();
        return $this->response->setJSON($data);
        // return $data;
    }

    public function obtenerId()
    {
        $profesiones = new ProfesionesModel();
        $id = $this->request->getPost('id');
        $data['profesion'] = $profesiones->find($id);
        return $this->response->setJSON($data);
    }

    public function almacenar()
    {
        $profesiones = new ProfesionesModel();
        $data = [
            'profesion' => $this->request->getPost('profesion')
        ];
        $profesiones->guardarProfesion($data);
        return $profesiones;
    }

    public function actualizar()
    {
        $profesiones = new ProfesionesModel();
        $id = $this->request->getPost('id');
        $data = [
            'profesion' => $this->request->getPost('profesion')
        ];
        $profesiones->actualizarProfesion($id, $data);
        return $profesiones;
    }

    public function eliminar()
    {
        $profesiones = new ProfesionesModel();
        $id = $this->request->getPost('id');
        $profesiones->eliminarProfesion($id);
        return $profesiones;
    }
}
