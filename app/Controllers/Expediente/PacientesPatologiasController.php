<?php

namespace App\Controllers\Expediente;

use App\Controllers\BaseController;
use App\Models\Expediente\PacienteModel;
use App\Models\Expediente\PacientePatologiaModel;
use App\Models\SistemaModel;

class PacientesPatologiasController extends BaseController
{
    public function buscar()
    {
        $pacPatologia = new PacientePatologiaModel();
        $pacienteId = $this->request->getPost('id');
        $data['patologiaPacienteId'] = $pacPatologia->pacPatologiaJoin($pacienteId);
        return $this->response->setJSON($data);
    }

    public function obtenerId()
    {
        $pacPatologia = new PacientePatologiaModel();
        $id = $this->request->getPost('id');
        $data['patologiaPacienteId'] = $pacPatologia->find($id);
        return $this->response->setJSON($data);
    }

    public function almacenar()
    {
        $pacPatologia = new PacientePatologiaModel();
        $data = [
            'patologiaId' => $this->request->getPost('patologiaId'),
            'pacienteId' => $this->request->getPost('pacienteId'),
        ];
        $pacPatologia->guardarPacPatologias($data);
        
        return $pacPatologia;
    }

    public function eliminar()
    {
        $pacPatologia = new PacientePatologiaModel();
        $id = $this->request->getPost('id');
        $pacPatologia->eliminarPacPatologias($id);
        return $pacPatologia;
    }
}