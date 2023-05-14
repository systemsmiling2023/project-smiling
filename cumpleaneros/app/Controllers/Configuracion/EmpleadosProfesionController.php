<?php

namespace App\Controllers\Configuracion;

use App\Controllers\BaseController;
use App\Models\Configuracion\EmpleadoProfesionModel;
use App\Models\SistemaModel;

// use Config\Services;

class EmpleadosProfesionController extends BaseController
{

    public function buscar()
    {
        $empleadoProfesion = new EmpleadoProfesionModel();
        $empleadoId = $this->request->getPost('id');

        $data['empProfId'] = $empleadoProfesion->EmpleadoProfesionJoin($empleadoId);
        return $this->response->setJSON($data);
    }

    public function obtenerId()
    {
        $empleadoProfesion = new EmpleadoProfesionModel();
        $id = $this->request->getPost('id');
        $data['profesionId'] = $empleadoProfesion->find($id);
        return $this->response->setJSON($data);
    }

    public function almacenar()
    {
        $empleadoProfesion = new EmpleadoProfesionModel();
        $sistema = new SistemaModel();

        $data = [
            'empProfId' => $this->request->getPost('empProfId'),
            'empleadoId' => $this->request->getPost('empleadoId'),
            'profesionId' => $this->request->getPost('profesionId')
        ];

        $dataValidar = [
            'empleadoId' => $this->request->getPost('empleadoId'),
            'profesionId' => $this->request->getPost('profesionId')
        ];

        if($sistema->validarExistencia('co_empleado_profesion', $dataValidar)){
            $empleadoProfesion->guardarEmpleadoProfesion($data);
            // return $empleadoProfesion;
            $result = array('ERROR'=>false, 'dato'=> 'Agregado con éxito');
        }else{
            $result = array('ERROR'=>true, 'dato'=> 'No puedes duplicar profesión al mismo empleado');
        }

        return json_encode($result);
    }

    public function actualizar()
    {
        $empleadoProfesion = new EmpleadoProfesionModel();
        $id = $this->request->getPost('id');
        $data = [
            'empProfId' => $this->request->getPost('empProfId'),
            'empleadoId' => $this->request->getPost('empleadoId'),
            'profesionId' => $this->request->getPost('profesionId')
        ];
        $empleadoProfesion->actualizarEmpleadoProfesion($id, $data);
        return $empleadoProfesion;
    }

    public function eliminar()
    {
        $empleadoProfesion = new EmpleadoProfesionModel();
        $id = $this->request->getPost('id');
        $empleadoProfesion->eliminarEmpleadoProfesion($id);
        return $empleadoProfesion;
    }

    public function NombreEmpleado()
    {
        $empleadoProfesion = new EmpleadoProfesionModel();
        $data['empleadoId'] = $empleadoProfesion->Empleado();
        return $this->response->setJSON($data);
    }

    public function NombreProfesion()
    {
        $empleadoProfesion = new EmpleadoProfesionModel();
        $data['profesionId'] = $empleadoProfesion->Profesion();
        return $this->response->setJSON($data);
    }


}