<?php

namespace App\Controllers\Configuracion;

use App\Controllers\BaseController;
use App\Models\Configuracion\MedicamentoModel;

class MedicamentosController extends BaseController
{
    public function buscar()
    {
        $medicamento = new MedicamentoModel();
        $data['medicamentoId'] = $medicamento->findAll();
        return $this->response->setJSON($data);
        // return $data;
    }

    public function obtenerId()
    {
        $medicamento = new MedicamentoModel();
        $id = $this->request->getPost('id');
        $data['medicamentoId'] = $medicamento->find($id);
        return $this->response->setJSON($data);
    }

    public function almacenar()
    {
        $medicamento = new MedicamentoModel();
        $data = [
            'medicamento' => $this->request->getPost('medicamento'),
        ];
        $medicamento->guardarMedicamento($data);
        return $medicamento;
    }

    public function actualizar()
    {
        $medicamento = new MedicamentoModel();
        $id = $this->request->getPost('id');
        $data = [
            'medicamento' => $this->request->getPost('medicamento')
        ];
        $medicamento->actualizarMedicamento($id, $data);
        return $medicamento;
    }

    public function eliminar()
    {
        $medicamento = new MedicamentoModel();
        $id = $this->request->getPost('id');
        $medicamento->eliminarMedicamento($id);
        return $medicamento;
    }

}