<?php

namespace App\Models\Agenda;

use CodeIgniter\Model;

class AgendaModel extends Model
{

    public function listar()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('ag_agenda a');
        $builder->select("a.numEvento title,
                          a.observaciones descripcion,
                          concat(a.fechaEvento, ' ', b.horaInicio) as start,
                          concat(a.fechaEvento, ' ', b.horaFinal) as end,
                          '#EDEDED' as textColor,
                          '#1CC6D8' as backgroundColor");
        $builder->join('ag_franja_horarios b', 'a.horarioId = b.horarioId');
        $datos = $builder->get()->getResultArray();
        return $datos;
    }

    public function listarSucursales(){
        $db = \Config\Database::connect();
        $builder = $db->table('co_sucursales');
        $builder->select("sucursalId, referencia");
        $datos = $builder->get()->getResultArray();
        return $datos;
    }

    public function listarHorarioOcupados($fecha){
        $db = \Config\Database::connect();
        $fechasOcupadas = $db->table('ag_agenda');
        $fechasOcupadas->select('horarioId');
        $fechasOcupadas->where('fechaEvento', $fecha);
        $datos = $fechasOcupadas->get()->getResultArray();
        return $datos;

    }

    public function listarHorarioDisponible($horarios){
        $db = \Config\Database::connect();
        $fechasDisponibles = $db->table('ag_franja_horarios');
        $fechasDisponibles->select('horarioId, horaInicio');
        
        if(count($horarios)!=0){
            $fechasDisponibles->whereNotIn('horarioId', $horarios);
        }
        
        $datos = $fechasDisponibles->get()->getResultArray();
        return $datos;

    }

    public function guardarCitaAgenda($data){
        $db = \Config\Database::connect();
        $builder = $db->table('ag_agenda');
        $insert = $builder->insert($data);
    }
}
