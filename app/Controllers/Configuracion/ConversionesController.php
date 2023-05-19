<?php

namespace App\Controllers\Configuracion;

use App\Controllers\BaseController;
use App\Models\Configuracion\ConversionesModel;

class ConversionesController extends BaseController
{
    public function buscar()
    {
        $conversion = new ConversionesModel();
        $data['uniDetId'] = $conversion->mostrarJoin();
        return $this->response->setJSON($data);
        // return $data;
    }

    public function obtenerId()
    {
        $conversion = new ConversionesModel();
        $id = $this->request->getPost('id');
        $data['uniDetId'] = $conversion->find($id);
        return $this->response->setJSON($data);
    }

    public function almacenar()
    {
        $conversion = new ConversionesModel();
        $data = [
            'unidadId' => $this->request->getPost('unidadId'),
            'presentacion' => $this->request->getPost('presentacion'),
            'factorConversion' => $this->request->getPost('factorConversion'),
            'insumoId' => $this->request->getPost('insumoId')
        ];
        $conversion->guardarConversion($data);
        return $conversion;
    }

    public function actualizar()
    {
        $conversion = new ConversionesModel();
        $id = $this->request->getPost('id');
        $data = [
            'uniDetId' => $this->request->getPost('uniDetId'),
            'unidadId' => $this->request->getPost('unidadId'),
            'presentacion' => $this->request->getPost('presentacion'),
            'factorConversion' => $this->request->getPost('factorConversion'),
            'insumoId' => $this->request->getPost('insumoId')
        ];
        $conversion->actualizarConversion($id, $data);
        return $conversion;
    }

    public function eliminar()
    {
        $conversion = new ConversionesModel();
        $id = $this->request->getPost('id');
        $conversion->eliminarConversion($id);
        return $conversion;
    }

    public function selectUnidad()
    {
        $conversion = new ConversionesModel();
        $data['unidadId'] = $conversion->nombreUnidad();
        return $this->response->setJSON($data);
    }

    public function selectInsumo()
    {
        $conversion = new ConversionesModel();
        $data['insumoId'] = $conversion->nombreInsumo();
        return $this->response->setJSON($data);
    }

}