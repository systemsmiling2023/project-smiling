<?php

namespace App\Controllers;

use App\Models\FranjaHorarioModel;


class FranjaHorarioController extends BaseController
{
    public function buscar()
    {
        $franjahorario = new FranjaHorarioModel();
        $data['franjaHorario'] = $franjahorario->findAll();
        return $this->response->setJSON($data);
        // return $data;
    }

    
    public function almacenar()
    {
        $franjahorario = new FranjaHorarioModel();
        $dia = $this->request->getPost('dia');
        $hIni = $this->request->getPost('hIni');

        $horaExists = $franjahorario->consultar($dia,$hIni);

        if ($horaExists){
            $result = array("ERROR" => true, "data" => 'No se permite ingresar este horario');
        }else{
            $data = [
                'diaSemana' => $dia,
                'horaInicio' => $hIni,
                'horaFinal' => $this->request->getPost('hFin'),
                'fechaRegistro' => $this->request->getPost('fecha'),
                'estado' => $this->request->getPost('estadofranja')
    
            ];
            $franjahorario->guardarFranja($data);
            $result = array("ERROR" => false, "data" => 'Horario agregado con éxito');

        }
        return $this->response->setJSON($result);
    }

    public function obtenerId()
    {
        $franjahorario = new FranjaHorarioModel();
        $id = $this->request->getPost('id');
        $data['franjaHorario'] = $franjahorario->find($id);
        return $this->response->setJSON($data);

    }

    public function actualizar()
    {
        $franjahorario = new FranjaHorarioModel();
        $id = $this->request->getPost('id');
        $data = [
            'diaSemana' => $this->request->getPost('dia'),
            'horaInicio' => $this->request->getPost('hIni'),
            'horaFinal' => $this->request->getPost('hFin'),
            'estado' => $this->request->getPost('estadofranja')
        ];
        $franjahorario->actualizarFranjaHorario($id, $data);
        return $franjahorario;
    }

    public function eliminar()
    {
        $franjahorario = new FranjaHorarioModel();
        $id = $this->request->getPost('id');
        $franjahorario->eliminarFranjaHorario($id);
        return $franjahorario;
    }
}