<?php

namespace App\Controllers\Expediente;

use App\Controllers\BaseController;
use App\Models\Expediente\PacienteModel;
use App\Models\Expediente\PacienteMedioModel;
use App\Models\SistemaModel;

class PacientesMediosController extends BaseController
{
    public function buscar()
    {
        $pacMedios = new PacienteMedioModel();
        $pacienteId = $this->request->getPost('id');
        $data['pacMedId'] = $pacMedios->pacMediosJoin($pacienteId);
        return $this->response->setJSON($data);
    }

    public function obtenerId()
    {
        $pacMedios = new PacienteMedioModel();
        $id = $this->request->getPost('id');
        $data['pacMedId'] = $pacMedios->find($id);
        return $this->response->setJSON($data);
    }

    public function almacenar()
    {
        $pacMedios = new PacienteMedioModel();
        $data = [
            'medioId' => $this->request->getPost('medioId'),
            'fechaRegistro' => $this->request->getPost('fechaRegistro'),
            'pacienteId' => $this->request->getPost('pacienteId')
        ];
        $pacMedios->guardarPacMedio($data);
        
        return $pacMedios;
    }

    public function eliminar()
    {
        $pacMedios = new PacienteMedioModel();
        $id = $this->request->getPost('id');
        $pacMedios->eliminarPacMedio($id);
        return $pacMedios;
    }
}