<?php

namespace App\Controllers\Agenda;

use App\Controllers\BaseController;
use App\Models\Agenda\AgendaModel;

class AgendaController extends BaseController
{
    public function listarAgenda()
    {
        $agenda = new AgendaModel();
        return $this->response->setJSON($agenda->listar());
    }

    public function listarSucursales()
    {
        $agenda = new AgendaModel();
        return $this->response->setJSON($agenda->listarSucursales());
    }


    public function listarHorariosDisponibles()
    {
        $fecha = $this->request->getPost('fecha');
        $agenda = new AgendaModel();
        $ocupados = $agenda->listarHorarioOcupados($fecha);

        // Id de horarios ocupados a la fecha
        $idOcupados = array();

        foreach($ocupados as $elemento){
            array_push($idOcupados, $elemento['horarioId']);
        }

        // Ahora llamar otro método para excluir estos horariosId ocupados
        return $this->response->setJSON($agenda->listarHorarioDisponible($idOcupados));
    }

    public function guardarCitaAgenda(){
        $datoAgenda = $this->request->getPost('citaAgenda');

        // print_r($datoAgenda);

        // Creando nueva evento
        
        $datos['numEvento'] = "CONSULTA SMILING: EVT203265";
        $datos['fechaEvento'] = $datoAgenda['fechaAgenda'];
        $datos['estado'] = $datoAgenda['estadoAgenda'];
        $datos['horarioId'] = $datoAgenda['horarioAgenda'];
        $datos['pacienteId'] = 1;
        $datos['observaciones'] = $datoAgenda['comentarioAgenda'];
        $datos['sucursalId'] = $datoAgenda['sucursalId'];

        $agenda = new AgendaModel();
        return $agenda->guardarCitaAgenda($datos);
    }
}
