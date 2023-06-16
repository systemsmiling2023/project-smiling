<?php

namespace App\Controllers\Expediente;

use App\Controllers\BaseController;
use App\Models\Expediente\PacienteModel;
use App\Models\Expediente\PacienteInteresModel;
use App\Models\SistemaModel;

class PacientesInteresController extends BaseController
{
    public function buscar()
    {
        $pacInteres = new PacienteInteresModel();
        $pacienteId = $this->request->getPost('id');
        $data['interesPacienteId'] = $pacInteres->pacInteresJoin($pacienteId);
        return $this->response->setJSON($data);
    }

    public function obtenerId()
    {
        $pacInteres = new PacienteInteresModel();
        $id = $this->request->getPost('id');
        $data['interesPacienteId'] = $pacInteres->find($id);
        return $this->response->setJSON($data);
    }

    public function almacenar()
    {
        $pacInteres = new PacienteInteresModel();
        $data = [
            'interesPacienteId' => $this->request->getPost('interesPacienteId'),
            'interesId' => $this->request->getPost('interesId'),
            'pacienteId' => $this->request->getPost('pacienteId')
        ];
        $pacInteres->guardarPacInteres($data);
        
        return $pacInteres;
    }

    public function eliminar()
    {
        $pacInteres = new PacienteInteresModel();
        $id = $this->request->getPost('id');
        $pacInteres->eliminarPacInteres($id);
        return $pacInteres;
    }
}