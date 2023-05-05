<?php

namespace App\Controllers\Configuracion;

use App\Controllers\BaseController;
use App\Models\Configuracion\CargoModel;

class CargoController extends BaseController
{
    public function buscarCargo()
    {
        $cargo = new CargoModel();
        $data['cargo'] = $cargo->findAll();
        return $this->response->setJSON($data);
        // return $data;
    }

    public function getCargoId()
    {
        $cargo = new CargoModel();
        $id = $this->request->getPost('id');
        $data['cargo'] = $cargo->find($id);
        return $this->response->setJSON($data);
    }

    public function almacenarCargo()
    {
        $cargo = new CargoModel();
        $data = [
            'cargo' => $this->request->getPost('cargo')
        ];
        $cargo->guardarCargo($data);
        return $cargo;
    }

    public function actualizarCargo()
    {
        $cargo = new CargoModel();
        $id = $this->request->getPost('id');
        $data = [
            'cargo' => $this->request->getPost('cargo')
        ];
        $cargo->actualizarCargo($id, $data);
        return $cargo;
    }

    public function borrarCargo()
    {
        $cargo = new CargoModel();
        $id = $this->request->getPost('id');
        $cargo->eliminarCargo($id);
        return $cargo;
    }
}
