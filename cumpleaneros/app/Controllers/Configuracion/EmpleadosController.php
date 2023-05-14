<?php

namespace App\Controllers\Configuracion;

use App\Controllers\BaseController;
use App\Models\Configuracion\EmpleadoModel;

class EmpleadosController extends BaseController
{
    public function buscarEmpleado()
    {
        $empleado = new EmpleadoModel();
        $data['fechaIngreso'] = $empleado->buscarJoin();
        return $this->response->setJSON($data);
        // return $data;
    }

    public function obtenerEmpleadoId()
    {
        $empleado = new EmpleadoModel();
        $id = $this->request->getPost('id');
        $data['fechaIngreso'] = $empleado->find($id);
        return $this->response->setJSON($data);
    }

    public function almacenarEmpleado()
    {
        $empleado = new EmpleadoModel();
        $data = [
            'fechaIngreso' => $this->request->getPost('fechaIngreso'),
            'estado' => $this->request->getPost('estado'),
            'cargoId' => $this->request->getPost('cargoId'),
            'personaId' => $this->request->getPost('personaId')
        ];
        $empleado->guardarEmpleado($data);
        return $empleado;
    }

    public function actualizarEmpleado()
    {
        $empleado = new EmpleadoModel();
        $id = $this->request->getPost('id');
        $data = [
            'fechaIngreso' => $this->request->getPost('fechaIngreso'),
            'estado' => $this->request->getPost('estado'),
            'cargoId' => $this->request->getPost('cargoId'),
            'personaId' => $this->request->getPost('personaId')
        ];
        $empleado->actualizarEmpleado($id, $data);
        return $empleado;
    }

    public function eliminarEmpleado()
    {
        $empleado = new EmpleadoModel();
        $id = $this->request->getPost('id');
        $empleado->eliminarEmpleado($id);
        return $empleado;
    }

    public function mostrarNombreEmpleado()
    {
        $empleado = new EmpleadoModel();
        $data['personaId'] = $empleado->nombreEmpleado();
        return $this->response->setJSON($data);
    }

    public function mostrarNombreCargo()
    {
        $empleado = new EmpleadoModel();
        $data['cargoId'] = $empleado->nombreCargo();
        return $this->response->setJSON($data);
    }

    public function buscarJoin()
    {
        $empleado = new EmpleadoModel();
        $data['fechaIngreso'] = $empleado->mostrarJoin();
        return $this->response->setJSON($data);
        // return $data;
    }
}