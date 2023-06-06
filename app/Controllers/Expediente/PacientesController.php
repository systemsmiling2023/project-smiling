<?php

namespace App\Controllers\Expediente;

use App\Controllers\BaseController;
use App\Models\Expediente\PacienteModel;
use App\Models\SistemaModel;

class PacientesController extends BaseController
{
    public function buscar()
    {
        $paciente = new PacienteModel();
        $data['pacienteId'] = $paciente->PacienteJoin();
        return $this->response->setJSON($data);
    }

    public function obtenerId()
    {
        $paciente = new PacienteModel();
        $id = $this->request->getPost('id');
        $data['pacienteId'] = $paciente->find($id);
        return $this->response->setJSON($data);
    }

    public function almacenar()
    {
        $paciente = new PacienteModel();
        $data = [
            'codPaciente' => $this->request->getPost('codPaciente'),
            'estado' => $this->request->getPost('estado'),
            'personaId' => $this->request->getPost('personaId')
        ];
        $paciente->guardarPaciente($data);
        return $paciente;
    }

    public function actualizar()
    {
        $paciente = new PacienteModel();
        $id = $this->request->getPost('id');
        $data = [
            'codPaciente' => $this->request->getPost('codPaciente'),
            'estado' => $this->request->getPost('estado'),
            'personaId' => $this->request->getPost('personaId')
        ];
        $paciente->actualizarPaciente($id, $data);
        return $paciente;
    }

    public function eliminar()
    {
        $paciente = new PacienteModel();
        $id = $this->request->getPost('id');
        $paciente->eliminarPaciente($id);
        return $paciente;
    }

    public function selectPaciente()
    {
        $paciente = new PacienteModel();
        $data['personaId'] = $paciente->nombrePaciente();
        return $this->response->setJSON($data);
    }

    public function selectMedio()
    {
        $paciente = new PacienteModel();
        $data['medioId'] = $paciente->nombreMedio();
        return $this->response->setJSON($data);
    }

    public function selectInteres()
    {
        $paciente = new PacienteModel();
        $data['interesId'] = $paciente->nombreInteres();
        return $this->response->setJSON($data);
    }

    public function selectPatologia()
    {
        $paciente = new PacienteModel();
        $data['patologiaId'] = $paciente->nombrePatologia();
        return $this->response->setJSON($data);
    }

    public function selectResponsable()
    {
        $paciente = new PacienteModel();
        $data['responsableId'] = $paciente->responsables();
        return $this->response->setJSON($data);
    }

    public function formulario()
    {
        $sistema = new SistemaModel();
        $title = [
            "titulo" => "Smiling | Paciente"
        ];
        $ruta = 'modulos/expediente/pacienteform';

        // INICIO : GUARDAR EN BITACORA
        $detalle = array();
        $detalle['tituloInterfaz'] = $title['titulo'];
        $detalle['ruta'] = $ruta;
        
        $regBitacora = array(
            'idMovimiento' => 8,
            'fechaHora' => date('Y-m-d H:i:s'),
            'idTabla' => 0,
            'tablaRelacionada' => 'pe_personas',
            'usuario' => session('usuarioId'), 
            'detalle' => json_encode($detalle)
        );
        $sistema->guardarBitacora($regBitacora);
        // FIN : GUARDAR EN BITACORA

        return view($ruta, $title);
    }

}