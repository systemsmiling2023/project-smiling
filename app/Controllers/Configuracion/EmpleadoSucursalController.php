<?php

namespace App\Controllers\Configuracion;

use App\Controllers\BaseController;
use App\Models\Configuracion\EmpleadoSucursalModel;
use App\Models\SistemaModel;

class EmpleadoSucursalController extends BaseController
{
    public function buscar()
    {
        $empSuc = new EmpleadoSucursalModel();
        $empleadoId = $this->request->getPost('id');
        $data['sucursalId'] = $empSuc->showSucursal($empleadoId);
        return $this->response->setJSON($data);
    }

    public function obtenerId()
    {
        $empSuc = new EmpleadoSucursalModel();
        $id = $this->request->getPost('id');
        $data['empleadoId'] = $empSuc->find($id);
        return $this->response->setJSON($data);
    }

    public function almacenar()
    {
        $empSuc = new EmpleadoSucursalModel();
        $sistema = new SistemaModel();

        $data = [
            'empleadoId' => $this->request->getPost('empleadoId'),
            'sucursalId' => $this->request->getPost('sucursalId'),
            'esEncargado' => $this->request->getPost('esEncargado')
        ];

        $validarData = [
            'empleadoId' => $this->request->getPost('empleadoId'),
            'sucursalId' => $this->request->getPost('sucursalId')
        ];

        if($sistema->validarExistencia('co_empleado_sucursal', $validarData)){
            $empSuc->guardarEmpSuc($data);
            // return $empSuc;
            $result = array('ERROR'=>false, 'dato'=>'Empleado asignado a sucursal correctamente');
        }else{
            $result = array('ERROR'=>true, 'dato'=>'Empleado ya está asignado a esta sucursal');
        }
        echo json_encode($result);
    }

    public function actualizar()
    {
        $empSuc = new EmpleadoSucursalModel();
        $id = $this->request->getPost('id');
        $data = [
            'empleadoId' => $this->request->getPost('empleadoId'),
            'sucursalId' => $this->request->getPost('sucursalId'),
            'esEncargado' => $this->request->getPost('esEncargado')
        ];
        $empSuc->actualizarEmpSuc($id, $data);
        return $empSuc;
    }

    public function eliminar()
    {
        $empSuc = new EmpleadoSucursalModel();
        $id = $this->request->getPost('id');
        $empSuc->eliminarEmpSuc($id);
        return $empSuc;
    }

    public function mostrarSucEmpleado()
    {
        $empSuc = new EmpleadoSucursalModel();
        $data['empleadoId'] = $empSuc->Empleado();
        return $this->response->setJSON($data);
    }

    public function mostrarSucursal()
    {
        $empSuc = new EmpleadoSucursalModel();
        $data['sucursalId'] = $empSuc->Sucursal();
        return $this->response->setJSON($data);
    }

    /*public function buscarSucursalJoin()
    {
        $empSuc = new EmpleadoSucursalModel();
        $data['sucursalId'] = $empSuc->showSucursal();
        return $this->response->setJSON($data);
    }*/

}