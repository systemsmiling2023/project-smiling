<?php

namespace App\Controllers\Configuracion;

use App\Controllers\BaseController;
use App\Models\Configuracion\ProveedorModel;

class ProveedoresController extends BaseController
{
    public function buscar()
    {
        $proveedor = new ProveedorModel();
        $data['proveedorId'] = $proveedor->mostrarJoin();
        return $this->response->setJSON($data);
        // return $data;
    }

    public function obtenerId()
    {
        $proveedor = new ProveedorModel();
        $id = $this->request->getPost('id');
        $data['proveedorId'] = $proveedor->find($id);
        return $this->response->setJSON($data);
    }

    public function almacenar()
    {
        $proveedor = new ProveedorModel();
        $data = [
            'personaId' => $this->request->getPost('personaId'),
            'razonSocial' => $this->request->getPost('razonSocial')
        ];
        $proveedor->guardarProveedor($data);
        return $proveedor;
    }

    public function actualizar()
    {
        $proveedor = new ProveedorModel();
        $id = $this->request->getPost('id');
        $data = [
            'personaId' => $this->request->getPost('personaId'),
            'razonSocial' => $this->request->getPost('razonSocial')
        ];
        $proveedor->actualizarProveedor($id, $data);
        return $proveedor;
    }

    public function eliminar()
    {
        $proveedor = new ProveedorModel();
        $id = $this->request->getPost('id');
        $proveedor->eliminarProveedor($id);
        return $proveedor;
    }

    public function selectProveedor()
    {
        $proveedor = new ProveedorModel();
        $data['personaId'] = $proveedor->nombreProveedor();
        return $this->response->setJSON($data);
    }

}